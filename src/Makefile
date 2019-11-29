SHELL=/usr/bin/env bash
.PHONY: ennemies victims deploy images

images: oppressed oppressors retribution

clean:
	rm -rf public/assets/images/*

oppressors:
	googleimagesdownload -s large -l 10 -kf ./var/oppressors.txt -o public/assets/images/oppressors; \

oppressed:
	googleimagesdownload -s large -l 20 -kf ./var/oppressed.txt -o public/assets/images/oppressed; \

retribution:
	googleimagesdownload -l 20 -t animated -kf ./var/retribution.txt -o public/assets/images/retribution; \

deploy:
	git add .
	git commit -m "Deploy"
	git push
