# !/bin/sh
telegraf &
influxd run -config /etc/influxdb.conf
while true;
do
	if ! pgrep influx ; then
		exit 1
	fi
	if ! pgrep telegraf ; then
		exit 1
	fi
	sleep 2
done