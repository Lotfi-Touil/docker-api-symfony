FROM alpine:3.12

RUN apk add --no-cache postgresql postgresql-contrib

RUN mkdir -p /run/postgresql && chown -R postgres:postgres /run/postgresql \
    && mkdir -p /var/lib/postgresql/data && chown -R postgres:postgres /var/lib/postgresql/data


COPY ./conf/postgresql.conf /etc/postgresql/postgresql.conf
COPY ./conf/pg_hba.conf /etc/postgresql/pg_hba.conf
COPY ./init-db.sh /docker-entrypoint-initdb.d/init-db.sh
COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /docker-entrypoint-initdb.d/init-db.sh \
    && chmod +x /usr/local/bin/entrypoint.sh

USER postgres

RUN initdb -D /var/lib/postgresql/data

RUN echo "include '/etc/postgresql/postgresql.conf'" > /var/lib/postgresql/data/postgresql.conf \
    && echo "include '/etc/postgresql/pg_hba.conf'" >> /var/lib/postgresql/data/postgresql.conf

EXPOSE 5432

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["postgres", "-D", "/var/lib/postgresql/data"]
