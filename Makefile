install:
	composer install
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-games:
	php bin/brain-games
validate:
	composer validate
