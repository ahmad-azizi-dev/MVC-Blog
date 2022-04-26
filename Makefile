run:
	docker-compose up -d
	docker exec app composer install

prune:
	docker system prune -a
	docker volume prune

ssh_container:
	docker exec -it app /bin/bash