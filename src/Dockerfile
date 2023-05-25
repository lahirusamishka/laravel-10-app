# Použijeme oficiální PHP obraz s Apache
FROM php:8.1-apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
# Nainstalujeme potřebné nástroje a rozšíření
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Nainstalujeme potřebné rozšíření PHP
RUN docker-php-ext-install pdo_mysql

# Instalace Composeru
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Aktivujeme mod_rewrite pro Apache
RUN a2enmod rewrite

# Nastavíme pracovní adresář
WORKDIR /var/www/html

# Kopírujeme závislosti Composeru
COPY composer.json composer.lock ./

# Nainstalujeme závislosti Composeru
RUN composer install --no-scripts --no-autoloader --no-dev --prefer-dist

# Kopírujeme závislosti NPM
COPY package.json ./

# Nainstalujeme závislosti NPM
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
RUN npm install

# Kopírujeme zbytek aplikace
COPY . .

# Přidáme ENV proměnné
ENV APP_URL=http://localhost
ENV DB_CONNECTION=mysql
ENV DB_DATABASE=railway
ENV DB_HOST=containers-us-west-189.railway.app
ENV DB_PASSWORD=5IcIUtiLJA5qUtLA81hM
ENV DB_PORT=7749
ENV DB_USERNAME=root
ENV APP_NAME=lukabudik/staffmaster
ENV APP_ENV=local
ENV APP_KEY=base64:sYbLhrSVQIDdqsqk1MGCa+e/QiFJf8FT11fPzSLZoqY=
ENV APP_DEBUG=true

# Vygenerujeme autoloader a spustíme migrace
RUN composer dump-autoload --optimize

# Sestavíme frontend
RUN npm run prod

# Nastavíme oprávnění
RUN chown -R www-data:www-data /var/www/html

# Nastavíme Apache DocumentRoot na veřejný adresář Laravelu
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Exponujeme port 80
EXPOSE 80
