DOCKER_RUN = docker run --rm -it -v ${PWD}:/app -w /app gustavofreze/php:8.0.6

.PHONY: clean

configure:
	@${DOCKER_RUN} composer update --optimize-autoloader

test: test-unit-coverage test-mutation

test-unit:
	@${DOCKER_RUN} composer test-unit

test-unit-coverage:
	@${DOCKER_RUN} composer test-unit-coverage

test-mutation:
	@${DOCKER_RUN} composer test-mutation

show-coverage:
	@sensible-browser report/coverage-html/index.html

clean:
	@rm -rf report
