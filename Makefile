IMAGE=gustavofreze/php-8.0.5
DOCKER_RUN:=docker run --rm -it -v ${PWD}:/usr/app -w /usr/app ${IMAGE}
UNIT_TEST:=./vendor/bin/phpunit
INFECTION_TEST:=./vendor/bin/infection

configure:
	- ${DOCKER_RUN} composer update
	- ${DOCKER_RUN} composer dump-autoload

test:
	- ${DOCKER_RUN} ${UNIT_TEST} --coverage-html tests/coverage/
	- ${DOCKER_RUN} ${INFECTION_TEST}

test-unit:
	- ${DOCKER_RUN} ${UNIT_TEST}

test-infection:
	- ${DOCKER_RUN} ${INFECTION_TEST}