FROM fakereto/docker-phpnginx
COPY configs/app.conf ${NGINX_CONF_DIR}/sites-enabled/app.conf
COPY entrypoint.sh /var/www/
ENTRYPOINT ["/var/www/entrypoint.sh"]