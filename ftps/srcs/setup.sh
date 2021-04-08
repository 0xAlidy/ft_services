#!/bin/sh
telegraf &
vsftpd /etc/vsftpd/vsftpd.conf
while true
do
	sleep 1;
done