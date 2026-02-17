FROM richarvey/nginx-php-fpm:latest
COPY . /var/www/html
ENV WEBROOT /var/www/html/public
ENV APP_KEY=base64:Xpb1txQIFmoheghIJZbJv5ffm/mqRisDsXWtUWS9xfc=
RUN composer install --no-dev --optimize-autoloader