# dockerビルド

docker-compose build --no-cache

# dockerコンテナ をデーモン起動する

docker-compose up -d

# dockerの状態を表示

docker-compose ps

# dockerコンテナ gas-build で bash に入る

docker-compose exec gas-build bash



# docker を閉じる

docker-compose stop



# Laravel

## laravel のプロジェクトを作成

```
cd /opt/src
composer create-project laravel/laravel laravel
cd laravel
php artisan -V
```

## Laravel のプロジェクトをとりあえず開く

```
cd /opt/src/laravel
php artisan serve --host 0.0.0.0
```

# Vue.js

## Vue.js を 備え付きHttpサーバーで開く

```
docker exec -it sample-vuejs bash -c "cd /opt/src/app && yarn serve"
```

## Vue.js をビルド

```
docker exec -it sample-vuejs bash -c "cd /opt/src/app && yarn run build --watch"
```
