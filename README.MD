//TODO Переделать 

Docker для Laravel приложения простого уровня

## 📁 Структура проекта
```
project/
├── _docker/
│   ├── app/
│   │   ├── Dockerfile      # Конфигурация PHP-контейнера
│   │   └── php.ini         # Настройки PHP
│   └── nginx/
│       └── conf.d/
│           └── nginx.conf  # Конфигурация Nginx
├── docker-compose.yml      # Оркестрация контейнеров
└── src/                    # Исходный код приложения НЕ ЗАБУДЬ ПОПРАВИТЬ .env для подключения к базе 
```

---

## 🐳 Файл docker-compose.yml
```yaml
services:
  nginx:
    image: nginx
    volumes:
      - ./src:/var/www/                    # Связка с исходным кодом
      - ./_docker/nginx/conf.d/:/etc/nginx/conf.d/  # Конфиги Nginx
    ports:
      - "8088:80"                          # Локальный порт 8088 → порт 80 в контейнере
    depends_on:
      - app                                # Сначала запустить app
    container_name: project_nginx
  
  app:
    build:
      context: .                           # Текущая директория как контекст сборки
      dockerfile: _docker/app/Dockerfile   # Путь к Dockerfile
    volumes:
      - ./src:/var/www/                    # Общий доступ к коду
    container_name: project_app
```
**Что делает:**
- Создает два сервиса: Nginx (веб-сервер) и app (PHP-FPM)
- Маппит папки для синхронизации кода
- Устанавливает зависимости между сервисами


---

## 🐘 Dockerfile PHP (app)
```dockerfile
FROM php:8.1-fpm                          # Базовый образ PHP 8.1 с FastCGI

# Установка системных пакетов
RUN apt-get update && apt-get install -y \
      apt-utils \                         # Утилиты apt
      libpq-dev \                         # Для работы с PostgreSQL
      libpng-dev \                        # Для работы с изображениями
      libzip-dev \                        # Для работы с архивами
      zip unzip \                         # Архиваторы
      git && \                            # Git для composer
      docker-php-ext-install pdo_mysql && \  # Расширение MySQL
      docker-php-ext-install bcmath && \     # Математические функции
      docker-php-ext-install gd && \         # Работа с графикой
      docker-php-ext-install zip && \        # Работа с ZIP
      apt-get clean && \                     # Очистка кэша
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Копирование конфигурации PHP
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1            # Разрешить суперпользователю
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin          # Глобальная установка Composer

WORKDIR /var/www                          # Рабочая директория
```
**Что делает:**
- Собирает образ с PHP 8.1 и необходимыми расширениями
- Устанавливает Composer для управления зависимостями PHP
- Настраивает рабочую директорию для приложения

---

## ⚙️ Файл php.ini
```ini
cgi.fix_pathinfo=0        # Безопасность: не исполнять произвольные файлы
max_execution_time = 1000 # Максимальное время выполнения скрипта (сек)
max_input_time = 1000     # Максимальное время обработки входных данных
memory_limit=4G           # Лимит памяти для PHP
```

---

## 🌐 Конфигурация Nginx (nginx.conf)
```nginx
server {
    index index.html index.php;           # Файлы индекса по умолчанию
    error_log  /var/log/nginx/error.log;  # Лог ошибок
    access_log /var/log/nginx/access.log; # Лог доступа
    root /var/www/public;                 # Корневая папка Laravel

    location / {
        try_files $uri /index.php;        # Роутинг через index.php
        # Отключение кэширования для разработки
        add_header Last-Modified $date_gmt;
        add_header Cache-Control 'no-store, no-cache';
        if_modified_since off;
        expires off;
        etag off;
    }

    # Обработка PHP файлов
    location ~ \.php$ {
       try_files $uri =404;               # Проверка существования файла
       fastcgi_split_path_info ^(.+\.php)(/.+)$;
       fastcgi_pass app:9000;             # Передача в PHP-FPM контейнер
       fastcgi_index index.php;
       include fastcgi_params;            # Параметры FastCGI
       fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
       fastcgi_param PATH_INFO $fastcgi_path_info;
    }
}
```

---

## 🚀 Первый запуск Laravel

### 1. Установка Laravel в контейнере app
```bash
`docker exec -it project_app composer create-project laravel/laravel .`
```
**Что делает:**
- Устанавливает фреймворк Laravel в папку `/var/www/` контейнера
- Синхронизируется с локальной папкой `src/` через volume

### 2. Генерация ключа приложения (если ошибка 500)
```bash
docker exec -it project_app php artisan key:generate
```
**Что делает:**
- Генерирует `APP_KEY` в `.env` файле Laravel
- Решает проблему "No application encryption key has been specified"

### 3. Настройка прав доступа
```bash
docker exec -it project_app chmod -R 775 storage bootstrap/cache
```

---

## 📌 Важные моменты

### Связка папок (volumes)
- `./src:/var/www/` — код приложения доступен и в контейнере, и локально
- Изменения в локальной папке `src/` сразу видны в контейнере

### Порты
- Приложение доступно по адресу: `http://localhost:8088`
- Nginx слушает порт 80 внутри контейнера
- Пробрасывается на локальный порт 8088

### Сервисы
- **Nginx** — принимает HTTP запросы, отдает статику, проксирует PHP
- **app (PHP-FPM)** — обрабатывает PHP код, работает на порту 9000

---

## 🔧 Основные команды

```bash
# Запуск
docker compose up -d

# Остановка
docker compose down

# Логи
docker compose logs -f nginx
docker compose logs -f app

# Вход в контейнер
docker exec -it project_app bash
docker exec -it project_nginx bash

# Composer команды
docker exec -it project_app composer install
docker exec -it project_app composer update

# Artisan команды
docker exec -it project_app php artisan migrate
docker exec -it project_app php artisan tinker
```

---

## ⚠️ Возможные проблемы

### Ошибка 500 после установки Laravel
```bash
# Решение:
docker exec -it project_app php artisan key:generate
docker exec -it project_app php artisan cache:clear
```

### Изменения не применяются
```bash
# Перезагрузка Nginx:
docker exec -it project_nginx nginx -s reload
```

### Composer требует много памяти
```bash
# В файле php.ini уже установлено memory_limit=4G
```