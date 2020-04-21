mailman_conf_dir:
  file.directory:
    - name: /etc/mailman/

mailman_var_dir:
  file.directory:
    - name: /var/lib/mailman/

# Preparation for when we have a set of templates for mailman core

mailman_template_dir:
  file.directory:
    - name: /var/lib/mailman/templates/

mailman_webui_dir:
  file.directory:
    - name: /var/lib/mailman_webui/

# Preparation for when we have a theme for hyperkitty

mailman_webui_template_dir:
  file.directory:
    - name: /var/lib/mailman_webui/templates/

mailman_webui_static_dir:
  file.directory:
    - name: /var/lib/mailman_webui/static-openSUSE/

mailman_conf_file:
  file.managed:
    - name: /etc/mailman/mailman.cfg
    - source: salt://profile/mailman3/files/mailman.cfg
    - template: jinja
    - require:
      - file: mailman_conf_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_webui_manage_file:
  file.managed:
    - name: /var/lib/mailman_webui/manage.py
    - source: salt://profile/mailman3/files/manage.py
    - require:
      - file: mailman_webui_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_webui_settings_file:
  file.managed:
    - name: /var/lib/mailman_webui/settings.py
    - source: salt://profile/mailman3/files/settings.py
    - template: jinja
    - require:
      - file: mailman_webui_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_webui_urls_file:
  file.managed:
    - name: /var/lib/mailman/urls.py
    - source: salt://profile/mailman3/files/urls.py
    - require:
      - file: mailman_webui_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_webui_wsgi_file:
  file.managed:
    - name: /var/lib/mailman_webui/wsgi.py
    - source: salt://profile/mailman3/files/wsgi.py
    - require:
      - file: mailman_webui_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_disable_signup:
  file.managed:
    - name: /var/lib/mailman_webui/django_fedora_nosignup.py
    - source: salt://profile/mailman3/files/django_fedora_nosignup.py
    - require:
      - file: mailman_webui_dir

mailman_uwsgi_conf:
  file.managed:
    - name: /etc/mailman/uwsgi.ini
    - source: salt://profile/mailman3/files/uwsgi.ini
    - require:
      - file: mailman_conf_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart

mailman_hyperkitty_conf:
  file.managed:
    - name: /etc/mailman/hyperkitty.cfg
    - source: salt://profile/mailman3/files/hyperkitty.cfg
    - template: jinja
    - require:
      - file: mailman_conf_dir
    - require_in:
      - service: mailman_service
    - watch_in:
      - module: mailman_restart