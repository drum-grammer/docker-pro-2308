FROM node:16

WORKDIR /usr/src/app
RUN mkdir /app
WORKDIR /app
RUN npm install -g xmas-tree
ENTRYPOINT ["xmas-tree", "--color", "--loop"]