FROM constructionsincongrues/google-image-download:2.8.0-alpine3.10

RUN apk --update --no-cache add bash
COPY ./startup.sh /usr/local/bin/startup.sh
RUN chmod +x /usr/local/bin/startup.sh
ENTRYPOINT [ "/usr/local/bin/startup.sh" ]
