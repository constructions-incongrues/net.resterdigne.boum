SHELL=/bin/bash
.PHONY: ennemies victims deploy

ennemies:
	for ennemi in `cat ./ennemies.txt`; do \
		if [ ! -d "./downloads/$$ennemi" ]; then \
			/home/tristan/.local/bin/googleimagesdownload -l 20 -k "$$ennemi" -i ennemies; \
		fi \
	done

victims:
	for victim in `cat ./victims.txt`; do \
		if [ ! -d "./downloads/$$victim" ]; then \
			/home/tristan/.local/bin/googleimagesdownload -l 60 -k "$$victim" -i victims; \
		fi \
	done

deploy:
	git add .
	git commit -m "Deploy"
	git push
