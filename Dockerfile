# Base image PHP 8.4
FROM php:8.4-fpm

# Set dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    zip \
    && docker-php-ext-install zip pdo pdo_mysql mbstring \
    && pecl install redis  \
    && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:2.7.2 /usr/bin/composer /usr/bin/composer

# Install node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@10.5.0 && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy Laravel files
WORKDIR /var/www/html
COPY . .

# Set addictions Laravel
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Set rights
RUN chown -R 1000:1000 /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Open port
EXPOSE 80

CMD ["php-fpm"]
