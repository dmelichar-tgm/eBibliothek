class laravel	
{

	package { 'git-core':
    	ensure => present,
    }
	
	exec { 'setup laravel installer':
		command => "sudo /bin/bash -c 'composer global require laravel/installer=~1.1'",
		creates => [ "/usr/local/bin/laravel"],
		require => [Exec['global composer']],
		timeout => 900,
		logoutput => true
	}
	
	exec { 'setup laravel path':
		command => "sudo /bin/bash -c 'export PATH=`$PATH:~/.composer/vendor/bin`; source ~/.bashrc",
		require => [Exec['setup laravel installer']],
		timeout => 900,
		logoutput => true
	}
	
	exec { 'create laravel project':
		command => "/bin/bash -c 'cd /vagrant/web/; composer create-project laravel/laravel'",
		require => [Exec['setup laravel installer'], Package['php5'], Package['git-core']], #Exec['clean www directory']
		creates => "/vagrant/web/composer.json",
		timeout => 1800,
		logoutput => true
	}

	exec { 'update packages':
        command => "/bin/sh -c 'cd /vagrant/web/ && composer --verbose --prefer-dist update'",
        require => [Package['git-core'], Package['php5'], Exec['global composer']],
        onlyif => [ "test -f /vagrant/web/composer.json", "test -d /vagrant/web/vendor" ],
        timeout => 900,
        logoutput => true
	}

	exec { 'install packages':
        command => "/bin/sh -c 'cd /vagrant/web/ && composer install'",
        require => Package['git-core'],
        onlyif => [ "test -f /vagrant/web/composer.json" ],
        creates => "/vagrant/web/vendor/autoload.php",
        timeout => 900,
	}


	file { '/vagrant/web/app/storage':
		mode => 0777
	}
}
