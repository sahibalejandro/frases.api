#!/usr/bin/env bash

# Install basics
apt-get update
apt-get -y install curl python-software-properties

# Install packagess
add-apt-repository -y ppa:ondrej/php5
apt-get update
apt-get -y install php5 php5-mysql php5-mcrypt php5-curl php5-gd

# PHP Config
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini

# Install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Apache2 Config
rm -rf /var/www/html
ln -s /vagrant/public /var/www/html
a2enmod rewrite
service apache2 restart
