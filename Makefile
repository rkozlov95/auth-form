run:
	docker-compose up -d
run-mysql:
	docker-compose exec db mysql -u root -p
