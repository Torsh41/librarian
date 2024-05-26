#! /usr/bin/bash

# НЕ ИСПОЛЬЗУЙТЕ ТАКОЙ СКРИПТ В РЕАЛЬНОЙ БАЗЕ ДАННЫХ, так как у него большие
# проблемы с безопасностью
# DO NOT USE THIS SCRIPT IN A PRODUCTION DATABASE, because it lacks security
#
# Если что-то произойдет, Я не виноват


dir="./db"
files=$(ls $dir)
for file in $files; do
    db=$(echo $file | sed  's/.sql//g')

    # echo Creating Database \"$db\";
    echo $db
    query="CREATE DATABASE IF NOT EXISTS $db;"
    echo $query
    echo sudo docker exec librarian-db mariadb --user root --password=example --execute=\"$query\"
    sudo docker exec librarian-db mariadb --user root --password=example --execute="$query"

    echo Importing \"$db\" from \"$file\";
    sudo docker exec -i librarian-db sh -c "exec mariadb --user root --password=example $db" < $dir/$file
done
