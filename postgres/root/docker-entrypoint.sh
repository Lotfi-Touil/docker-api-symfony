#!/bin/sh
set -e

if [ "$(id -u)" -ne 0 ]; then
    echo "This script must be run as root" >&2
    exit 1
fi

chown -R postgres:postgres "${PGDATA}" /var/run/postgresql

if [ ! -f "${PGDATA}/PG_VERSION" ]; then
    su-exec postgres initdb -k -E UTF8 --locale=en_US.UTF-8

    # Configure immediate start of PostgreSQL to accept connections
    su-exec postgres pg_ctl -D "${PGDATA}" -o "-c listen_addresses='*'" start

    # Wait for PostgreSQL to start
    sleep 10

    # Use psql to setup database and user
    su-exec postgres psql -v ON_ERROR_STOP=1 <<-EOSQL
        CREATE USER skyexplorer_user WITH PASSWORD 'strong_password123';
        CREATE DATABASE skytowers_explorer_db;
        GRANT ALL PRIVILEGES ON DATABASE skytowers_explorer_db TO skyexplorer_user;
EOSQL

    # Stop PostgreSQL
    su-exec postgres pg_ctl -D "${PGDATA}" stop

fi

echo "host all all 0.0.0.0/0 md5" >> "${PGDATA}/pg_hba.conf"

# Execute the command provided as CMD to the Dockerfile
exec su-exec postgres "$@"
