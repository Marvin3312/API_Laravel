# -----------------------------
# Base PHP 8.2 con Apache
# -----------------------------
FROM php:8.2-apache

# -----------------------------
# Variables de entorno opcionales
# -----------------------------
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# -----------------------------
# Instalación de dependencias del sistema
# -----------------------------
RUN apt-get update && apt-get install -y \
    gnupg2 \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev \
    unixodbc-dev \
    g++ \
    make \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql gd zip mbstring bcmath

# -----------------------------
# Instalar drivers SQL Server
# -----------------------------
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/ubuntu/22.04/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql18 \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# -----------------------------
# Instalar Composer
# -----------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# -----------------------------
# Instalar Node.js (para Vite/Tailwind)
# -----------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# -----------------------------
# Copiar proyecto
# -----------------------------
WORKDIR /var/www/html
COPY . .

# -----------------------------
# Instalar dependencias de PHP y Node
# -----------------------------
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build

# -----------------------------
# Permisos y configuración Apache
# -----------------------------
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Exponer puerto
EXPOSE 80

# -----------------------------
# Comando para iniciar Apache
# -----------------------------
CMD ["apache2-foreground"]
