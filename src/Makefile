SHELL=/usr/bin/env bash
.PHONY: ennemies victims deploy images

clean:
	rm -rf public/assets/images/*

images: oppressed oppressors retribution

install:
	composer install

oppressors:
	if [ ! -d public/assets/images/oppressors ]; then googleimagesdownload -s large -l 10 -kf ./var/oppressors.txt -o public/assets/images/oppressors; fi

oppressed:
	if [ ! -d public/assets/images/oppressed ]; then googleimagesdownload -s large -l 20 -kf ./var/oppressed.txt -o public/assets/images/oppressed; fi

retribution:
	if [ ! -d public/assets/images/retribution ]; then googleimagesdownload -l 20 -t animated -kf ./var/retribution.txt -o public/assets/images/retribution; fi
