.PHONY: up
up:
	docker compose up -d

.PHONY: setup
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

.PHONY: deploy
deploy:
	@sh deploy