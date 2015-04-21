# eBibliothek
Aufgabe der 4. Jahrgänge der Informationstechnologie
### Version
0.1

### Requirements
To use this application, you'll need to install the following
* [VirtualBox] - Serves as Virtualmachine manager
* [Git] - To clone this repo (please do not use the GUI)
* [Vagrant] - For the installation


### Installation

To install, do the following

Obviously, you'll need to clone/fork the repo into a folder of your choice
```sh
$ git init
$ git remote add origin https://github.com/dmelichar-tgm/eBibliothek.git
$ git pull origin master
```

After that, you can start the installation
```sh
$ sh __main/installVagrant.sh
```
You will be asked if you really want to install it - note: you may not want to install it at a place with slow internet. The download is going to take some time, drink some coffe in the mean time.

Following that it is recommened to run the installVagrant Script again to make sure everything is installed correctly.


### Used Tools

* GitHub
* Google Drive
* Laravel
* AngularJS
* more to come

### Development

To continue deploying on the machine, and after successfuly installing it, you can develop in the web/ Folder for frontend stuff. Changing your network configuration is simple, just edit the hosts file in the templates folder. For backend stuff, using SSH to connect to the virtual machine using Vagrant is probably the smartest solution.

### Team (4CHITM)
@dbruendl01-tgm - Daniel Bründl (Product Owner)
@dmelichar-tgm - Daniel Melichar (Technical Arcitect)
@rsimsek-tgm - Raphael Simsek
@dhammerschmidt-tgm - Daniel Hammerschmidt
@asoni-tgm - Adaresh Soni
@dkocsi-tgm - Daniel Kocsi
@lsprung-tgm - Lukas Sprung
@bschmid-tgm - Bernhard Schmid
@TGMFaikuF - Fitim Faiku
@jkisbedo-tgm - John Rodrigue Kisbedo
@Davrai - David Böheim
@pwichert-tgm - Patrick Wichert
@jkreutzer - Julian Kreutzer





License
----

GNU


[VirtualBox]:https://www.virtualbox.org/
[Git]:https://git-scm.herokuapp.com/downloads
[Vagrant]:https://www.vagrantup.com/downloads.html
