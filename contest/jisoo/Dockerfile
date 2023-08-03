FROM node:16-alpine

WORKDIR /app

COPY package*.json views/* ./

RUN npm ci

COPY . .

CMD ["node", "app.js"]

