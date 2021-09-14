#### 0. Clone the repository
```
git clone git@github.com:yasirsoleh/vetrack.git
```
#### 1. Make sure to be inside the directory
```
cd vetrack
```
#### 2. Composer install using docker to prepare vendor folder
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```
#### 3. Prepare .env
```
cp .env.example .env
```
#### 4. Edit .env and change the variable as follows
```
DB_HOST=mysql
DB_USERNAME=sail
DB_PASSWORD=password
```
#### 5. Run using sail detached
```
./vendor/bin/sail up -d
```
#### 6. Run node dependencies
```
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```
#### 7. Run migration
```
./vendor/bin/sail artisan migrate:fresh
```
#### 8. Run database seeder
```
./vendor/bin/sail artisan db:seed
```
#### 9. Open browser and go to localhost
```
http://localhost
```