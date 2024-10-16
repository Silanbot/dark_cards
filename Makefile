# Include file with .env variables if exists
-include .env

#-----------------------------------------------------------
# Docker
#-----------------------------------------------------------

# Init variables for development environment
env.dev:
	cp ./.stubs/.env.dev .env

# Init variables for production environment
env.prod:
	cp ./.stubs/.env.prod .env

# Build and start containers
bup: build.all up

# Start containers
up:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml up -d

# Stop containers
down:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml down --remove-orphans

# Build containers
build:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml build

# Build all containers
build.all: build.base build

# Build the base app image
build.base:
	docker build --file .docker/base/Dockerfile --tag ${BUILD_MODE}/base:latest ./

# Show list of running containers
ps:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml ps

# Restart containers
restart:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml restart

# Reboot containers
reboot: down up

# View output logs from containers
logs:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml logs --tail 500

# Follow output logs from containers
logs.f:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml logs --tail 500 -f

# Run phpunit tests (requires 'phpunit/phpunit' composer package)
test:
	docker compose --env-file .env -f .docker/${BUILD_MODE}.yml exec app ./vendor/bin/phpunit --order-by=defects --stop-on-defect

#-----------------------------------------------------------
# Danger zone
#-----------------------------------------------------------

# Prune stopped docker containers and dangling images
# Shut down and remove all volumes
remove-volumes:
	docker compose down --volumes

danger.prune:
	docker system prune
