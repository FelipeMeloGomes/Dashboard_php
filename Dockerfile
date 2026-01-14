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
  nginx \
  supervisor \
  ca-certificates \
  && update-ca-certificates

# Extensões PHP necessárias para Laravel
RUN docker-php-ext-install pdo pdo_pgsql zip intl

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia código do Laravel
COPY . .

# Copia assets buildados do frontend
COPY --from=frontend /app/public/build ./public/build

# Instala dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Permissões corretas
RUN chown -R www-data:www-data storage bootstrap/cache && \
  chmod -R 775 storage bootstrap/cache

# Remove comandos que geram warnings no build
# php artisan key:generate será executado no deploy, usando variáveis de ambiente

# Configura Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Exponha porta do Render
EXPOSE 8080

# Start PHP-FPM e Nginx via Supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
