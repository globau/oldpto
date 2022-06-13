#!/bin/sh

echo "waiting for MySQL..."
while ! nc -z mysql 3306; do
  sleep 1
done

echo "initialising database..."
mysql --host=mysql --user=root --password=secret --database=pto < /app/schema.sql

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
