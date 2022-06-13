# Development-only Dockerfile; does not match production deployment.
FROM php:5.6-fpm-alpine

# system dependencies
RUN apk update && \
    apk upgrade && \
    apk add nginx supervisor openldap-dev mysql-client
RUN docker-php-ext-install ldap mysql && \
    pear install --alldeps Mail

RUN addgroup -g 10001 app && \
    adduser -D -u 10001 -G app app

# configure php, nginx, supervisord, etc
RUN rm /usr/local/etc/php-fpm.d/*
COPY docker/php-pto.ini /usr/local/etc/php/conf.d
COPY docker/php-fpm.ini /usr/local/etc/php-fpm.d/www.conf
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /

# don't verify ldap cert
RUN echo "TLS_REQCERT never" >> /etc/openldap/ldap.conf

# prepare for running as the app user
RUN mkdir -p /app && \
    chown -R app:app /app /run /var/lib/nginx /var/log/nginx

# copy source
RUN mkdir /etc/nubis-config && mkdir /etc/pto
COPY --chown=app:app nubis/puppet/files/config.php /etc/pto
COPY --chown=app:app docker/config.php /etc/nubis-config/pto.php
COPY --chown=app:app . /app

# configure container
STOPSIGNAL SIGINT
EXPOSE 8000
USER app
WORKDIR /app

CMD ["/entrypoint.sh"]
