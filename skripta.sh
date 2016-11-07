#!/bin/bash
sudo add-apt-repository ppa:ondrej/php;
sudo apt-get update;
sudo apt-get install libapache2-mod-php5.6;
sudo a2dismod php5;
sudo a2enmod php5.6;
sudo add-apt-repository ppa:ondrej/php5-compat;
sudo apt-get update;
sudo apt-get dist-upgrade;
sudo sed -i 's/DocumentRoot \/home\/ubuntu\/workspace/\DocumentRoot \/home\/ubuntu\/workspace\/public/' /etc/apache2/sites-enabled/001-cloud9.conf;
sudo service apache2 restart;
composer install;
cp .env.example .env;
php artisan key:generate;
sudo rm -rf .git;
sudo rm skripta.sh
