FROM alpine:3.14

RUN apk add --no-cache php8 php8-fpm php8-mysqli php8-session php8-pgsql php8-pdo_pgsql

ADD https://www.adminer.org/static/download/4.8.1/adminer-4.8.1.php /var/www/html/index.php

EXPOSE 8080

CMD ["php8", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]

