FROM	alpine:3.12.3

#Update and install utils
RUN apk update && apk add nginx openssl openssh

#Telegraf
RUN apk add telegraf --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
RUN mkdir /etc/telegraf 
ADD ./srcs/telegraf.conf /etc/telegraf/

#SSL
RUN	mkdir /run/nginx /www
RUN	chown -R nginx:nginx /www
RUN mkdir -p /etc/nginx/ssl && openssl req -newkey rsa:2048 -x509 -days 365 -nodes -keyout /etc/nginx/ssl/services.key -out /etc/nginx/ssl/services.pem -subj "/C=FR/ST=Lyon/L=Lyon/O=42, Inc./OU=IT/CN=ft_services"

#SSH
RUN adduser -D "user1"
RUN echo "user1:password"|chpasswd
RUN ssh-keygen -A

#Conf
RUN	rm etc/nginx/nginx.conf
ADD	./srcs/nginx.conf /etc/nginx/
ADD	./srcs/index.html /www/
ADD	./srcs/sshd_conf etc/ssh/

#Run
ADD	./srcs/setup.sh .
RUN	chmod 777 setup.sh

EXPOSE	80 443 22

CMD		./setup.sh
