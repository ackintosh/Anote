#!/bin/sh
cd ./anote/test
phpunit --coverage-text

exit $?
