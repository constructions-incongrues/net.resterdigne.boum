SHELL=/usr/bin/env bash
.PHONY: ennemies victims deploy images

clean:
	rm -rf app/static/assets/images/*

images: oppressed oppressors retribution

install:
	composer install

oppressors:
	if [ ! -d app/static/assets/images/oppressors ]; then googleimagesdownload -s large -l 10 -kf ./var/oppressors.txt -o app/static/assets/images/oppressors; fi

oppressed:
	if [ ! -d app/static/assets/images/oppressed ]; then googleimagesdownload -s large -l 20 -kf ./var/oppressed.txt -o app/static/assets/images/oppressed; fi

retribution:
	if [ ! -d app/static/assets/images/retribution ]; then googleimagesdownload -l 20 -t animated -kf ./var/retribution.txt -o app/static/assets/images/retribution; fi
