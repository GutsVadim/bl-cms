******************************
===================================

Проект работает на yii framework 2.0

### Ссылки:
1. Yii Framework
    - [Официальный сайт](http://www.yiiframework.com/) <br>
    - [Официальная документация](http://www.yiiframework.com/doc-2.0/) <br>
    - [Русскоязычное руководство](https://yiiframework.com.ua/ru/doc/guide/2/) <br>
2. AngularJS Framework
    - Официальный сайт: [[eng]](https://angularjs.org/) / [[ru]](http://angular.ru/)
    - Документация: [[eng]](https://docs.angularjs.org/api) / [[ru]](http://angular.ru/api/)
    - Руководство разработчика: [[eng]](https://docs.angularjs.org/guide) / [[ru]](http://angular.ru/guide/)
3. Полезные статьи
    - [AngularJS and Yii2 Part 1: Routing](http://blog.neattutorials.com/angularjs-yii2-part-1-routing/)
    - [AngularJS and Yii2 Part 2: Authentication](http://blog.neattutorials.com/angularjs-and-yii2-part-2-authentication/)

СТРУКТУРА ПРОЕКТА
-------------------

```
common
    config/              настройки общие для сайта (frontend) и админки (backend)
    mail/                шаблоны имейлов
    models/              модели общие для сайта (frontend) и админки (backend)
console
    config/              настройки консольного приложения
    controllers/         контроллеры консольного приложения (команды)
    migrations/          миграции базы данных
    models/              модели для консольного приложения
    runtime/             файлы сгенерированные во время работы приложения
backend
    assets/              здесь находятся картинки, CSS, JS
    config/              конфигураия для приложения админки
    controllers/         классы контроллеров
    models/              модели админки
    runtime/             файлы сгенерированные во время работы приложения
    views/               вьюхи
    web/                 тут находится входной скрипт, и ресурсы
frontend
    assets/              здесь находятся картинки, CSS, JS
    config/              конфигураия для приложения сайта
    controllers/         классы контроллеров
    models/              модели сайта
    runtime/             файлы сгенерированные во время работы приложения
    views/               вьюхи
    web/                 тут находится входной скрипт, и ресурсы
    widgets/             виджеты
vendor/                  пакеты
environments/            среды которые используются при установке приложения
tests                    тесты
```

УСТАНОВКА
------------

Для нормально работы проекта необходимо использовать PHP 5.4.0 версии.

1. Склонировать репозиторий
2. Установить приложение при помощи консольной команды ``` php init ```
3. Настроить подключение к базе данных в конфигурации проекта
4. Применить миграции базы данных испотзуя консльную команду ``` php yii migrate ```