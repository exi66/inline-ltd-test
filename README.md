## Задание
1. Создать схему БД для хранения записей и комментариев к ним. SQL-запросы для создания БД поместить в отдельный файл.
2. Создать PHP скрипт, который скачает список записей и комментариев к ним и загрузит их в БД. По завершению загрузки, вывести в консоль надпись: "Загружено Х записей и Y комментариев"
3. Создать HTML-форму поиска записей по тексту комментария (поле ввода и кнопка "Найти"). Пример: при вводе "laudanti" нужно вывести все записи, в комментариях к которым есть эта строка. (имеется в этой записи https://jsonplaceholder.typicode.com/posts/6/comments). Поиск должен работать при вводе минимум 3-х символов. В результатах поиска вывести заголовок записи и комментарий с искомой строкой.

## Запустить
Поменять в `docker-compose.yml` пароль и название базы данных по усмотрению;  
Скопировать `.env-example` в `.env`, заменить `DB_HOST` на название сервиса базы данных в `docker-compose.yml`, по умолчанию `db`, заменить `DB_PASSWORD` на пароль базы данных в `docker-compose.yml`, если поменяли имя базы на прошлом шаге замените и здесь;   
Смонтировать composer в репозиторий `docker run --rm -v $(pwd):/app composer install`;  
Сменить владельца репозитория на `www-data` (или другого дефолтного http пользователя) - `sudo chown -R www-data:root ~/laravel-app`;  
Запустить `docker-compose up -d`;
Сгенерировать ключ `docker-compose exec app php artisan key:generate && docker-compose exec app php artisan config:cache`;  
Запустить миграцию `docker-compose exec app php artisan migrate`;  
Скачать тестовые данные командой `docker-compose exec app php artisan command:downloaddata`;  
