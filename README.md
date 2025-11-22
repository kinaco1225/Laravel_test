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
<img width="471" height="651" alt="drawio" src="https://github.com/user-attachments/assets/42425f0c-daf3-4b98-b801-5fc84bc788f6" />
## URL
- 開発環境: http://localhost/
- ログイン画面: http://localhost/login
- 管理画面: http://localhost/admin
