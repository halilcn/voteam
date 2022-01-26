FROM node:lts-alpine

RUN npm install -g http-server

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY .. .

RUN npm run build

EXPOSE 8080

ENV VUE_APP_BACKEND_API=${VUE_APP_BACKEND_API}

CMD [ "http-server", "dist" ]
