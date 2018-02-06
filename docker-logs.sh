#docker run -tid -p 8080:80 --name="apache_server" -v /home/ubuntu/logs:/var/www nimmis/apache-php5
docker run -d -p 8000:80 --name apache-php-app -v /home/ubuntu/logs:/var/www/html php:7.0-apache
