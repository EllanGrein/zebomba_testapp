## Zebomba Games - Test App

### Разворачивание проекта (local)

- Установить `Composer` и `Docker`
- Склонировать репозиторий: `git clone git@github.com:EllanGrein/zebomba_testapp.git`
- В корне проекта выполнить следующие команды:
- `cp .env.example .env`
- `composer install`
- `./vendor/bin/sail build`
- `./vendor/bin/sail up -d`
- После запуска контейнеров: `./vendor/bin/sail artisan key:generate`
- Выполнить миграции: `./vendor/bin/sail artisan migrate`
- Проект должен быть доступен по адресу http://0.0.0.0:10090

### Время, затраченное на выполнение задачи:

 - <>
