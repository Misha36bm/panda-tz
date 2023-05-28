# Panda Team Test

## Задача: https://docs.google.com/document/d/1fvu97c7y0x-ZJvSwKMS-arWxvnEuS_BB/edit

## Завдання:

1. Користувач сервісу повинен мати можливість зайти на публічну частину програми, зареєструватись тп створити будь-яку кількість опитувань. [✅]

2. Аутентификація на сервісі (реєстрація, логін, розлогін) [✅]

3. От пользователя нужен только email и пароль (Додав Ім'я тільки для відображення в меню) [✅]

4. Особистий кабінет. Мая такий функціонал:
    - Має розділ зі списком опитувань створених користувачем.[✅]
    - Сортування списку за датою створення, заголовком, статусом [✅/❌] (не працює режим сортування за статусом так як не вийшло налаштувати пакет "datatables" який цим займається)
    - CRUD для управління опитуваннями. [✅]

5. Кожне опитування має:
        - Заголовок
        - Будь-яку кількість варіантів відповідей
        - Кількість голосів за варіант відповіді
        - Статус опубліковано чи ні [✅]

# API [✅]

Апі працює за посиланням "/api/get-random-quiz".

## Параметри:

- В "headers" очікується параметр "X-Api-Key", з апі ключем користувача. Ключ користувача можна отримати в його особистому кабінеті.

Приклад запиту:

    curl --location --request POST 'http://panda-team-tz.pp.ua/api/get-random-quiz' --header 'X-Api-Key: $2y$10$0Q/DKD095MOlllCLETDl6OOxxu9i8Nth/BftNDKqV9uZY.iyIVLXa'

Приклад відповіді:

    {
        "quiz-title": "Якого кольору небо?",
        "total-votes": 5,
        "quiz-options": [
            {
                "option-text": "blue",
                "option-votes": 2,
                "is-correct": 0
            },
            {
                "option-text": "red",
                "option-votes": 3,
                "is-correct": 1
            }
        ]
    }

У випадку коли запит прийшо з неправильним ключем, у відповідь отримаєм 403 помилку.

# У проекті було використано такі пакети:

## composer:

- illuminate/database - для підключення до бази данних
- nikic/fast-route - для налаштування роутингу.
- vlucas/phpdotenv - для роботи з конфігом .env глобально.

- filp/whoops - для дебагу
- symfony/var-dumper - для дебагу

## JS:

- Bootstrap 5.3.0
- Jquery 3.7.0
- DataTable 1.13.4 - для сортування таблиць в частині користувача


# GOOG LUCK!!!
