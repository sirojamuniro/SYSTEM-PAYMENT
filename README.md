1. clone github
2. composer install
3. composer dump-autoload
4. npm install
5. php artisan serve
6. npm run watch
7. install redis
8. start apache dan mysql phpmyadmin
9. create database
10. copy name databe to .env.example in DB_DATABASE=[name_your_database]
11. copy .env.example to .env
12. install POSTMAN
13. turn on server redis and POSTMAN
14. ketik di terminal laravel php artisan migrate
15. ketik di terminal laravel php artisan db:seed --class=PaymentSeeder sebanyak yang diinginkan
16. ketik di terminal laravel php artisan db:seed --class=PaymentStatusSeeder 1x saja
17. ketik di terminal php artisan key:generate
Setting POSTMAN
1. di postman buat collection
2. klik menu header di KEY pilih Accept, Value pilih application/json
3. untuk api tinggal menyamakan di routes/api.php
4. ketik di url localhost:8000/api/payments untuk get data
5. ketik di url localhost:8000/api/payments/create untuk create data
