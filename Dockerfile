FROM php:8.2-apache
COPY ./src3/ /var/www/html/
EXPOSE 8080
