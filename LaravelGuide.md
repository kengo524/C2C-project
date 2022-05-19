php artisan make:controller HomeController

### モデル作成＆マイグレーションファイル作成
```php artisan make:model モデル名 --migration```
### シーダー作成
php artisan make:seeder ファイル名
###
php artisan migrate:fresh --seed

php artisan migrate
php artisan migrate:rollback