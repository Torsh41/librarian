## Librarians - вебсайт

СТРУКТУРА ДИРЕКТОРИЙ
--------------------
      app/          Содержит файлы, связаные с фреймворком вебсайта (html, php, etc)
      app/web/      html, php, css, js, et.c. файлы
      log/          Будет содержать логи
      db/           Место бэкапа базы данных

GIT
---

Ссылка на github.com:
https://github.com/Torsh41/librarian

Для работы с Git я предлагаю использовать git cli. На Windows надо будет
установить расширение для IDE (см. Docker).

РАБОТА С GIT
------------
<!-- TODO -->
- Ввод информации о пользователе (обязательно 1 раз сделать):
    ```
    git config --global user.name "John Doe"
    git config --global user.email johndoe@example.com
    ```
- Инициализация проекта (в первый раз)
    ```
    git clone https://github.com/Torsh41/librarian.git
    git remote add origin https://github.com/Torsh41/librarian.git
    git checkout development
    ```
- Начало работы над задачей (создание ветки для задачи)
    ```
    git branch <new-branch-name>
    git checkout <new-branch-name>
    ```
- Создание commit-а (Обязательно в отдельной ветке! <-- пред. шаг)
    ```
    git add <filename>
    git commit -m <commit-message>
    ```
- Завершение работы над задачей (объединение ветки "feature")
    ```
    git checkout development
    git pull
    git merge feature
    ```
Если случился merge conflict - сочувствую. <!-- TODO: -->

- Подгрузка обновлений с github
    ```
    git pull
    ```
- Загрузка обновлений на github
    ```
    git push --set-upstream origin development
    ```
- Подгрузка и загрузка обновлений (в первый раз)
    ```
    git push --set-upstream origin development
    git pull --set-upstream origin development
    ```

DOCKER
------

Для пользования Docker на Windows, необходимо установить `Docker Desktop`.
Также нужно\*\* установить расширение для Docker-а в `IDE` (прим. VS Code, PHP
Storm).

Для запуска комманд нужно запустить интерактивную консоль в IDE (\*\* или
использовать windows powershell; комманду docker заменить на docker.exe).

Предполагается, что все комманды выполняются из корневой папки проекта.

Для пользователя Linux, он сам знает, что делать.


ДЕЙСТВИЯ
--------

- Запустить среду разработки:
    ```
    docker compose up -d --build
    ```
- Выключить среду разработки:
    ```
    docker compose down
    ```
- Удалить связанные контейнеры:
    ```
    docker compose rm
    ```
- Подключиться к контейнеру напрямую:
    ```
    docker exec -it librarian /usr/bin/bash
    ```
    Или
    ```
    docker exec -it librarian-db /usr/bin/bash
    ```
- Сделать бэкап БД:
    ```
    docker exec librarian-db mysqldump [--user yourusername] [--password=yourpassword] databasename > ./db/dump.sql
    ```
- Восстановить бэкап БД:
    ```
    docker exec -i librarian-db mysql [--user yourusername] [--password=yourpassword] databasename < ./db/dump.sql
    ```

ПОДКЛЮЧЕНИЕ
-----------

Для просмотра отображения вебсайта, необходимо подключиться к `localhost` на порт `8000`.

Для подключения к базе данных (phpmyadmin), нужно точно также подключиться к `localhost` на порт `8001`.

БАЗА ДАННЫХ
-----------

phpmyadmin слушает на `http://localhost:8001`. Логин по умолчанию - root;
пароль - example. В будующем это нужно заменить на что-то более реальное.
Желательно использовать `Docker secrets`.


#### Автоматизированные скрипты:

Все бэкап файлы имеют следующий формат:
<database-name>.sql

- Сделать бэкап всех баз данных (DATABASE) сгенерированных разработчиком:
    ```
    bash db-export.sh
    ```
- Востановить все базы данных (DATABASE) по бэкапом в дирректории `./db/`:
    ```
    bash db-import.sh
    ```


#### Отдельные комманды:

- Сделать бэкап отдельной таблицы:
    ```
    docker exec librarian-db mariadb-dump [--user yourusername] [--password=yourpassword] databasename > ./db/dump.sql
    ```
- Восстановить бэкап отдельной таблицы:
    ```
    docker exec -i librarian-db sh -c 'exec mariadb --user root --password=example <databasename>' < ./db/dump.sql
    ```
- Создание таблицы при первичнос запуске контейнера: (TODO: автоматизированый скрипт)
    ```
    docker exec librarian-db mariadb --user root --password=example --execute="CREATE DATABASE <databasename>;"
    ```


