FROM yiisoftware/yii2-php:8.3-fpm-nginx



# RUN apt-get update && apt-get install -y zip

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer create-project --prefer-dist yiisoft/yii2-app-basic basic

COPY ./composer.lock /app/
COPY ./composer.json /app/
RUN composer install -n --no-cache -d /app/


EXPOSE 80
RUN /usr/bin/bash "/usr/sbin/service nginx start" &
RUN /usr/bin/bash "/usr/sbin/service php-fpm start" &
