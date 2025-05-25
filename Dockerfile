# Set the default APP_ENV for when its not included in the build args
ARG APP_ENV=local

# Use official PHP image with FPM
FROM php:8.4-fpm

# Install system dependencies and PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside container
WORKDIR /var/www/html

# Copy current directory contents into container
COPY . .

# Install PHP dependencies using Composer, with no dev tools if the APP_ENV is set as production in the build args
RUN if [ "$APP_ENV" = "production" ]; then \
      composer install --no-dev --optimize-autoloader; \
    else \
      composer install; \
    fi

# Expose port 9000 and run php-fpm server
EXPOSE 9000
CMD ["php-fpm", "-F"]
