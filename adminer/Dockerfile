# Dockerfile for Adminer
FROM alpine:3.14

# Install PHP and required extensions
RUN apk add --no-cache php8 php8-fpm php8-mysqli php8-session

# Download Adminer
ADD https://www.adminer.org/static/download/4.8.1/adminer-4.8.1.php /var/www/html/index.php

# Expose port
EXPOSE 8080

# Start PHP server
CMD ["php8", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]

