#!/bin/bash

cd /var/www/config
sed -i 's/eBibliothek/app/g' app.php
sed -i '125,141d' database.php

cd /etc/php5/cli/
sudo sed -i 's/extension=mcrypt.so/ /g' php.ini
echo 'Finished'

