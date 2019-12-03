FROM python:2.7.17-alpine

RUN apk --update --no-cache add bash make py2-pip && \
    pip install google_images_download==2.8.0

ENTRYPOINT [ "googleimagesdownload" ]
