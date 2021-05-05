IMAGE=gustavofreze/php-8.0.5
DOCKER_RUN:=docker run --rm -it -v ${PWD}:/usr/app -w /usr/app ${IMAGE}

configure:
	- ${DOCKER_RUN} composer update
	- ${DOCKER_RUN} composer dump-autoload

test: test-unit test-mutation

test-unit:
	- ${DOCKER_RUN} ./vendor/bin/phpunit --coverage-html tests/coverage/

test-mutation:
	- ${DOCKER_RUN} ./vendor/bin/infection