#!/usr/bin/env bash

# Use single quotes instead of double quotes to make it work with special-character passwords
PASSWORD='my_password'

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install apache 2.5 and php 5.5
sudo apt-get install -y apache2
sudo apt-get install -y php5

# install mysql and give password to installer
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server
sudo apt-get install php5-mysql

# install phpmyadmin and give password(s) to installer
# for simplicity I'm using the same password for mysql and phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

# setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
	    ServerAdmin webmaster@localhost

	    DocumentRoot /var/www/html
	    <Directory />
	            Options FollowSymLinks
	            AllowOverride None
	    </Directory>
	    <Directory /var/www/html>
	            Options Indexes FollowSymLinks MultiViews
	            AllowOverride All
	            Order allow,deny
	            allow from all
	    </Directory>

	    ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
	    <Directory "/usr/lib/cgi-bin">
	            AllowOverride None
	            Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
	            Order allow,deny
	            Allow from all
	    </Directory>

	    ErrorLog ${APACHE_LOG_DIR}/error.log

	    # Possible values include: debug, info, notice, warn, error, crit,
	    # alert, emerg.
	    LogLevel warn

	    CustomLog ${APACHE_LOG_DIR}/access.log combined

	Alias /doc/ "/usr/share/doc/"
	<Directory "/usr/share/doc/">
	    Options Indexes MultiViews FollowSymLinks
	    AllowOverride None
	    Order deny,allow
	    Deny from all
	    Allow from 127.0.0.0/255.0.0.0 ::1/128
	</Directory>

</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/default.conf

# enable mod_rewrite
sudo a2enmod rewrite

# install git
sudo apt-get -y install git

# install curl 
sudo apt-get -y install curl
sudo apt-get -y install php5-curl

# install nano 
sudo apt-get -y install nano

# install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# remove default index.html file
sudo rm /var/www/html/index.html

# restart apache
service apache2 restart