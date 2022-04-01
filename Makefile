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

push_image:
	docker buildx build --no-cache --platform linux/amd64,linux/arm64 -t gododa/playground-app:latest --target prod -f ./docker/php/Dockerfile --push .
	docker buildx build --no-cache --platform linux/amd64,linux/arm64 -t gododa/playground-nginx:latest --target prod -f ./docker/nginx/Dockerfile --push .
