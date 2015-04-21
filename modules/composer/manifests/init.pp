class composer
{

	exec { 'install composer':
		command => 'curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin',
		require => Package['php5-cli'],
		unless => "[ -f /usr/local/bin/composer ]"
	}

	exec { 'global composer':
		command => "sudo mv /usr/local/bin/composer.phar /usr/local/bin/composer",
		require => Exec['install composer'],
		unless => "[ -f /usr/local/bin/composer ]"
	}
	
	exec { 'add composer path':
		command => "/bin/bash -c 'export PATH=/usr/local/bin/:$PATH'",
		timeout => 900,
		logoutput => true
	}
}
