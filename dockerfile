FROM php:8.2-cli

# Install system packages and PHP extensions
RUN apt-get update -y && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo mbstring pdo_pgsql gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install npm
RUN curl -fsSL https://deb.nodesource.com/setup_current.x | bash - \
  && apt-get install -y nodejs \
  && npm install -g npm@latest

RUN npm i concurrently -g

# Install npm updates
RUN npm install -g npm-check-updates

# Set working directory
WORKDIR /app

# Copy package.json and package-lock.json
COPY package*.json ./

# Remove node_modules, package-lock.json, and install package
RUN rm -rf node_modules package-lock.json && npm install && npm dedupe

# Copy application code
COPY . /app

# Install composer modules
RUN composer install

# Build package for production
RUN npm run build

# run bash script (not used)
COPY run.sh /usr/local/bin/run.sh
RUN chmod +x /usr/local/bin/run.sh

# Expose port 8000 for Laravel, 5173 for Vite
EXPOSE 8000 5173

# Start Laravel and Vite using npm concurrently
CMD npm start
