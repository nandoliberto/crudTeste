FROM php:7.4-apache

COPY ./src /var/www/html
RUN chown -R www-data /var/www/html

COPY ./conf/apache2.conf /etc/apache2
COPY ./conf/000-default.conf /etc/apache2/sites-available

ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_DOC_ROOT /var/www/html
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid
ENV APACHE_LOCK_DIR /var/lock/apache2

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

RUN mkdir /var/www/html/api/DB
RUN chown -R www-data /var/www/html/api/DB

RUN mkdir /var/www/html/api/Logs
RUN chown -R www-data /var/www/html/api/Logs

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

EXPOSE 80
