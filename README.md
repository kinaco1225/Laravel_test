# Laravel_test（お問い合わせ管理アプリ）

## 環境構築
- Docker のビルドからマイグレーション、シーディングまでを行い開発環境を構築  
- `composer install`、`npm install` により依存関係をインストール  
- `.env` の設定後 `php artisan key:generate`  
- `php artisan migrate --seed` によりデータベースをセットアップ  
- `php artisan serve` でローカルサーバー起動

## 使用技術（実行環境）
- PHP 8.x
- Laravel 8.x
- MySQL 8.x
- Laravel Fortify（認証機能）
- Maatwebsite/Excel（エクスポート機能）
- WSL2 + Docker（開発環境）

## ER図
＜ーーー 作成したER図の画像をここに貼る ーーー＞
（例）  
## URL
- 開発環境: http://localhost/
- ログイン画面: http://localhost/login
- 管理画面: http://localhost/admin
