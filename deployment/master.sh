echo "Deploy started"
cd /var/www/production
git checkout master
git pull
php artisan migrate
php artisan optimize
php artisan config:clear
echo "Deploy finished"