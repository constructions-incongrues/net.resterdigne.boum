attach:
	docker-compose run --rm --entrypoint /bin/sh --label=traefik.enable=false node

build:
	docker-compose build

clean: stop
	docker-compose rm -f

logs:
	docker-compose logs -f

start:
	docker-compose up -d --remove-orphans

stop:
	docker-compose stop

urls:
	@echo "[application] http://boum.localhost"
	@echo "[devserver  ] http://dev.boum.localhost"
	@echo "[traefik    ] http://traefik.boum.localhost"
