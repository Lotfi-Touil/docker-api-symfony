FROM alpine:3.14 AS base

RUN apk update && \
    apk add --no-cache \
    php8 \
    php8-fpm \
    php8-pdo \
    php8-pdo_pgsql \
    php8-json \
    php8-openssl \
    php8-curl \
    php8-phar \
    php8-intl \
    php8-mbstring \
    php8-xml \
    php8-dom \
    php8-xmlreader \
    php8-ctype \
    curl \
    php8-iconv \
    php8-tokenizer \
    php8-xmlwriter \
    php8-session \
    php8-simplexml

WORKDIR /app

FROM custom/composer AS composer



FROM base
COPY --from=composer /usr/local/bin/composer /usr/local/bin/composer
COPY SkyTowersExplorer/ /app

RUN ln -s /usr/bin/php8 /usr/bin/php

RUN echo "$PATH"

ENV PATH="/usr/bin:${PATH}"


EXPOSE 8000
CMD ["php8", "-S", "0.0.0.0:8000", "-t", "/app/public"]




