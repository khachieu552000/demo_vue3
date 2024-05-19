Laravel 10, Breeze Inertia Vue 3, Vite, TailwindCSS 3x

** Requirements
PHP ^8.1
Nodejs ^20.1
Laravel ^10x
vuejs ^3x

** Development
# install repo/package
composer install
npm install

# quickly start dev
npm run build
npm run dev

# clear cache, view, config, route
php artisan optimize:clear
# or
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan route:clear

** Production
npm run build
npm run start
