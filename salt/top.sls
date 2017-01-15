{% set roles = salt['pillar.get']('grains:roles', []) %}

production:
  '*':
    - role.base
  {% for role in roles %}
  'roles:{{ role }}':
    - match: grain
    - role.{{ role }}
  {% endfor %}
