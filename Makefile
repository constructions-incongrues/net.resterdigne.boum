attach:
	docker-compose run --rm php /bin/sh

build:
	docker-compose build

clean: stop
	docker-compose rm -f

logs:
	docker-compose logs -f

start:
	docker-compose up -d

stop:
	docker-compose stop

urls:
	@echo "[application] http://boum.localhost"
	@echo "[traefik    ] http://traefik.boum.localhost"
