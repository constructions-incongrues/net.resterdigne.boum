#!/usr/bin/env bash

for COLLECTION in /etc/collections/*; do
    if [ ! -d "/data/$(basename $COLLECTION)" ]; then
        googleimagesdownload $(cat $COLLECTION/parameters.txt) -kf $COLLECTION/keywords.txt -o "/data/$(basename $COLLECTION)"
    fi
done
