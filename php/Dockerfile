FROM php:8.0-fpm

# Version
ENV PHPREDIS_VERSION 5.2.2
ENV SWOOLE_VERSION 4.2.6

# default APP_ENV = test
ENV APP_ENV=${app_env:-"test"} \
    TIMEZONE=${timezone:-"Asia/Shanghai"} \
    PHPREDIS_VERSION=4.0.0 \
    SWOOLE_VERSION=4.2.6 \
    COMPOSER_ALLOW_SUPERUSER=1

# Libs -y --no-install-recommends
#RUN apt-get update \
    #&& apt-get install -y \
        #curl wget git zip unzip less vim procps lsof tcpdump htop openssl net-tools iputils-ping \
        #libz-dev \
        #libssl-dev \
        #libnghttp2-dev \
        #libpcre3-dev \
        #libjpeg-dev \
        #libpng-dev \
        #libfreetype6-dev \
		#libicu-dev \
# php.ini
    RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
#	RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \

# Install PHP extensions
COPY install-php-extensions /usr/local/bin
RUN docker-php-ext-install -j$(nproc) bcmath pdo_mysql \
    #&& docker-php-ext-install \
       #bcmath gd pdo_mysql mbstring sockets zip sysvmsg sysvsem sysvshm intl \
# Clean apt cache
    && rm -rf /var/lib/apt/lists/*

# Install composer
#Run curl -sS https://getcomposer.org/installer | php \
#Run curl -sS https://mirrors.aliyun.com/composer/composer.phar \
    #&& mv composer.phar /usr/local/bin/composer \
    #&& composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ \
    #&& composer self-update --clean-backups \


# Install redis extension
#Run wget http://pecl.php.net/get/redis-${PHPREDIS_VERSION}.tgz -O /tmp/redis.tar.tgz \
    #&& pecl install /tmp/redis.tar.tgz \
    #&& rm -rf /tmp/redis.tar.tgz \
    #&& docker-php-ext-enable redis \

# Install swoole extension
#    && wget https://github.com/swoole/swoole-src/archive/v${SWOOLE_VERSION}.tar.gz -O swoole.tar.gz \
#    && mkdir -p swoole \
#    && tar -xf swoole.tar.gz -C swoole --strip-components=1 \
#    && rm swoole.tar.gz \
#    && ( \
#        cd swoole \
#        && phpize \
#        && ./configure --enable-mysqlnd --enable-sockets --enable-openssl --enable-http2 \
#        && make -j$(nproc) \
#        && make install \
#    ) \
#    && rm -r swoole \
#    && docker-php-ext-enable swoole \
# Clear dev deps
#    && apt-get clean \
#    && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
# Timezone
    RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone \
    && echo "[Date]\ndate.timezone=${TIMEZONE}" > /usr/local/etc/php/conf.d/timezone.ini
