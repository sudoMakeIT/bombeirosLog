up:
	docker-compose up --build

down: 
	docker-compose down

clean:
	docker-compose down
	docker-compose build --no-cache
	docker-compose up

build:
	docker-compose build --no-cache

shell:
	docker exec -ti php bash

logs:
	docker logs -f --tail 100 php

pytest:
	docker exec php pytest
