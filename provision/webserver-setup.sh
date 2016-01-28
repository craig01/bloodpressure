#!/bin/bash

echo "Provisioning web server virtual machine..."

# Install Git
echo "Installing Git"
sudo yum install -y git

# Install nginx
echo "Installing nginx"
sudo yum install -y epel-release
sudo yum install -y nginx
ifconfig eth0 | grep inet | awk '{ print $2 }'

# Install PHP
echo "Installing PHP"
sudo yum install php-mysql php-devel php-gd php-pecl-memcache php-pspell php-snmp php-xmlrpc php-xml

echo "Configuring Nginx"
mkdir /etc/nginx/sites-enabled
mkdir /etc/nginx/sites-available
cp /var/www/provision/config/nginx_vhost /etc/nginx/sites-available/nginx_vhost
ln -s /etc/nginx/sites-available/nginx_vhost /etc/nginx/sites-enabled/
cp /var/www/provision/config/nginx.conf /etc/nginx/
#rm -rf /etc/nginx/sites-available/default
service nginx restart

# # Install Docker
#   curl -sSL https://get.docker.com/ | sh
#   sudo service docker start
#   # sudo docker run hello-world
#   # sudo usermod -aG docker your_username
#   # docker pull nginx
#   # docker pull redis
