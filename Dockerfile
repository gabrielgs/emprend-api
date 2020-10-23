FROM fakereto/nginx-fpm
COPY configs/app.conf ${NGINX_CONF_DIR}/sites-enabled/app.conf
COPY entrypoint.sh /var/www/
ENTRYPOINT ["/var/www/entrypoint.sh"]
