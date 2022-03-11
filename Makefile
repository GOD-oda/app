.PHONY: up
up:
	docker compose up

.PHONY: setup
setup:
	mkdir -p src
	$(MAKE) build

build:
	docker compose build --force-rm --no-cache

deploy:
	docker buildx build --no-cache --platform linux/amd64,linux/arm64 -t gododa/playground-app:latest --target prod -f ./docker/php/Dockerfile --push .
	docker buildx build --no-cache --platform linux/amd64,linux/arm64 -t gododa/playground-nginx:latest --target prod -f ./docker/nginx/Dockerfile --push .
