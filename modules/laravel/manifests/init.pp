class laravel	
{

	package { 'git-core':
    	ensure => present,
    }

	exec { 'setup laravel installer':
		command => "composer global require 'laravel/installer=~1.1'",
		creates => [ "/usr/local/bin/laravel"],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
		require => [Exec['global composer'], Exec['reload-apache2']],
		timeout => 900,
		logoutput => true
	}


	exec { 'create laravel project':
		command => "/bin/bash -c 'cd /var/www/; cp /home/vagrant/.composer/composer.json . && mkdir temp; cd /var/www/ && composer create-project --prefer-dist laravel/laravel temp; mv temp/* . && rm -Rf temp'",
		require => [Exec['setup laravel installer'], Package['php5'], Package['git-core']],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
		creates => "/var/www/composer.json",
		timeout => 1800,
		logoutput => true
	}
	

	exec { 'update packages':
        command => "/bin/sh -c 'cd /var/www/ && composer --verbose --prefer-dist update'",
        require => [Package['git-core'], Package['php5'], Exec['global composer']],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
        onlyif => [ "test -f /var/www/composer.json", "test -d /var/www/vendor" ],
        timeout => 900,
        logoutput => true
	}
	
	
	exec { 'install packages':
        command => "/bin/sh -c 'cd /var/www/ && composer install'",
        require => [Package['git-core'], Exec['global composer']],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
        onlyif => [ "test -f /var/www/composer.json" ],
        creates => "/var/www/vendor/autoload.php",
        timeout => 900,
		logoutput => true
	}
	
	
	exec { 'load resources':
		command => "/bin/sh -c 'cd /var/www/; cp -Rf /vagrant/resources/* .'",
		require => Exec['config packages'],
		timeout => 900,
        logoutput => true
	}
	
	exec { 'config packages':
		command => "/bin/sh -c 'cd /var/www; php artisan vendor:publish;'",
		require => [Package['git-core'], Package['php5'], Exec['install packages']],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
        onlyif => [ "test -f /var/www/composer.json" ],
        timeout => 900,
		logoutput => true
	}
	
   exec { 'reload-apache2':
      command => "/bin/sh -c '/etc/init.d/apache2 reload'",
      refreshonly => true,
	  logoutput => true
   }
	
	exec { 'change permissions':
		command => "/bin/sh -c 'cd /var/www/; php artisan cache:clear; chmod -R 777 storage; composer -o dumpautoload'",
		require => [Package['git-core'], Package['php5'], Exec['config packages'], Exec['global composer']],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
		timeout => 900,
		logoutput => true
	}
}
