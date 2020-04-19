build-and-run:
	docker-compose up -d --build
run-mysql:
	docker-compose exec db mysql -u root -p
install:
	composer install
lint:
	composer phpcs www
