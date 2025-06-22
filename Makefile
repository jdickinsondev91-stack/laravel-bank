DOCKER_COMPOSE = docker-compose -f build/docker-compose.yml

up:
	$(DOCKER_COMPOSE) up -d --build

down:
	$(DOCKER_COMPOSE) down

restart:
	$(DOCKER_COMPOSE) down
	$(DOCKER_COMPOSE) up -d --build

logs:
	$(DOCKER_COMPOSE) logs -f

artisan:
	$(DOCKER_COMPOSE) exec app php artisan $(filter-out $@,$(MAKECMDGOALS))

composer:
	$(DOCKER_COMPOSE) exec app composer $(filter-out $@,$(MAKECMDGOALS))

migrate:
	$(DOCKER_COMPOSE) exec app php artisan migrate

seed:
	$(DOCKER_COMPOSE) exec app php artisan db:seed

test:
	$(DOCKER_COMPOSE) exec app php artisan test

bash:
	$(DOCKER_COMPOSE) exec app bash

.PHONY: up down restart logs artisan composer migrate seed test bash