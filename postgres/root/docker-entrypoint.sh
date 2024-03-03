#!/bin/sh
set -e

DB_USER="${POSTGRES_USER:-postgres}"
DB_PASSWORD="${POSTGRES_PASSWORD:-password}"
DB_NAME="${POSTGRES_DB:-postgres}"

if [ "$(id -u)" -ne 0 ]; then
    echo "This script must be run as root" >&2
    exit 1
fi

chown -R postgres:postgres "${PGDATA}" /var/run/postgresql

if [ ! -f "${PGDATA}/PG_VERSION" ]; then
    su-exec postgres initdb -k -E UTF8 --locale=en_US.UTF-8

    
    su-exec postgres pg_ctl -D "${PGDATA}" -o "-c listen_addresses='*'" start

    
    sleep 10

    
    su-exec postgres psql -v ON_ERROR_STOP=1 <<-EOSQL
        CREATE USER "${DB_USER}" WITH PASSWORD '${DB_PASSWORD}';
        CREATE DATABASE "${DB_NAME}";
        GRANT ALL PRIVILEGES ON DATABASE "${DB_NAME}" TO "${DB_USER}";
EOSQL


    su-exec postgres pg_ctl -D "${PGDATA}" stop

fi

echo "host all all 0.0.0.0/0 md5" >> "${PGDATA}/pg_hba.conf"

exec su-exec postgres "$@"
