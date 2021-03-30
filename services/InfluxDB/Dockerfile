FROM alpine:3.12.3

#Utils
RUN apk update
RUN apk add influxdb
RUN apk add openrc
RUN rc-status
RUN touch /run/openrc/softlevel

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf
RUN mkdir -p /etc/telegraf
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf

#Conf
RUN mkdir /etc/influxdb
ADD ./srcs/influxdb.conf /etc/influxdb/influxdb.conf

ADD ./srcs/startup.sh .
RUN	chmod 777 startup.sh

EXPOSE 8086

CMD ./startup.sh