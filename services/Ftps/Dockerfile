FROM alpine:3.12.3

#Utils
RUN apk update
RUN apk add openrc
RUN apk add vsftpd openssl
RUN rc-status
RUN touch /run/openrc/softlevel

#Telegraf
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add telegraf
RUN mkdir /etc/telegraf
ADD ./srcs/telegraf.conf /etc/telegraf/

#SSL
RUN openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=Company, Inc./CN=mydomain.com" -addext "subjectAltName=DNS:mydomain.com" -newkey rsa:2048 -keyout /etc/ssl/private/vsftpd.key.pem -out /etc/ssl/certs/vsftpd.cert.pem

#Create user
RUN adduser -D "user1"
RUN echo "user1:password" | chpasswd

#Conf
ADD ./srcs/vsftpd.conf /etc/vsftpd/

ADD ./srcs/startup.sh .
RUN chmod 777 startup.sh

EXPOSE 21 30020 30021

CMD ./startup.sh
