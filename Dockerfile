# Imagem base PHP com FPM
FROM php:8.1-fpm-alpine

# Instala pacotes necessários e Nginx
RUN apk add --no-cache \
  nginx \
  bash \
  curl \
  libpng-dev \
  libjpeg-turbo-dev \
  freetype-dev \
  libzip-dev \
  zip \
  oniguruma-dev \
  && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia arquivos de Composer primeiro (cache build)
COPY composer.json composer.lock ./

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Copia o restante do projeto
COPY . .

# Ajusta permissões
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Copia configuração do Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Expõe porta que o Render exige
EXPOSE 8080

# Comando para iniciar PHP-FPM + Nginx juntos
CMD sh -c "php-fpm -F & nginx -g 'daemon off;'"
# Imagem base PHP com FPM
FROM php:8.1-fpm-alpine

# Instala pacotes necessários e Nginx
RUN apk add --no-cache \
  nginx \
  bash \
  curl \
  libpng-dev \
  libjpeg-turbo-dev \
  freetype-dev \
  libzip-dev \
  zip \
  oniguruma-dev \
  && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia arquivos de Composer primeiro (cache build)
COPY composer.json composer.lock ./

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Copia o restante do projeto
COPY . .

# Ajusta permissões
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Copia configuração do Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Expõe porta que o Render exige
EXPOSE 8080

# Comando para iniciar PHP-FPM + Nginx juntos
CMD sh -c "php-fpm -F & nginx -g 'daemon off;'"
