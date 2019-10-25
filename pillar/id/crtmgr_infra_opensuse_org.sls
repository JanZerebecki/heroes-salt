grains:
  city: nuremberg
  country: de
  hostusage:
    - crtmgr.o.o
  roles:
    - crtmgr
  reboot_safe: yes
  salt_cluster: opensuse
  virt_cluster: atreju
users:
  root:
    ssh_auth_file:
      - ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIFHFkW4K+tuuVb9ymIMWXXmBm9ASu1CVJzaVfLGntYAq tbro@opensuse.org
      - ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAILm+6uzk5btZ86y64MCIo6/xmnn0/HYN8OgYz3M2fLVZ darix@sandstorm

  aliases: []
  description: Certificate Manager getting certificates from Let's Encrypt
  documention:
    - https://progress.opensuse.org/projects/opensuse-admin-wiki/wiki/Crtmgrinfraopensuseorg
  responsible: tbro
  partners: []
  weburls: []
