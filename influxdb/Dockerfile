FROM alpine:3.12.3

#update and install utils
RUN apk update
RUN apk add influxdb

#Telegraf
RUN apk add telegraf --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
RUN mkdir /etc/telegraf 
ADD ./srcs/telegraf.conf /etc/telegraf/

#Conf
RUN mkdir /etc/influxdb
ADD ./srcs/influxdb.conf /etc/influxdb/influxdb.conf

#Run
ADD ./srcs/setup.sh . 
RUN chmod 777 setup.sh

EXPOSE 8086

CMD		[ "/bin/ash", "setup.sh" ]