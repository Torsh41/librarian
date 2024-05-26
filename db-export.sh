#! /usr/bin/bash

# НЕ ИСПОЛЬЗУЙТЕ ТАКОЙ СКРИПТ В РЕАЛЬНОЙ БАЗЕ ДАННЫХ, так как у него большие
# проблемы с безопасностью
# DO NOT USE THIS SCRIPT IN A PRODUCTION DATABASE, because it lacks security
#
# Если что-то произойдет, Я не виноват


dbs=$(sudo docker exec librarian-db mariadb --user root --password=example --execute='show databases where `database` not in ("information_schema");')
dbs=$(echo $dbs | sed -E 's/Database|mysql|performance_schema|sys//g')
for db in $dbs; do
    dump="./db/$db.sql"

    echo Exporting \"$db\" into \"$dump\";
    sudo docker exec librarian-db mariadb-dump --user root --password=example $db > $dump
done
