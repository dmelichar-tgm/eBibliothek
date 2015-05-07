# eBibliothek
Aufgabe der 4. Jahrgänge der Informationstechnologie
### Version
0.4

### Requirements

To use this application, you'll need to install the following
[VirtualBox] - Serves as virtual-machine-manager
[Git] - To clone this repo (please do not use the GUI, download git bash)
[Vagrant] - For the installation



### Installation (for team members)

After installing the neccessary requirements, do the following steps to get eBibliothek (eBookstore):

All of these steps are done in the Git-Bash

Create a new folder with the location of your choice, init git, add this repo and pull
```sh
mkdir eBibliothek && cd eBibliothek;
git init;
git remote add origin https://github.com/dmelichar-tgm/eBibliothek.git;
git pull origin master;
```
After this you will be asked to input your GitHub credentials
Now we can install the Dev-Box

```sh
vagrant up | tee install.log;
vagrant provision | tee provision.log; 
```
Now, this will install the box. It **is going to** take some time, and to be honest doesn't have the best performance - however, it gets the job done. You will have two log files afterwards. If you see any red text on the console while the install is happening, send the log files to Daniel Melichar.

It is always good to a reload after provisioning
```sh
vagrant reload
```


The Dev-Box should now be successfully installed - you can now SSH into it by using
```sh
vagrant ssh
```

The final step is to add the following IP-Adress to your Hosts-File

OSX:
>  */private/etc/hosts*

Windows:
> *C:\Windows\System32\drivers\etc*

Add the following line to the end of the file
```sh
127.0.0.1 	ebibliothek.dev
```

You can now test the connection to the box (while it's running, of course) by typing the following url into your browser
>	*ebibliothek.dev:8080*


### Known Bugs

- Provisioning bugs:
	- Apache2 won't reload
	- No console output after certain time

### Used Tools

* GitHub
* Google Drive
* Laravel
* AngularJS


### Development

tbd

### Team (4CHITM)

[dbruendl01-tgm] - Daniel Bründl (Product Owner)

[dmelichar-tgm] - Daniel Melichar (Technical Arcitect)

[rsimsek-tgm] - Raphael Simsek

[dhammerschmidt-tgm] - Daniel Hammerschmidt

[asoni-tgm] - Adaresh Soni

[dkocsi-tgm] - Daniel Kocsi

[lsprung-tgm] - Lukas Sprung

[bschmid-tgm] - Bernhard Schmid

[TGMFaikuF] - Fitim Faiku

[jkisbedo-tgm] - John Rodrigue Kisbedo

[Davrai] - David Böheim

[pwichert-tgm] - Patrick Wichert

[jkreutzer] - Julian Kreutzer



License
----

GNU


###### Coded with :heart:

[VirtualBox]:https://www.virtualbox.org/
[Git]:https://git-scm.herokuapp.com/downloads
[Vagrant]:https://www.vagrantup.com/downloads.html
[dbruendl01-tgm]:https://github.com/dbruendl01-tgm
[dmelichar-tgm]:https://github.com/dmelichar-tgm
[rsimsek-tgm]:https://github.com/rsimsek-tgm
[dhammerschmidt-tgm]:https://github.com/dhammerschmidt-tgm
[asoni-tgm]:https://github.com/asoni-tgm
[dkocsi-tgm]:https://github.com/dkocsi-tgm
[lsprung-tgm]:https://github.com/lsprung-tgm
[bschmid-tgm]:https://github.com/bschmid-tgm
[TGMFaikuF]:https://github.com/TGMFaikuF
[jkisbedo-tgm]:https://github.com/jkisbedo-tgm
[Davrai]:https://github.com/Davrai
[pwichert-tgm]:https://github.com/pwichert-tgm
[jkreutzer]:https://github.com/jkreutzer
