FROM node:latest

WORKDIR /var/www

COPY package.json .
COPY package-lock.json .

RUN npm install
RUN npm install -g @vue/cli@next
RUN npm install -D tailwindcss@latest postcss@latest autoprefixer@latest

COPY tailwind.config.js .
COPY postcss.config.js .


CMD ["npm","start"]