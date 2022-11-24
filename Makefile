console:
	php artisan tinker

install-app:
	composer install

install-shop:
	php artisan shop:install

test:
	php artisan test

config-clear:
	php artisan config:clear

config-clear-all:
	php artisan optimize:clear

key:
	php artisan key:generate

ide-helper:
	php artisan ide-helper:eloquent
	php artisan ide-helper:gen
	php artisan ide-helper:meta
	php artisan ide-helper:mod -n

#Reboot the daemon configuration files:
supervisor-reread:
	sudo supervisorctl reread

#Reload configuration files and add/delete the necessary ones:
supervisor-update:
	sudo supervisorctl update

#View the status of all processes in the "laravel-worker-vks" group:
supervisor-status:
	sudo supervisorctl status laravel-worker-vks:*

#Start of all processes in the "laravel-worker-vks" group:
supervisor-start:
	sudo supervisorctl start laravel-worker-vks:*

lint-php:
	./vendor/bin/phpcs --standard=PSR12 app/Logging/Telegram/TelegramLoggerHandler.php

pint-linter:
	./vendor/bin/pint --test -v

queue-restart:
	sudo php artisan queue:restart

queue-failed:
	sudo php artisan queue:failed

queue-failed-clear:
	sudo php artisan queue:flush

stats-model:
	php artisan model-stats:publish

start-app:
	php artisan serve

refresh:
	php artisan shop:refresh

link:
	 php artisan storage:link
