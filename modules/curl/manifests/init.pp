class curl 
{
    package 
    { 
        "curl":
            ensure  => present,
            require => Exec['apt-get update']
    }
}
