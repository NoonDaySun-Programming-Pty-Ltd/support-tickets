FROM dunglas/frankenphp:1.9.0-php8.4.11-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    git~=2.49 \
    curl~=8.14 \
    libpng-dev~=1.6 \
    libxml2-dev~=2.13 \
    zip~=3.0 \
    unzip~=6.0 \
    oniguruma-dev~=6.9 \
    icu-dev~=76.1

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .
COPY Caddyfile /etc/caddy/Caddyfile

# Start FrankenPHP
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
