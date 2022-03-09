.PHONY: up
up:
	docker compose up

.PHONY: setup
setup:
	$(MAKE) build
	docker compose run --rm app make install

build:
	docker compose build --force-rm --no-cache

deploy:
	docker buildx build --no-cache --platform linux/amd64,linux/arm64 -t gododa/playground-app:latest --push ./src
	docker buildx build --no-cache --platform linux/amd64,linux/arm64 -t gododa/playground-nginx:latest --push ./docker/nginx/prod
