# Modules Example API

## 1. Запуск локальной версии

Для запуска локальной версии необходимо следать следующее:

- Скопировать содержимое файла .env.local в файл .env;
- Запустить в корневой директории команду
```shell script
docker-compose up
```

- Подключиться к Docker-контейнеру с php-fpm путем выполнения в корневой директории команды:
```shell script
./deployment/local/scripts/php_fpm_bash.sh
```

- внутри контейнера выполнить команду:
```shell script
php artisan migrate
```

## 2. Просмотр документации

Для просмотра документации необходимо перейти по адресу
http://127.0.0.1:31080/dev-tools/docs.
Если проект запущен не на порту 31080, а на другом порту, необходимо
подставить его в URL, указанный выше.
