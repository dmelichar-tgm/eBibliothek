# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.define :ebibliothek do |ebib_config|
        ebib_config.vm.box = "ubuntu/trusty64"
        ebib_config.ssh.forward_agent = true
        
        # This will give the machine a static IP uncomment to enable
        ebib_config.vm.network :private_network, ip: "192.168.56.101"
        
        ebib_config.vm.network :forwarded_port, guest: 80, host: 8888, auto_correct: true
        ebib_config.vm.network :forwarded_port, guest: 3306, host: 8889, auto_correct: true	
        ebib_config.vm.hostname = "ebibliothek.at"
        ebib_config.vm.synced_folder "web", "/var/www", {:mount_options => ['dmode=777','fmode=777']}
        
        ebib_config.vm.provider :virtualbox do |v|
            v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
            v.name = "eBibliothek-Dev"
			v.memory = "1024"
        end

        ebib_config.vm.provision :puppet do |puppet|
            puppet.manifests_path 	= "manifests"
            puppet.manifest_file  	= "manifest.pp"
            puppet.module_path 		= "modules"
        end
		
		### User accounts for every member + SSH Key ###
        # ebib_config.vm.provision :shell, :path => "scripts/enableMultiUser.sh"
    end
end