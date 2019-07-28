# Сервис поиска работников

## Содержание

* [Разворачивание сайта на сервере](#разворачивание-сайта-на-сервере)
* [Конфигурация сервера](#конфигурация-сервера)
* [Подкличение к базе данных](#подкличение-к-базе-данных)
* [Применение миграций](#применение-миграций)
* [Загрузка фикстур](#загрузка-фикстур)
* [Установка redis](#установка-redis)

## Разворачивание сайта на сервере

* Склонировать репозитори и перейти в каталог проекта

```
$ git clone https://github.com/denyev/ksi.git && ksi
```

* Установить `composer`

```
$ sudo apt update
$ sudo apt install composer
```

* Обновить зависимости

```
$ composer update
```

## Конфигурация сервера

В конфигруционных файлах веб-сервера необходимо указать _абсолютный пусть_ к публичной директории `web`, которая находится в корне проекта.

* Для веб-сервера `Apache` необходимо указать путь в директиве `DocumentRoot`:

```apacheconfig
DocumentRoot /path/to/web
```

* Для веб-сервера `Nginx` — в директиве `root`

```
root /path/to/web;
```

## Подкличение к базе данных

Для подключения к БД необходимо переименовать файл `db.example.php`, который находится в папке `config` проекта, в файл `db.php`

```
$ cd config && cp -v db.php db.example.php
```

И указать в файле `db.php` реквизиты подключения к БД.

## Применение миграций

В корне проекта необходимо выполнить команду

```
$ php yii migrate
```

## Загрузка фикстур

```
$ php yii fixture/load '*' --namespace='app\fixtures'
```

## Установка redis

* Для настройки кеширования можно установить `redis`

```
$ sudo apt update
$ sudo apt install redis-server
```

* После установки необходимо указать в конфигурационном файле

```
$ sudo vim /etc/redis/redis.conf
```

* следующую строку
 
```
supervised systemd
```

* И перезапустить сервис в `systemd`
  
```
$ sudo systemctl restart redis.service
```

* В конфигурационном файле сайта `config/web.php` необходимо указать настройки подключения к серверу `redis` и настройки кеширования

<details>
<summary>Пример настроек</summary>
<pre>
    <code>
    'redis' => [
        'class' => 'yii\redis\Connection',
        'hostname' => 'localhost',
        'port' => 6379,
        'database' => 0,
    ],
    'session' => [
        'class' => 'yii\redis\Session',
    ],
    'cache' => [
        'class' => 'yii\redis\Cache',
    ],
    </code>
</pre>
</details>
















