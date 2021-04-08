FROM alpine:3.12.3

#Update and install utils
RUN apk update && apk add nginx openssl
RUN apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted --no-cache
RUN mkdir /etc/telegraf 
ADD ./srcs/telegraf.conf /etc/telegraf/

#PhpMyAdmin
RUN wget http://files.directadmin.com/services/all/phpMyAdmin/phpMyAdmin-5.0.2-all-languages.tar.gz
RUN tar zxvf phpMyAdmin-5.0.2-all-languages.tar.gz
RUN rm phpMyAdmin-5.0.2-all-languages.tar.gz
RUN mv phpMyAdmin-5.0.2-all-languages var/www/phpmyadmin

#Setup
RUN mkdir -p var/run/nginx
RUN mkdir /var/www/phpmyadmin/tmp
RUN chmod 777 /var/www/phpmyadmin/tmp

#SSL
RUN	openssl req -x509 -nodes -subj '/CN=localhost' -days 365 -newkey rsa:4096 -keyout /etc/ssl/private/server.key -out /etc/ssl/certs/server.crt

#Conf
COPY ./srcs/nginx.conf /etc/nginx/nginx.conf
COPY ./srcs/config.inc.php /var/www/phpmyadmin/config.inc.php

#Run
ADD	./srcs/setup.sh .
RUN	chmod 777 setup.sh

EXPOSE 5000

CMD [ "/bin/ash", "setup.sh" ]
