{% set roles = salt['grains.get']('roles', []) %}

zypper:
  repositories:
    SLE-Module-Adv-Systems-Management:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Products/SLE-Module-Adv-Systems-Management/12/x86_64/product
      priority: 99
      refresh: True
    SLE-Module-Adv-Systems-Management-Update:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Updates/SLE-Module-Adv-Systems-Management/12/x86_64/update
      priority: 99
      refresh: True
    SLE-Module-Web-Scripting:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Products/SLE-Module-Web-Scripting/12/x86_64/product
      priority: 99
      refresh: True
    SLE-Module-Web-Scripting-Update
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Updates/SLE-Module-Web-Scripting/12/x86_64/update
      priority: 99
      refresh: True
    SLE-SDK:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Products/SLE-SDK/121/x86_64/product
      priority: 99
      refresh: True
    SLE-SDK-Update:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Updates/SLE-SDK/12/x86_64/update
      priority: 99
      refresh: True
    SLE-SERVER:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Products/SLE-SERVER/12/x86_64/product
      priority: 99
      refresh: True
    SLE-SERVER-Update:
      baseurl: http://smt-internal.opensuse.org/repo/$RCE/SUSE/Updates/SLE-SERVER/12/x86_64/update
      priority: 99
      refresh: True
{% if 'ha' in roles %}
    SLE-HA-POOL:
      baseurl: http://download.nue.suse.com/ibs/SUSE/Products/SLE-HA/12/x86_64/product
      priority: 99
      refresh: True
    SLE-HA-UPDATES:
      baseurl: http://download.nue.suse.com/ibs/SUSE/Updates/SLE-HA/12/x86_64/update
      priority: 99
      refresh: True
{% endif %}
