# Assesment Divixel
 
Cara menginstall. 

1. Clone / download Repository
2. Buka folder aplikasi. kemudian jalankan "`composer install`" pada terminal command
3. Rename file .env.example menjadi .env dengan perintah "`cp .env.example .env`" pada terminal command
4. Ubah value "`DB_DATABASE`" sesuai dengan nama database anda
5. jalankan command "`php artisan key:generate`" pada terminal command
6. kemudian jalankan kembali command "`php artisan migrate --seed`"
7. Jalan kan aplikasi dengan command "`php artisan serve`"

Pada Aplikasi ini telah ada data dummy untuk akses login pada masing-masing rolenya
- Role Owner  = owner@owner.com | 123456
    - Role Owner memiliki akses untuk membuat User dan Role 
- Role Staff  = staff@staff.com | 123456
    - Role Staff memiliki akses untuk membuat data product 


Link Url Demo "`https://assesment.febryancaesarpratama.com/`"
