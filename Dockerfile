#FROM 838945975189.dkr.ecr.us-east-1.amazonaws.com/laravel-base:latest
#COPY . /var/www/html/
#RUN docker-php-ext-install pdo pdo_mysql

#  libfreetype6-dev \
#  libjpeg62-turbo-dev

#RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
#  docker-php-ext-install gd

#RUN mv /var/www/html/custom.ini /usr/local/etc/php/conf.d/custom.ini

#RUN mv /var/www/html/start.sh /usr/local/bin/start.sh

#RUN composer install && yarn install
#RUN npm run production
#RUN php artisan passport:keys

#RUN openssl req -x509 -new -nodes -newkey rsa:4096 -keyout /etc/ssl/private/key.pem \
#   -out /etc/ssl/certs/cert.pem -days 365 -subj "/C=US/ST=Kentucky/L=Louisville/O=aaaa Media/CN=Prueba.local"

#RUN chown -R www-data:www-data /var/www/html \
#    && chmod u+x /usr/local/bin/start.sh


#CMD ["/usr/local/bin/start.sh"]
FROM php:7.3-fpm-alpine
WORKDIR /var/www
RUN apk update && apk add \
    build-base \ 
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install gd  
    
RUN composer install && yarn install
COPY ./config/php/local.ini  /usr/local/etc/php/conf.d/local.ini

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www
 USER www
 COPY --chown=www:www . /var/www
 EXPOSE 9000    