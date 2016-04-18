Vagrant-LAMP
============

Proyecto de maquina virtual para Vagrant con: 
============

 - Linux (ssh: vagrant )
 - Apache
 - Mysql (User: root  Pass: root)
 - PHP
 - PHPMyAdmin

Provisions
============

 - bootstrap.sh

Requisitos:

#1. Git http://git-scm.com/downloads 
#2. Virtual BOX https://www.virtualbox.org/wiki/Downloads 
#3. Vagrant https://www.vagrantup.com/downloads.html 
#4. Box de Vagrant Precise64.box http://files.vagrantup.com/precise64.box

Instalacion:

#1. Instalar los programas en el orden 
#2. Clonar repositorio (La url la obtinen en BitBucket) git clone URL_PERSONAL 
#3. Agregar BOX con el comando vagrant box add proveedor {{ubicacion_de/precise64.box}} 
#4. Ubicarse en la carpeta proveedor-backend cd proveedor-backend 
#4. Prender la maquina virtual con el comando vagrant up 
#5. Abrir en tu navegador: http://192.168.33.10/