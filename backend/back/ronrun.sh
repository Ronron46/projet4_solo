#!/bin/bash

if [ "$(ls -1q | wc -l)" = 2 ] && [ -e ronrun.sh ] && [ -e install ]
then 
    composer create-project symfony/skeleton:"7.3.x" temp
    mv ./temp/* ./
    rm -rf temp/
    cp install/.env ./
fi

if [ -e migrations ] && [ -n "$( ls -A ./migrations/ )" ]
then
    php bin/console doctrine:migrations:migrate --no-interaction
fi

if [ -n "$( ls -A | grep composer.lock )" ]
then
    composer install
fi

apache2-foreground