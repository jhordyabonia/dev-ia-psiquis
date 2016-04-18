# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	config.vm.box = "proveedor"
	config.vm.box_url = "http://files.vagrantup.com/precise64.box"

	# Disable automatic box update checking. If you disable this, then
	# boxes will only be checked for updates when the user runs
	# `vagrant box outdated`. This is not recommended.
	config.vm.box_check_update = false
	# config.vm.network "forwarded_port", guest: 80, host: 8080
	# config.vm.network :forwarded_port, guest: 3306, host: 33066
	# Create a private network, which allows host-only access to the machine
	# using a specific IP.
	config.vm.network :private_network, ip: "192.168.33.10"
	config.vm.synced_folder "res/", "/res"
	config.vm.provision "shell", path: "bootstrap.sh"
end