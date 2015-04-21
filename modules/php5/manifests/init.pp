class php5
{

	#PHP 5.5 setup 

	package
	{
		"python-software-properties":
			ensure => present,
			require => Exec['php5 apt update']
	}

	exec 
	{ 
		'add php5apt-repo':
			command => '/usr/bin/add-apt-repository ppa:ondrej/php5 -y',
			require => [Package['python-software-properties']],
	}

	exec { "php5 apt update":
		command => 'apt-get update',
	}
}
