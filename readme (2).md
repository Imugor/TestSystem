# Тестовое задание

## Задача

Вам необходимо осуществить натяжку готовой верстки на php 7.4 или 8 (допустимо использовать фреймворки Laravel, Yii2, Symfony, Slim, etc, а так же реализация на чистом php).

1. Создать базу данных (SQLite3) со следующими таблицами:
   1. Таблица `user` с полями:
      - `id` - `int`
      - `name` - `varchar(255)`
      - `email` - `varchar(255)`
      - `position` - `varchar(255)`
      - `password` - `varchar(255)`
      - `created_at` - `datetime`
      - `updated_at` - `datetime`
   2. Таблица `test_category` с полями:
      - `id` - `int`
      - `name` - `varchar(255)`
      - `created_at` - `datetime`
      - `updated_at` - `datetime`
   3. Таблица `test` с полями:
      - `id` - `int`
      - `user_id` - `int`
      - `name` - `varchar(255)`
      - `type` - `varchar(255)`
      - `attempt_count` - `int`
      - `time` - `int`
      - `category_id` - `int`
      - `description` - `text`
      - `created_at` - `datetime`
      - `updated_at` - `datetime`
   4. Таблица `my_test` с полями:
      - `id` - `int`
      - `test_id` - `int`
      - `user_id` - `int`
      - `date_start` - `datetime`
      - `date_end` - `datetime`
      - `created_at` - `datetime`
      - `updated_at` - `datetime`
   5. Таблица `my_test_answer` с полями (таблица заглушка):
      - `id` - `int`
      - `my_test_id` - `int`
      - `user_id` - `int`
      - `status` - `varchar(255)` (`passed`, `failed`, `new`)
      - `created_at` - `datetime`
      - `updated_at` - `datetime`
2. Заполнить таблицы демо данными.
3. Осуществить натяжку верстки из папки `frontend`
4. Реализовать функционал:
   1. Авторизация (`index.html`)
   2. Просмотр назначенных тестов (`my-tests.html`)
   3. Фильтрация назначенных тестов по категории
      > Должны отображаться только те категории, в которых есть назначенные тесты
   4. Прохождение теста (упрощенное)
      > При переходе на страницу прохождения теста в первый раз - создаем новую запись со статусом `new`, второй раз - обновляем статус на `passed` или `failed` в случайном порядке. После чего производим редирект на `my-tests.html`
   5. Просмотр архива тестов (`archive.html`)
      > Тест считается архивным в случае, если время его выполнения (`date_start`, `date_end`) истекли.
   6. Редактирование профиля (`my-profile.html`)
