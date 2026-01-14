# =========================
# Stage 1 — Build frontend
# =========================
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY resources ./resources
COPY vite.config.js ./
RUN npm run build

# =========================
# Stage 2 — Build backend
# =========================
FROM php:8.2-fpm-alpine

# Instala dependências do sistema
RUN apk add --no-cache \
  bash \
  git \
  curl \
  libzip-dev \
  unzip \
  oniguruma-dev \
  icu-dev \
  postgresql-dev \
  postgresql-client \
  ca-certificates \
  && update-ca-certificates

# Extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_pgsql zip intl

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia código do Laravel
COPY . .

# Copia frontend buildado
COPY --from=frontend /app/public/build ./public/build

# Instala dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Permissões corretas
RUN chown -R www-data:www-data storage bootstrap/cache && \
  chmod -R 775 storage bootstrap/cache

# Expose porta do Render
EXPOSE 8080

# Start PHP-FPM
CMD ["php-fpm"]
