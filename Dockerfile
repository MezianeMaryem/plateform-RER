FROM --platform=linux/amd64 php:8.1-cli

# Install extensions
RUN docker-php-ext-install pdo_mysql

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev

RUN docker-php-ext-install zip

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./composer.lock ./composer.json /var/www/html/

RUN composer install --no-scripts --no-autoloader

COPY . /var/www/html

RUN composer dump-autoload --optimize

RUN composer require guzzlehttp/guzzle

RUN php artisan clear-compiled

EXPOSE 8000

CMD sh -c 'php artisan config:clear && \
           php artisan key:generate && \
           php artisan migrate && \
           php artisan storage:link && \
           php artisan route:clear && \
           exec php artisan serve --host=0.0.0.0 --port=8000'
