FROM php:7.4.24-apache

# PHPのモジュールなどをインストール
RUN apt-get update \
  && apt-get install -y zlib1g-dev \
  && apt-get install -y zip unzip \
  && apt-get -y install libzip-dev libonig-dev \
  && docker-php-ext-install pdo_mysql mysqli zip \
  && docker-php-ext-enable pdo_mysql mysqli \
  && a2enmod rewrite

# タイムゾーン設定
ENV TZ=Asia/Tokyo

# cronのインストール
RUN apt-get update && apt-get install -y \
  busybox-static \
  && apt-get clean

# composerをインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# アプリケーションフォルダを環境変数として設定
ENV APP_HOME /var/www/html

# apacheのuidとgidをdocker user uid/gidに変更。
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

#change the web_root to laravel /var/www/html/public folder
# RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf
COPY ./php/vhost.conf /etc/apache2/conf-enabled/vhost.conf

#  apache module rewrite を有効にする
RUN a2enmod rewrite

# ソースコードと.envファイルをDockerImageに埋め込む
COPY . $APP_HOME
COPY .env.production /var/www/html/.env
# 初回起動時に行うスクリプトファイルをコピーして実行権限を与える
COPY ./php/start.sh /var/www/html/start.sh
RUN chmod 744 ./php/start.sh

# 必ずキャッシュ用のディレクトリを作っておくこと→ Fargateの場合ずっとキャッシュが残ることになる
RUN mkdir bootstrap/sessions && \
    mkdir storage/framework/cache/data

# フレームワークに必要なモジュールをDockerImageにインストール
RUN composer install --no-dev --no-interaction

# 書き込み権限を与える
RUN chown -R www-data:www-data $APP_HOME
# RUN chmod -R 777 storage && \
#     chmod -R 777 bootstrap
# CMD php artisan migrate --force
CMD ["bash", "start.sh"]