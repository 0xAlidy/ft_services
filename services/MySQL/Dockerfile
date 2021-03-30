FROM alpine:3.12.3

#Utils
RUN apk update
RUN apk add mysql mysql-client

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf
RUN mkdir -p /etc/telegraf
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf

#Conf
COPY srcs/my.cnf /etc/

ADD srcs/startup.sh .
RUN chmod 777 startup.sh

EXPOSE 3306

CMD ./startup.sh