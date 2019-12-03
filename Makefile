attach-front:
	docker-compose run --rm --label traefik.enable=false front /bin/sh

attach-api:
	docker-compose run --rm --label traefik.enable=false api /bin/sh

attach-game:
	docker-compose run --rm --label traefik.enable=false --entrypoint /bin/sh game

build:
	docker-compose build

clean: stop
	docker-compose rm -f

download:
	for collection in ./etc/profiles/dev/*.txt; do \
	done

logs:
	docker-compose logs -f

start:
	docker-compose up -d

stop:
	docker-compose stop

urls:
	@echo "[api]     http://api.lagrandepurge.localhost"
	@echo "[front]   http://lagrandepurge.localhost"
	@echo "[traefik] http://traefik.lagrandepurge.localhost"
