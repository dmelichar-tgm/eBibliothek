#!/bin/bash
Installation () {
	echo "-----------------------------------";
	echo "Fetching updates ...";
	echo "";
	echo "";
	git pull origin master;
	echo "-----------------------------------";
	echo "Installing box ... (This may take some time)";
	echo "No really.. don't touch it for a while......";
	echo "";
	echo "";
	mkdir __main/.log;
	vagrant up 2>&1 | tee __main/.log/init.log;
	vagrant provision 2>&1 | tee __main/.log/provision.log;
	echo "-----------------------------------";
	echo "Installed box - You can now SSH into it";
	echo "You may want to see the log files!";
}

echo "Vagrant Box created for eBibliothek";
echo "Created by Daniel Melichar - QA: ";
echo "-----------------------------------";
while true; do
    read -p "Do you wish to install this program? 
It requires a decent internet connection, maybe you shouldn't do it at school.
[Yes/No]: " yn
    case $yn in
        [Yy]* ) Installation; break;;
        [Nn]* ) exit;;
        * ) echo "Please answer yes or no.";;
    esac
done