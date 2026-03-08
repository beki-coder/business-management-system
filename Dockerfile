# Use PHP with required extensions
# FROM php:8.2-fpm
# # Set working directory
# WORKDIR /var/www

# # Install system dependencies
# RUN apt-get update && apt-get install -y \
#     build-essential \
#     libpng-dev \
#     libjpeg-dev \
#     libfreetype6-dev \
#     zip \
#     unzip \
#     git \
#     curl

# # Install PHP extensions
# RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# # Install Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Copy existing application directory contents
# COPY . /var/www

# # Set permissions
# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 755 /var/www



# RUN apt-get update && apt-get install -y \
#     libpng-dev \
#     libjpeg-dev \
#     libfreetype6-dev \
#     zip \
#     unzip \
#     git \
#     curl

# RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# RUN docker-php-ext-install \
#     pdo_mysql \
#     mbstring \
#     exif \
#     pcntl \
#     bcmath \
#     gd








# Install system dependencies
# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     zip \
#     unzip \
#     libpng-dev \
#     libjpeg-dev \
#     libfreetype6-dev \
#     libonig-dev \
#     libzip-dev \
#     && rm -rf /var/lib/apt/lists/*

# # Configure GD extension
# RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# # Install PHP extensions
# RUN docker-php-ext-install \
#     pdo_mysql \
#     mbstring \
#     exif \
#     pcntl \
#     bcmath \
#     gd \
#     zip
















# FROM php:8.4-fpm

# # Install system dependencies
# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     zip \
#     unzip \
#     libpng-dev \
#     libjpeg62-turbo-dev \
#     libfreetype6-dev \
#     libonig-dev \
#     libzip-dev \
#     libwebp-dev \
#     libxpm-dev \
#     && rm -rf /var/lib/apt/lists/*

# # Configure GD
# RUN docker-php-ext-configure gd \
#     --with-freetype \
#     --with-jpeg \
#     --with-webp \
#     --with-xpm

# # Install PHP extensions
# RUN docker-php-ext-install -j$(nproc) \
#     pdo_mysql \
#     mbstring \
#     exif \
#     pcntl \
#     bcmath \
#     gd \
#     zip













FROM php:8.4-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies and Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libwebp-dev \
    libxpm-dev \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Configure GD
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp \
    --with-xpm

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install

# Install Node dependencies
RUN npm install

# Expose port (optional, handled by Nginx)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]