#!/bin/sh
telegraf &
/usr/sbin/grafana-server --homepath=/usr/share/grafana
while true;
do
	if ! pgrep grafana-server ; then
		exit 1
	fi
	sleep 2
done
