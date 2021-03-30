# !/bin/sh
rc-service influxdb start
telegraf &
sleep 2

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