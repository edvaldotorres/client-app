FROM phpdockerio/php:8.0-fpm
WORKDIR "/app"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
    git \
    php8.0-http \
    php8.0-memcached \
    php8.0-mysql \
    php8.0-psr \
    php8.0-xdebug \
    curl; \
    curl -sL https://deb.nodesource.com/setup_lts.x | bash -; \
    apt-get install -y nodejs; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
