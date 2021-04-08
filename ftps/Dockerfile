FROM alpine:3.12.3

#Update and install utils
RUN apk update
RUN apk add openrc openssl vsftpd
RUN rc-status
RUN touch /run/openrc/softlevel

#Telegraf
RUN apk add telegraf --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
RUN mkdir /etc/telegraf
ADD ./srcs/telegraf.conf /etc/telegraf/

#SSL
RUN	openssl req -x509 -nodes -subj '/CN=localhost' -days 365 -newkey rsa:4096 -keyout /etc/ssl/private/vsftpd.key.pem -out /etc/ssl/certs/vsftpd.cert.pem

#Create user
RUN adduser -D "user1"
RUN echo "user1:password" | chpasswd
RUN chown -R user1:user1 /home/user1

#Conf
ADD ./srcs/vsftpd.conf /etc/vsftpd/

#Run
ADD ./srcs/setup.sh .
RUN chmod 777 setup.sh

EXPOSE 21 30020 30021

CMD		[ "/bin/ash", "setup.sh" ]
