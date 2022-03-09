.PHONY: install
install: .env
	composer install
	php artisan key:generate

.env:
	cp .env.example .env
