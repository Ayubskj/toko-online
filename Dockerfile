# 1. Gunakan image PHP + Nginx yang sudah stabil
FROM richarvey/nginx-php-fpm:latest

# 2. Masukkan semua kode proyek ke dalam server
COPY . /var/www/html

# 3. Atur agar web mengarah ke folder public Laravel
ENV WEBROOT /var/www/html/public
ENV APP_ENV production

# 4. Instal library PHP secara otomatis (tanpa library testing)
RUN composer install --no-dev --optimize-autoloader

# 5. BERI IZIN AKSES FOLDER (Penting biar gak error 500!)
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Buka pintu akses internet
EXPOSE 80