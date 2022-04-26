run:
	docker-compose up -d
	docker exec app composer install

migrate_up:
	docker exec app php bin/console.php migrate:up

database_seed:
	docker exec app php bin/console.php db:seed

migrate_down:
	docker exec app php bin/console.php migrate:down

prune:
	docker system prune -a
	docker volume prune

ssh_container:
	docker exec -it app /bin/bash