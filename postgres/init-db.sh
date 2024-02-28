#!/bin/sh
set -e

DB_USER="${POSTGRES_USER:-postgres}"
DB_PASSWORD="${POSTGRES_PASSWORD}"
DB_NAME="${POSTGRES_DB}"

POSTGRES="psql -U postgres"

until pg_isready -d "$DB_NAME" -U "$DB_USER"; do
  >&2 echo "PostgreSQL is unavailable - sleeping"
  sleep 1
done

$POSTGRES <<-EOSQL
    DO
    \$\$
    BEGIN
        IF NOT EXISTS (SELECT FROM pg_catalog.pg_roles WHERE rolname = '$DB_USER') THEN
            CREATE USER "$DB_USER" WITH PASSWORD '$DB_PASSWORD';
        END IF;
    END
    \$\$;
    CREATE DATABASE "$DB_NAME" WITH OWNER "$DB_USER";
    GRANT ALL PRIVILEGES ON DATABASE "$DB_NAME" TO "$DB_USER";
EOSQL
