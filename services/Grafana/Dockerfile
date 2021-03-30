FROM	alpine:3.12.3

#Utils
RUN apk update
RUN echo "http://nl.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories
RUN apk add grafana

#Telegraf
RUN apk add telegraf
RUN mkdir /etc/telegraf
ADD ./srcs/telegraf.conf /etc/telegraf/

#Conf
ADD ./srcs/datasource.yaml /usr/share/grafana/conf/provisioning/datasources/
ADD ./srcs/dashboard.yaml /usr/share/grafana/conf/provisioning/dashboards/
ADD ./dashboards/*.json /usr/share/grafana/conf/provisioning/dashboards/

ADD	srcs/startup.sh .
RUN	chmod 777 startup.sh

EXPOSE 3000

CMD	./startup.sh