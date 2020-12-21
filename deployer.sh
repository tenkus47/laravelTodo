set -e

echo "deploying application..."

(php artisan down --message "message is being deployed")

git pull origin master

php artisan up

echo "application deployed"