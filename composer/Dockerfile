
FROM alpine:3.14


RUN apk add --no-cache php8 php8-phar php8-json php8-mbstring php8-openssl curl


RUN ln -s /usr/bin/php8 /usr/bin/php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


VOLUME ["/app"]
WORKDIR /app


ENTRYPOINT ["composer", "--ansi"]
