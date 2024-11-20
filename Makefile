all: install 

install:
	docker compose -f docker/docker-compose.yml up -d --build
start:
	docker compose -f docker/docker-compose.yml up 
stop:
	docker compose -f docker/docker-compose.yml down
terminal:
	docker compose -f docker/docker-compose.yml exec php bash