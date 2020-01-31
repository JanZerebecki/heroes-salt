{% set roles = salt['grains.get']('roles', []) %}

discord_pgks:
  pkg.installed:
    - pkgs:
      - git
      - nodejs10

/var/lib/matrix-synapse/discord:
  file.directory:
    - user: synapse

https://github.com/Half-Shot/matrix-appservice-discord.git:
  git.latest:
    - branch: master
    - target: /var/lib/matrix-synapse/discord/
    - rev: master
    - user: synapse

discord_boostrap:
  npm.bootstrap:
    - name: /var/lib/matrix-synapse/discord
    - user: synapse

discord_build:
  cmd.run:
    - name: npm run build
    - cwd: /var/lib/matrix-synapse/discord
    - user: synapse

discord_systemd_file:
  file.managed:
    - name: /etc/systemd/system/discord.service
    - source: salt://profile/matrix/files/discord.service
    - require_in:
      - service: discord_service