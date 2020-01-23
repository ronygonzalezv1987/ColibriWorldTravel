FROM 838945975189.dkr.ecr.us-east-1.amazonaws.com/laravel-base:latest
COPY . /var/www/html/
#RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y \
  libfreetype6-dev \
  libjpeg62-turbo-dev

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
  docker-php-ext-install gd

RUN mv /var/www/html/custom.ini /usr/local/etc/php/conf.d/custom.ini

RUN mv /var/www/html/start.sh /usr/local/bin/start.sh

RUN composer install && yarn install
RUN npm run production
RUN php artisan passport:keys

RUN openssl req -x509 -new -nodes -newkey rsa:4096 -keyout /etc/ssl/private/key.pem \
   -out /etc/ssl/certs/cert.pem -days 365 -subj "/C=US/ST=Kentucky/L=Louisville/O=aaaa Media/CN=Prueba.local"

RUN chown -R www-data:www-data /var/www/html \
    && chmod u+x /usr/local/bin/start.sh


CMD ["/usr/local/bin/start.sh"]
