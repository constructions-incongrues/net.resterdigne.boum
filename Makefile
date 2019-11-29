SHELL=/bin/bash

ennemies:
	for ennemi in `cat ./ennemies.txt`; do \
		if [ ! -d "./downloads/$$ennemi" ]; then \
			/home/tristan/.local/bin/googleimagesdownload -l 20 -k "$$ennemi"; \
		fi \
	done
