cd /var/www/
rm -rf *
echo "Its not finished yet - no touching"
composer global require "laravel/installer=~1.1"
export PATH="$PATH:~/.composer/vendor/bin"
echo 'export PATH="$PATH:~/.composer/vendor/bin"' >> ~/.bashrc
laravel new eBibliothek
cp -rf /vagrant/resources/staticView .
cd eBibliothek
php artisan fresh
php artisan app:name eBibliothek
chmod 777 storage/ vendor/
sudo cp -rf /vagrant/templates/host /etc/apache2/sites-enabled/000-default.conf
cp -rf /vagrant/templates/.htaccess_root ./.htaccess
cp -rf /vagrant/templates/.htaccess_public ./public/.htaccess
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv 7F0CEB10
echo 'deb http://downloads-distro.mongodb.org/repo/debian-sysvinit dist 10gen' | sudo tee /etc/apt/sources.list.d/mongodb.list
sudo apt-get update
sudo apt-get install -y mongodb-org
sudo ervice mongod start
echo "I will tell you when its finished"
echo "db.placeholder.save({state:'finished'}); db.createUser({user:'ebibliothek',pwd:'password',roles:[{role:'dbOwner',db:'ebibliothek'}]})" > temp.js
mongo ebibliothek temp.js
rm temp.js
echo -e "/bootstrap/compiled.php\n.env.local.php\n.env.php\ncomposer.phar\ncomposer.lock\n/vendor\n/node_modules\n.env\n" > .gitignore
rm .env.example
composer require jenssegers/mongodb
cp -f /vagrant/templates/app.php ./config/
cp -f /vagrant/templates/database.php ./config/
composer update
php artisan config:cache
echo "now its finished"
