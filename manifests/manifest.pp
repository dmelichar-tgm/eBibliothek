# Enable XDebug ("0" | "1")
$use_xdebug = "0"

# Default path
Exec 
{
  path => ["/usr/bin", "/bin", "/usr/sbin", "/sbin", "/usr/local/bin", "/usr/local/sbin", "~/.composer/vendor/bin/"]
}
exec { "apt-get update":
	command				=> 'apt-get update',
}
Exec['apt-get update'] -> Package<| |>

include bootstrap
include curl
include php5
include php
include apache
include mysql
include stdlib
include composer
include laravel

