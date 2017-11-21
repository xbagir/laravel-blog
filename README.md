## Install

### 1. Clone the source code

```shell
git clone git@github.com:xbagir/laravel-blog.git
```

### 2. Set the basic config

```shell
cp .env.example .env
```

Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.

### 2. Install the extended package dependency.

Install the `Laravel` extended repositories: 

```shell
composer install
```

Install the `Vuejs` extended repositories: 

```shel
npm install
```

Compile the js code: 

```shel
npm run dev

// OR

npm run watch

// OR

npm run production
```

### 3. Running Migrations.

```shell
php artisan migrate
```
### 3. Аdmin credentials.

```shell
login:    admin@admin.local
password: 123123
```

## Contributors

- [Bagirov Maxim](http://github.com/xbagir)