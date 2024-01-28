# Dockerfile for Symfony
FROM alpine:3.14

# Install PHP and its extensions along with curl
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
    curl

# Download and install Composer
RUN curl -sS https://getcomposer.org/installer | php8 -- --install-dir=/usr/local/bin --filename=composer

# Set up the Symfony application directory
WORKDIR /app

# Expose the Symfony port (adjust if your app uses a different port)
EXPOSE 8000

# Start Symfony server (adjust the CMD according to your Symfony setup)
CMD ["php8", "-S", "0.0.0.0:8000", "-t", "/app/public"]

