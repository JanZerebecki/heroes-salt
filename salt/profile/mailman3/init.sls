include:
  - profile.mailman3.mailman
  - profile.mailman3.config

mailman_service_file:
  file.managed:
    - name: /etc/systemd/system/mailman.service
    - source: salt://profile/mailman3/files/mailman.service
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_service:
  service.running:
    - name: mailman
    - enable: True

mailman_restart:
  module.wait:
    - name: service.restart
    - m_name: mailman
    - require:
      - service: mailman_service
