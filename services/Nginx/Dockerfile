FROM alpine:3.12.3

#Utils
RUN apk update
RUN apk add nginx

#Nginx
RUN adduser -D www
RUN mkdir /www
RUN mkdir -p /run/nginx
RUN chown -R www:www /var/lib/nginx
RUN chown -R www:www /www
COPY srcs/nginx.conf /etc/nginx/nginx.conf
COPY srcs/index.html /www/index.html

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf
RUN mkdir -p /etc/telegraf
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf

#SSL
RUN apk add openssl
RUN openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=Company, Inc./CN=mydomain.com" -addext "subjectAltName=DNS:mydomain.com" -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt;

#SSH
RUN apk add openrc
RUN apk add openssh
RUN adduser -D user
RUN echo "user:password"|chpasswd
RUN ssh-keygen -A
COPY ./srcs/sshd_config /etc/ssh/
ADD ./srcs/startup.sh .
RUN	chmod 777 startup.sh

EXPOSE 80 443 22

CMD ./startup.sh