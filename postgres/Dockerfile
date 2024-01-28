# Dockerfile for PostgreSQL
FROM alpine:3.12

# Install PostgreSQL
RUN apk add --no-cache postgresql postgresql-contrib

# Initialize database
RUN mkdir /var/lib/postgresql/data && \
    chown -R postgres:postgres /var/lib/postgresql

USER postgres
RUN initdb /var/lib/postgresql/data

# Expose port
EXPOSE 5432

# Start PostgreSQL server
CMD ["postgres", "-D", "/var/lib/postgresql/data"]

