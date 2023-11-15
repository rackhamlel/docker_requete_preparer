FROM php:apache

RUN apt-get update && apt-get install -y git

# Extensions PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Module rewrite
RUN a2enmod rewrite

# Installation de composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/

# Copie de l'application dans le DocumentRoot
COPY app/ /var/www/html/
EXPOSE 80
