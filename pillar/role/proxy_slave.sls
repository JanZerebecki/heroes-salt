keepalived:
  vrrp_instances:
    VRRP_OPENSUSE_PRIVATE:
      priority: 100
      state: BACKUP
      unicast_src_ip: 192.168.47.101
      unicast_peer:
        - 192.168.47.102