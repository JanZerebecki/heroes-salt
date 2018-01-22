include:
  - role.common.nginx

nginx:
  ng:
    server:
      config:
        worker_processes: auto
    servers:
      managed:
        mirrors.opensuse.org.conf:
          config:
            - server:
                - listen: 192.168.47.17:80
                - set_real_ip_from: 192.168.47.101
                - set_real_ip_from: 192.168.47.102
                - real_ip_header: X-Forwarded-For
                - location /:
                    - root: /srv/www/vhosts/mirrors.opensuse.org
                    - index:
                        - index.html
                        - index.htm
                - location = /50x.html:
                    - root: /srv/www/htdocs
          enabled: True
