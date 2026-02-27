FROM php:8.2-apache

# Enable Apache modules commonly used by PHP apps
RUN a2enmod rewrite headers

# Install tools required by Composer
RUN set -eux; \
	apt-get update; \
	apt-get install -y --no-install-recommends git unzip; \
	rm -rf /var/lib/apt/lists/*

# Install Composer 2
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Allow .htaccess overrides in the document root
RUN set -eux; \
	{ \
		echo '<Directory /var/www/html>'; \
		echo '    AllowOverride All'; \
		echo '    Require all granted'; \
		echo '</Directory>'; \
	} > /etc/apache2/conf-available/allow-override.conf; \
	a2enconf allow-override

# Suppress ServerName warning
RUN set -eux; \
	echo 'ServerName localhost' > /etc/apache2/conf-available/servername.conf; \
	a2enconf servername

# PHP settings for development
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini

WORKDIR /var/www/html
