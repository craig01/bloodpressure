#!/bin/bash

echo "Provisioning web server virtual machine..."

sudo apt-get -y update
# Install Git
echo "Installing Git"
sudo apt-get install -y git

# Install nginx
echo "Installing nginx"
#sudo apt-get install -y epel-release
sudo apt-get install -y nginx
ifconfig eth0 | grep inet | awk '{ print $2 }'

# Install Meteor
sudo curl https://install.meteor.com/ | sh
