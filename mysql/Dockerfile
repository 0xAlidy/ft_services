FROM	alpine:3.12.3

#Update and install utils
RUN apk update
RUN apk add mysql mysql-client openrc
RUN mkdir "/run/mysqld"
RUN chown -R mysql /run/mysqld
RUN rc-status
RUN touch /run/openrc/softlevel

#Telegraf
RUN apk add telegraf --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
RUN mkdir /etc/telegraf 
ADD ./srcs/telegraf.conf /etc/telegraf/

#Conf
ADD ./srcs/wordpress.sql .
ADD ./srcs/db.sql .
ADD ./srcs/my.cnf /etc/my.cnf

#Run
ADD ./srcs/setup.sh .
RUN chmod 777 setup.sh

EXPOSE 3306

CMD		[ "/bin/ash", "/setup.sh" ]
