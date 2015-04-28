class laravel	
{

	package { 'git-core':
    	ensure => present,
    }

	exec { 'setup laravel installer':
		command => "composer global require 'laravel/installer=~1.1'",
		creates => [ "/usr/local/bin/laravel"],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
		require => [Exec['global composer']],
		timeout => 900,
		logoutput => true
	}


	exec { 'create laravel project':
		command => "/bin/bash -c 'cd /var/www/; cp /home/vagrant/.composer/composer.json . && mkdir temp; cd /var/www/ && composer create-project --prefer-dist laravel/laravel temp; mv temp/* . && rm -Rf temp'",
		require => [Exec['setup laravel installer'], Package['php5'], Package['git-core']],
		environment => ["HOME=/usr/local/bin/"],
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
        require => Package['git-core'],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
        onlyif => [ "test -f /var/www/composer.json" ],
        creates => "/var/www/vendor/autoload.php",
        timeout => 900,
	}
	
	
	exec { 'config packages':
		command => "/bin/sh -c 'cd /var/www; php artisan vendor:publish;'",
		require => [Package['git-core'], Exec['global composer'], Exec['install packages']],
		environment => ["COMPOSER_HOME=/usr/local/bin/"],
        onlyif => [ "test -f /var/www/composer.json" ],
        creates => "/var/www/vendor/autoload.php",
        timeout => 900,
	}
	
	file { '/var/www/app/storage':
		mode => 0777
	}
}
