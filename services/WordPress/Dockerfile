FROM alpine:3.12.3

#Utils
RUN apk update
RUN apk add openrc &&  apk add openssl && apk add wget && apk add nginx && apk add php7 php7-fpm php7-iconv php7-json php7-mbstring php7-mysqli php7-phar php7-session

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf
RUN mkdir /etc/telegraf 
ADD srcs/telegraf.conf /etc/telegraf/

#Nginx
RUN adduser -D -g 'Nginx www user' www
RUN mkdir /www
RUN mkdir -p /run/nginx
RUN chown -R www:www /var/lib/nginx
RUN chown -R www:www /www

#WP
RUN wget -q https://wordpress.org/latest.tar.gz
RUN	tar xzf latest.tar.gz -C /www/

#Conf
COPY srcs/nginx.conf /etc/nginx/
ADD	srcs/wp-config.php /www/wordpress/.

ADD ./srcs/startup.sh .
RUN	chmod 777 startup.sh

EXPOSE 5050

CMD ./startup.sh