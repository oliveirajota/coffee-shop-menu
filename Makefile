# Makefile for dev/build utilities

PHP_EXEC:= docker-compose exec php
ARMIN_PATH:=./zero7/menu/
COMPOSER_EXEC:= docker run --rm --interactive --tty --volume $(PWD):/app composer
NODE_EXEC:= docker run -it --rm -v $(pwd):/usr/src/app -w /usr/src/app node:10

.PHONY: logs

install:
#	$(NODE_EXEC) npm install
	$(COMPOSER_EXEC) install --ignore-platform-reqs
	$(PHP_EXEC) php artisan storage:link
	$(PHP_EXEC) php artisan migrate:install
#	$(PHP_EXEC) php artisan queue:table
#	$(PHP_EXEC) php artisan queue:failed-table
	$(PHP_EXEC) php artisan migrate

update:
	$(NODE_EXEC) npm update
	$(COMPOSER_EXEC) composer update --ignore-platform-reqs
	$(PHP_EXEC) php artisan cache:clear

migrate:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan migrate

rollback:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan migrate:rollback --step=1


start-queues:
	$(PHP_EXEC) php artisan queue:restart
	$(PHP_EXEC) php artisan queue:work

clear-queues:
	$(PHP_EXEC) php artisan queue:clear

logs:
	#truncate -s 0 ./storage/logs/*.log
	tail -f ./storage/logs/*.log

# make model-generator TABLE_NAME=mind_body_users
model-generator:
	$(PHP_EXEC) php artisan laracrud:model $(TABLE_NAME)


# Start app on production server
start:
	npm install
	composer install
	php artisan storage:link
	php artisan migrate:install
	php artisan queue:table
	php artisan queue:failed-table
	php artisan migrate
	php artisan queue:work &
	php artisan horizon &

clear-cache:
	$(PHP_EXEC) php artisan cache:clear
	$(PHP_EXEC) php artisan route:clear
	$(PHP_EXEC) php artisan config:clear
	$(PHP_EXEC) php artisan view:clear

pull-pretenders:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan search_pretenders:linked_in

pull-linkedin-data:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan pull_data:linked_in

send-profiles-to-scrape:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan send_to_scrapper:linked_in

update-contacts:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan update_data:contacts

ignore-pretenders:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan check_data:ignore_pretenders

send_linked_in_invitations:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan send_invitation:linked_in

pull_linked_in_invitations:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan pull_data:linked_in_invitations

update_linked_in_invitations:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan check_data:linked_in_invitations

create_linked_in_invitations:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan create:linked_in_invitations

approve_linked_in_invitations:
	$(PHP_EXEC) php $(ARMIN_PATH)artisan approve:linked_in_invitations

remove_duplicates:
    $(PHP_EXEC) php $(ARMIN_PATH)artisan check_data:remove_duplicates
