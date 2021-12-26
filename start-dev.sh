# launch infra
docker-compose up -d

# launch web server
symfony server:start

( trap exit SIGINT ; read -r -d '' _ </dev/tty ) ## wait for Ctrl-C
