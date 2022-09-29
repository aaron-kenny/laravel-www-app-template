FROM composer:2.0.9 AS composer
COPY database/ database/
COPY composer* /app/
ARG COMPOSER_OPTIONS
RUN composer install $COMPOSER_OPTIONS

FROM node:15.11.0-alpine3.10 AS node
RUN mkdir -p /app/public
WORKDIR /app
COPY package* webpack.mix.js babel.config.json /app/
RUN npm install
COPY resources/scss/ resources/scss/
COPY resources/js/ resources/js/
RUN npm run prod

FROM php:8.0.2-fpm-alpine3.13
RUN docker-php-ext-install \
    bcmath \
    pdo_mysql
COPY --chown=www-data:www-data . /var/www/html
COPY --chown=www-data:www-data --from=composer /app/vendor/ /var/www/html/vendor/
COPY --chown=www-data:www-data --from=composer /app/composer* /var/www/html/
COPY --chown=www-data:www-data --from=node /app/package* /var/www/html/
COPY --chown=www-data:www-data --from=node /app/public/css/ /var/www/html/public/css/
COPY --chown=www-data:www-data --from=node /app/public/js/ /var/www/html/public/js/
COPY --chown=www-data:www-data --from=node /app/public/mix-manifest.json /var/www/html/public/mix-manifest.json