FROM fakereto/nginx-fpm
ENV PATH="/composer/vendor/bin:$PATH" \
    COMPOSER_ALLOW_SUPERUSER=1

RUN composer global require hirak/prestissimo
COPY configs/app.conf ${NGINX_CONF_DIR}/sites-enabled/app.conf
COPY entrypoint.sh /var/www/
WORKDIR /var/www/app
COPY --chown=www-data:www-data ./src .

EXPOSE 80 443
ENTRYPOINT ["/var/www/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]