# !/bin/sh

telegraf & 
/usr/sbin/grafana-server --homepath=/usr/share/grafana
while true
do
	sleep 1;
done