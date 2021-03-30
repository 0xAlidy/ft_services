FROM alpine:3.12.3

#Utils
RUN apk update && apk add openrc && apk add openssl && apk add wget && apk add nginx && apk add php7 php7-fpm php7-iconv php7-json php7-mbstring php7-mysqli php7-phar php7-session

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf
RUN mkdir -p /etc/telegraf
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf

#PhpMyAdmin
RUN mkdir /run/nginx
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-all-languages.tar.gz
RUN tar -xvf phpMyAdmin-4.9.0.1-all-languages.tar.gz
RUN mv phpMyAdmin-4.9.0.1-all-languages phpmyadmin
RUN rm phpMyAdmin-4.9.0.1-all-languages.tar.gz
COPY srcs/config.inc.php phpmyadmin/config.inc.php
RUN mkdir /phpmyadmin/tmp
RUN chmod 777 /phpmyadmin/tmp

#Conf
COPY srcs/nginx.conf /etc/nginx/nginx.conf

ADD ./srcs/startup.sh .
RUN	chmod 777 startup.sh

EXPOSE 5000

CMD ./startup.sh