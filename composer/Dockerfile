# Dockerfile for Composer
FROM alpine:3.14

# Install PHP and its extensions
RUN apk add --no-cache php8 php8-phar php8-json php8-mbstring php8-openssl curl

# Download and install Composer
RUN curl -sS https://getcomposer.org/installer | php8 -- --install-dir=/usr/local/bin --filename=composer

# Set up the application directory
VOLUME ["/app"]
WORKDIR /app

# Set Composer as the entrypoint
ENTRYPOINT ["composer", "--ansi"]

