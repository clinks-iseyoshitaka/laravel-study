
git reset --hard && git clean -df
git pull

pushd htdocs
# 本番用に、.env ファイルをコピー
cp -rp .env.production .env
composer update
php artisan migrate:fresh --force
composer dump-autoload && php artisan db:seed --force
popd

# 1つ上のルートディレクトリに移動
pushd ..

# public フォルダにシンボリックリンクを作成
ln -snf ./docker-php-laravel/htdocs/public public

cp -rp ./docker-php-laravel/htdocs/public/.htaccess.production .htaccess
rm -Rf ./docker-php-laravel/htdocs/public/.htaccess

