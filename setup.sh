#!/bin/sh

minikube start --vm-driver=virtualbox --memory=3g 
eval $(minikube docker-env)
minikube addons enable metrics-server
minikube addons enable dashboard
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.3/manifests/namespace.yaml
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.3/manifests/metallb.yaml
kubectl create secret generic -n metallb-system memberlist --from-literal=secretkey="$(openssl rand -base64 128)"
docker build -t nginx-image ./services/Nginx
docker build -t mysql-image ./services/MySQL
docker build -t phpmyadmin-image ./services/PhpMyAdmin
docker build -t wordpress-image ./services/WordPress
docker build -t ftps-image ./services/Ftps
docker build -t grafana-image ./services/Grafana
docker build -t influxdb-image ./services/influxDB
kubectl apply -k .

minikube dashboard