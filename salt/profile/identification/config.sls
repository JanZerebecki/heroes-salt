{% set roles = salt['grains.get']('roles', []) %}

ipsilon_saml2_dir:
  file.directory:
    - name: /etc/ipsilon/saml2
    - mode: 700
    - user: ipsilon

# # This will be exported from the UI once we set everything up there
#
# ipsilon_configuration_file:
#   file.managed:
#     - name: /etc/ipsilon/configuration.conf
#     - source: salt://profile/identification/files/configuration.conf
#     - template: jinja
#     - mode: 600
#     - require_in:
#       - service: id_apache_service
#     - watch_in:
#       - module: id_apache_restart

ipsilon_conf_file:
  file.managed:
    - name: /etc/ipsilon/ipsilon.conf
    - source: salt://profile/identification/files/ipsilon.conf
    - template: jinja
    - mode: 600
    - require_in:
      - service: id_apache_service
    - watch_in:
      - module: id_apache_restart

/etc/ipsilon/ipsilon.conf:
  file.symlink:
    - target: /var/lib/ipsilon/ipsilon.conf

ipsilon_oidc_conf_file:
  file.managed:
    - name: /etc/ipsilon/openidc.static.cfg
    - source: salt://profile/identification/files/openidc.static.cfg
    - template: jinja
    - mode: 600
    - require_in:
      - service: id_apache_service
    - watch_in:
      - module: id_apache_restart

/etc/ipsilon/openidc.key:
  file.managed:
    - contents_pillar: profile:matrix:openidc_priv_key
    - mode: 600
    - user: ipsilon

/etc/ipsilon/saml2/idp.key:
  file.managed:
    - contents_pillar: profile:matrix:saml2_priv_key
    - mode: 600
    - user: ipsilon

/etc/ipsilon/saml2/idp.crt:
  file.managed:
    - contents_pillar: profile:matrix:saml2_pub_key
    - mode: 644
    - user: ipsilon
