FROM	alpine:3.12.3

#Update and install utils
RUN apk update && apk add wget nginx openssl
RUN	apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted --no-cache
RUN mkdir /etc/telegraf 
ADD ./srcs/telegraf.conf /etc/telegraf/

#SSL
RUN	mkdir /run/nginx /www
RUN	chown -R nginx:nginx /www
RUN openssl req -x509 -nodes -subj '/CN=localhost' -days 365 -newkey rsa:4096 -keyout /etc/ssl/private/server.key -out /etc/ssl/certs/server.crt

#WordPress
RUN wget -q https://fr.wordpress.org/wordpress-5.6-fr_FR.tar.gz
RUN	tar xzf wordpress-5.6-fr_FR.tar.gz -C /www/

#Conf
ADD	./srcs/wp-config.php /www/wordpress/
ADD	./srcs/nginx.conf /etc/nginx/

#Run
ADD	./srcs/setup.sh .
RUN	chmod 777 setup.sh

EXPOSE	5050

CMD		[ "/bin/ash", "/setup.sh" ]
