ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm

WORKDIR /var/www/html

# Install extensions and dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        autoconf \
        pkg-config \
        libssl-dev \
        git \
        unzip \
        libzip-dev \
        zlib1g-dev && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-install -j$(nproc) zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copy php.ini and customize if needed
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Optional: Healthcheck
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 CMD php-fpm -v || exit 1
