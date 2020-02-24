{% set roles = salt['grains.get']('roles', []) %}

id_apache_service:
  service.running:
    - name: apache2
    - enable: True

id_apache_restart:
  module.wait:
    - name: service.restart
    - m_name: apache2
    - require:
      - service: synapse_service
