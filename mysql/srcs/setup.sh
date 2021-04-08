#!/bin/sh
telegraf &
/etc/init.d/mariadb setup
rc-service mariadb start
mysql -u root mysql < db.sql
mysql -u root wordpress < wordpress.sql
rc-service mariadb stop
/usr/bin/mysqld_safe --datadir='/var/lib/mysql'
while true
do
	sleep 2;
done
