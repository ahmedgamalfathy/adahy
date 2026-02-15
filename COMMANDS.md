# ⚡ أوامر سريعة - Quick Commands

## 🚀 البدء السريع

```bash
# 1. تحديث Autoload
composer dump-autoload

# 2. مسح Cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# 3. عرض Routes
php artisan route:list | grep reservation

# 4. تشغيل السيرفر
php artisan serve
```

---

## 🧪 الاختبار

### عرض جميع Routes

```bash
php artisan route:list
```

### عرض Routes الحجوزات فقط

```bash
php artisan route:list --name=reservation
```

### اختبار Service في Tinker

```bash
php artisan tinker
```

```php
// في Tinker
$service = app(\App\Services\Reservation\ReservationService::class);
$reservations = $service->getFilteredReservations(['gov_type' => 12]);
dd($reservations);
```

---

## 🔧 الصيانة

### مسح جميع الـ Cache

```bash
php artisan optimize:clear
```

أو بشكل منفصل:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### إعادة بناء الـ Cache

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📊 التحقق من الأخطاء

### عرض Logs

```bash
# Windows
type storage\logs\laravel.log

# أو افتح الملف مباشرة
notepad storage\logs\laravel.log
```

### مراقبة Logs مباشرة

```bash
# إذا كان لديك tail (Git Bash)
tail -f storage/logs/laravel.log
```

---

## 🗄️ قاعدة البيانات

### تشغيل Migrations

```bash
php artisan migrate
```

### إعادة بناء قاعدة البيانات

```bash
php artisan migrate:fresh --seed
```

### التحقق من الاتصال

```bash
php artisan tinker
```

```php
DB::connection()->getPdo();
```

---

## 🧹 التنظيف

### حذف Logs القديمة

```bash
del storage\logs\*.log
```

### مسح Sessions

```bash
php artisan session:clear
```

---

## 📦 Composer

### تحديث Dependencies

```bash
composer update
```

### تثبيت Package جديد

```bash
composer require package/name
```

### Autoload

```bash
composer dump-autoload
```

---

## 🎨 Frontend

### تثبيت NPM Packages

```bash
npm install
```

### Build للتطوير

```bash
npm run dev
```

### Build للإنتاج

```bash
npm run build
```

### Watch للتغييرات

```bash
npm run watch
```

---

## 🔐 الأمان

### توليد App Key

```bash
php artisan key:generate
```

### مسح Compiled Classes

```bash
php artisan clear-compiled
```

---

## 📝 إنشاء ملفات جديدة

### Controller

```bash
php artisan make:controller Reservation/ReservationController --resource
```

### Model

```bash
php artisan make:model Reservation -m
```

### Request

```bash
php artisan make:request Reservation/StoreReservationRequest
```

### Policy

```bash
php artisan make:policy ReservationPolicy --model=Reservation
```

### Middleware

```bash
php artisan make:middleware CheckPermission
```

### Migration

```bash
php artisan make:migration create_reservations_table
```

---

## 🧪 Testing

### تشغيل جميع Tests

```bash
php artisan test
```

### تشغيل Test معين

```bash
php artisan test --filter ReservationTest
```

### إنشاء Test

```bash
php artisan make:test ReservationTest
```

---

## 🔍 Debugging

### تفعيل Debug Mode

في `.env`:
```
APP_DEBUG=true
```

### عرض معلومات التطبيق

```bash
php artisan about
```

### عرض Environment

```bash
php artisan env
```

---

## 📊 Performance

### تحسين الأداء

```bash
php artisan optimize
```

### عرض الاستعلامات البطيئة

في `.env`:
```
DB_LOG_SLOW_QUERIES=true
DB_SLOW_QUERY_TIME=1000
```

---

## 🔄 Git

### حفظ التغييرات

```bash
git add .
git commit -m "feat: add reservation module"
git push origin main
```

### إنشاء Branch

```bash
git checkout -b feature/reservation-refactor
```

### دمج Branch

```bash
git checkout main
git merge feature/reservation-refactor
```

---

## 📞 الدعم

### التحقق من إصدار Laravel

```bash
php artisan --version
```

### التحقق من إصدار PHP

```bash
php -v
```

### التحقق من Composer

```bash
composer --version
```

---

## ⚡ أوامر مجمعة

### Setup كامل

```bash
composer install && npm install && cp .env.example .env && php artisan key:generate && php artisan migrate --seed
```

### تنظيف كامل

```bash
php artisan optimize:clear && composer dump-autoload
```

### Deploy سريع

```bash
git pull && composer install --no-dev && npm run build && php artisan migrate --force && php artisan optimize
```

---

**آخر تحديث:** 2026-02-14
