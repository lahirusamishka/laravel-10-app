up:
	docker compose up -d --build --remove-orphans
down:
	docker compose down --remove-orphans
shell:
	docker exec -it app sh