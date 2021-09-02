synapse_dependencies:
  pkg.installed:
    - pkgs:
      - matrix-synapse

synapse:
  group.present:
    - system: True
    - members:
      - synapse

old_synapse_service:
  service.dead:
    - name: synapse
    - enable: False

old_synapse_systemd_file:
  file.absent:
    - name: /etc/systemd/system/synapse.service

/etc/systemd/system/matrix-synapse.service.d/override.conf
  file.managed:
    salt://profile/matrix/files/matrix-synapse-service-override.conf

synapse_service:
  service.running:
    - name: matrix-synapse
    - enable: True
    - require:
      - file: /etc/systemd/system/matrix-synapse.service.d/override.conf
      - pkg: matrix-synapse
      - service: old_snapse_service

synapse_restart:
  module.wait:
    - name: service.restart
    - m_name: matrix-synapse
    - require:
      - service: synapse_service

synapse_log_dir:
  file.directory:
    - name: /var/log/matrix-synapse/
    - user: synapse
    - group: synapse
    - require_in:
      - service: synapse_service

synapse_data_dir:
  file.directory:
    - name: /var/lib/matrix-synapse/
    - user: synapse
    - group: synapse

synapse_media_store_dir:
  file.directory:
    - name: /var/lib/matrix-synapse/media-store/
    - user: synapse
    - group: synapse
    - require:
      - file: synapse_data_dir
    - require_in:
      - service: synapse_service

synapse_uploads_dir:
  file.directory:
    - name: /var/lib/matrix-synapse/uploads/
    - user: synapse
    - group: synapse
    - require:
      - file: synapse_data_dir
    - require_in:
      - service: synapse_service
