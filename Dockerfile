FROM --platform=linux/amd64 ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

# add repo
RUN apt-get update
RUN apt-get upgrade -y


# install common packages
RUN apt-get install -y software-properties-common

RUN add-apt-repository ppa:ondrej/php
RUN apt-get update

# install apache
RUN apt-get install -y apache2
RUN a2enmod rewrite

# install php
RUN apt-get install -y php7.3 libapache2-mod-php7.3  php7.3-cli php7.3-common php7.3-mysql php7.3-zip php7.3-gd php7.3-mbstring php7.3-curl php7.3-xml php7.3-bcmath php7.3-intl

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN composer --version

# set environments
ENV LOG_LEVEL=warn
ENV ALLOW_OVERRIDE=All
ENV DATE_TIMEZONE=UTC

# copy entrypoint
COPY docker-run.sh /usr/sbin/

# grant permissions
RUN chmod +x /usr/sbin/docker-run.sh
RUN chown -R www-data:www-data /var/www/html

#expose volumes
VOLUME /var/www/html

EXPOSE 80

CMD ["/usr/sbin/docker-run.sh"]