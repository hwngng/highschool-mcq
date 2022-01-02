# Prerequisites
1. Laravel 7.x and PHP 7.2.5.
2. MySQL/MongoDB.
3. Database user with all granted priviliges on database named `mcq_dev`.

# How to run?
### Step 1:
Run following commands:
```
git clone https://github.com/hwngng/highschool-mcq.git
cd highschool_mcq
composer install
cp .env.example .env
php artisan key:generate
nano .env
```
Create a database named: `mcq_dev`
Edit these fields with your database credentials
```
DB_DATABASE=mcq_dev
DB_USERNAME=<username>
DB_PASSWORD=<password>
```
Save .env
Run intermnal
```
npm install
npm run dev
```
### Step 2: 
Run following command in terminal:
```
mysql -u <username> -p<password> < database/database_schema.sql
```
And then:
```
mysql -u <username> -p<password> < database/data/mock_data.sql
```

Point local web server to `public/` or simply `php artisan serve` to run the web app.
Default account with full priviledges is: hung/123456

#### Every team members should read this [Note](https://github.com/hwngng/highschool-mcq/blob/master/Note.md).


