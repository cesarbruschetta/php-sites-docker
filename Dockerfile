FROM php:5.4-apache

LABEL name="Sites PHP 5.4" \
    maintainer="Cesar Augusto"

RUN buildDeps="libmysqlclient-dev" \
  && apt-get update \
  && apt-get install -y --no-install-recommends $buildDeps \
  && docker-php-ext-install mysqli mysql \
  && apt-get purge -y --auto-remove $buildDeps \
  && rm -rf /var/lib/apt/lists/*

COPY ./html /var/www/html

EXPOSE 80
WORKDIR /var/www/html/

HEALTHCHECK --interval=30s --timeout=5s --start-period=30s \
  CMD curl -f http://127.0.0.1:80/ || exit 1
