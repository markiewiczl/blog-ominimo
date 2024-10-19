### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/your-laravel-app.git
cd blog-ominimo

./vendor/bin/sail up
```

### 2. install dependencies
#### enter docker container
```bash
php artisan migrate
npm install
npm run dev
```

### 3. load seeders
```bash
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=PostSeeder
php artisan db:seed --class=CommentSeeder
```

### 4. enter localhost

You can access the application at [http://localhost](http://localhost).
