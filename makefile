up:
	@# Start containers
	@docker compose up -d

down:
	@# Stop containers
	@docker compose down

restart:
	@# Restart containers
	@docker compose restart

downwipe:
	@# Stop containers and delete volumes
	@docker compose down -v

myshell:
	@# Connect to MariaDB container
	@docker compose exec mariadb bash

mysql:
	@# Start mysql command line inside container
	@docker compose exec mariadb mysql --host mariadb --database appdb --user appuser --password

wpshell:
	@# Start bash inside WordPress container
	@docker compose exec wordpress bash

cli:
	@# Connect to WordPress CLI container
	@docker compose run --rm cli bash

logs:
	@docker compose logs -f
