FROM mysql:8.0.19
ENV MYSQL_DATABASE: portfolios
ENV MYSQL_USER: user
ENV MYSQL_PASSWORD: password
ENV MYSQL_ROOT_USER: user
ENV MYSQL_ROOT_PASSWORD: password

ADD ./init.sql /docker-entrypoint-initdb.d/

EXPOSE 3306