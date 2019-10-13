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


# 以下は初回のみ以下を実行する

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