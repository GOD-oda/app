.env:
	@cp src/.env.example src

.PHONY: up
up: .env
	docker compose up

build:
	docker compose build --force-rm --no-cache

deploy:
	docker buildx build --platform linux/amd64,linux/arm64 -t gododa/playground:v0.0.1 --push ./src
	docker buildx build --platform linux/amd64,linux/arm64 -t gododa/playground-nginx:v0.0.1 --push ./nginx
