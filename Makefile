up:
	docker compose up -d

restart:
	docker compose down -v --rmi all
	@make up

setup:
	mkdir -p src
	@make build
	@make up
	docker compose exec app composer install
	docker compose exec app cp .env.example .env
	docker compose exec app php artisan key:generate
	docker compose exec app php artisan storage:link

build:
	docker compose build --force-rm --no-cache

rebuild:
	docker compose down -v --rmi all
	@make build

test:
	docker compose run --rm app composer phpunit
