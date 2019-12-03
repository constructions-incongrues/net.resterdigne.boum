FROM node:13.2.0-alpine

WORKDIR /home/node/src

EXPOSE 3000

RUN npm install --global generator-phaser-plus

COPY --chown=node:node ./src /home/node/src

USER node

ENTRYPOINT [ "yarn" ]

CMD [ "start" ]
