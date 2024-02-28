
set -e

postgres -D /var/lib/postgresql/data &

until pg_isready; do
    echo "PostgreSQL is unavailable - sleeping"
    sleep 1
done

echo "PostgreSQL démarré - Exécution du script d'initialisation..."
sh /docker-entrypoint-initdb.d/init-db.sh

wait
