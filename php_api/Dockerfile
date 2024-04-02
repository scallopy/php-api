FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod headers && a2enmod rewrite

RUN apt-get update && apt-get upgrade -y

# Install any extensions you need
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the source code in /www into the container at /var/www/html
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80