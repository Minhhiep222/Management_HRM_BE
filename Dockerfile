# Sử dụng PHP với Apache
FROM php:8.2-apache

# Cài đặt các extension cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Sao chép mã nguồn Laravel vào container
COPY . .

# Chỉnh quyền truy cập cho thư mục storage
RUN chown -R www-data:www-data /var/www/html/storage

# Cấu hình cho Laravel (nếu cần)
RUN cp .env.example .env \
    && php artisan key:generate

# Mở port 80
EXPOSE 80

# Chạy lệnh khởi động Apache apache2-foreground
CMD ["php artisan serve"]
