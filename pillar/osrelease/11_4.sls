zypper:
  repositories:
    SLE-SDK:
      baseurl: http://smt-internal.infra.opensuse.org/repo/$RCE/SLE11-SDK-SP4-Pool/sle-11-x86_64
      priority: 99
      refresh: False
    SLE-SDK-Update:
      baseurl: http://smt-internal.infra.opensuse.org/repo/$RCE/SLE11-SDK-SP4-Updates/sle-11-x86_64
      priority: 99
      refresh: True
    SLE-SERVER:
      baseurl: http://smt-internal.infra.opensuse.org/repo/$RCE/SLES11-SP4-Pool/sle-11-x86_64
      priority: 99
      refresh: False
    SLE-SERVER-Update:
      baseurl: http://smt-internal.infra.opensuse.org/repo/$RCE/SLES11-SP4-Updates/sle-11-x86_64
      priority: 99
      refresh: True
    SUSE:CA:
      baseurl: http://smt-internal.infra.opensuse.org/int-suse-ca/SLE_11_SP4
      gpgautoimport: True
      priority: 99
      refresh: True
