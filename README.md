# perudo

A [Docker](https://www.docker.com/)-based installer and runtime for the [Symfony](https://symfony.com) web framework,
with full [HTTP/2](https://symfony.com/doc/current/weblink.html), HTTP/3 and HTTPS support.

![CI](https://github.com/dunglas/symfony-docker/workflows/CI/badge.svg)

## dev

1. install PHP 8.1 & symfony cli & docker && firebase cli
2. launch firebase emulator: `firebase emulators:start --only database`
3. launch postgres: `docker-compose up -d`
4. start backend: `symfony server:start`
5. start frontend: `cd perudo-web && yarn && yarn start`
6. dev (php autoreload by design and front rebuild on file change)

**Enjoy!**

## test

* `./bin/phpunit`

## deploy

* push on main

## resources

1. [heroku](https://dashboard.heroku.com/apps/hidden-ravine-52418)
2. [firebase](https://console.firebase.google.com/u/0/project/ab-perudo-game/overview)
3. perudo.cloud is on OVH
4. HTTPS is furnished thanks to Cloudflare (without proxying app. subdomain - to avoid too much redirect from firebase
   hosting)
