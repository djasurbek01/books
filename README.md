# Установка проекта

## Системные требования
- **PHP 8.3**
- **Composer**
- **Laravel 11**
- **MySQL 8**

---

## Клонирование репозитория
```sh
git clone https://github.com/djasurbek01/books.git
cd books
```

---

## Установка зависимостей
```sh
composer install
```

Установка **npm / Vite**:
```sh
npm install && npm run dev
```

---

## Создание .env файла
```sh
cp .env.example .env
```
Открываем `.env` и настраиваем базу данных:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

---

## Генерация ключа приложения
```sh
php artisan key:generate
```

---

## Запуск миграций и сидеров
```sh
php artisan migrate --seed
```

---

## Создание симлинка для хранения файлов
```sh
php artisan storage:link
```

---

## Запуск локального сервера
```sh
composer run dev
```
Адрес проекта:
`http://127.0.0.1:8000`

