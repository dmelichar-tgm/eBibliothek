Exec {
	path	=> ['/usr/bin', '/usr/local/bin']
}

exec { "apt-update":
	command				=> 'apt-get update',
}
Exec['apt-update'] -> Package<| |>


class { 'apache':
	mpm_module		=> 'prefork'
}

include '::apache::mod::rewrite'
include '::apache::mod::php'

apache::vhost { 'ebibliothek':
	port		=> 80,
	docroot		=> '/vagrant/web',
	override	=> 'All'
}


class { '::mysql::server':
	root_password	=> 's3cr3t',
}

class { '::mysql::bindings':
	php_enable		=> true,
}

mysql::db { 'ebibliothek':
	user			=> 'eb_user',
	password		=> 's3cr3t',
	host			=> 'localhost',
	grant			=> ['ALL']
}

