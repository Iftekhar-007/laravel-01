# Multi-vendor Marketplace — Laravel Assignment (partial)

**Status:** ✅ Implemented tasks 1–5 (Basic CRUD, Auth & Roles, Product/Category, Cart & Checkout, Vendor Dashboard)

> This repository contains my implementation for the Laravel Developer test assignment. I completed tasks 1 through 5. Below are setup instructions, features implemented, how to test, and notes about what remains (task 6 — Commission System and optional bonus tasks).

---

## 📌 Tech stack

* PHP 8.x
* Laravel 10.x
* MySQL
* Tailwind CSS / Blade
* Livewire (optional parts)
* Spatie Laravel Permission (roles & permissions)

---

## 📝 Features Implemented (Detailed)

* **Authentication (Manual)**

  * Custom authentication system (login/register).
  * Admin can log in and manage everything.

* **Role Management**

  * Admin can create and manage **Admin** and **Vendor** accounts.
  * Admin can add Vendors manually.
  * Vendors can only manage their own products.

* **Dashboard (Separate Panels)**

  * **Admin Dashboard**: Manage all products, users, and orders.
  * **Vendor Dashboard**: Vendors can see their own products, orders, and sales report.

* **Product Management**

  * CRUD (Add, Edit, Delete, List).
  * Pagination implemented (products available via Seeder).
  * Multiple image upload supported.

* **Category & Subcategory**

  * Vendors must select a category when uploading products.

* **Cart System**

  * Add to cart, update quantity, remove products.
  * Cart page implemented.
  * Basic checkout process creates an order (no payment integration).

---

## 🔧 Installation (local)

1. Clone repo:

```bash
git clone https://github.com/YOUR_USERNAME/your-repo.git
cd your-repo
```

2. Install dependencies:

```bash
composer install
npm install
npm run dev
```

3. Copy `.env` and set DB credentials and `APP_URL`:

```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations & seeders:

```bash
php artisan migrate --seed
```

5. Create storage symlink:

```bash
php artisan storage:link
```

6. Start server:

```bash
php artisan serve
```

---

## ⚙️ Seeded accounts (example)

* **Admin**: `admin@example.com` / `password` (seeded)
* **Vendor**: `vendor@example.com` / `password` (seeded)

> Update these credentials in `Database/Seeders` or `.env` before pushing to public repo if you want different values.

---

## 🗂 Important routes (web)

* `/products` — public listing
* `/products/create` — vendor add product (protected)
* `/cart` — view cart
* `/checkout` — create order
* `/vendor/dashboard` — vendor area
* `/admin` — admin area

(Adjust route prefixes or names in your `routes/web.php`.)

---

## 🧩 Database overview (key tables)

* `users` (roles)
* `roles`, `model_has_roles` (Spatie)
* `categories`, `subcategories`
* `products`, `product_images`
* `carts` (optional) / session handling
* `orders`, `order_items`

---

## ✅ How to test the implemented parts quickly

1. Login as seeded Admin and Vendor.
2. As Vendor: create product, upload multiple images, assign category/subcategory.
3. As Guest/User: add product to cart and go through checkout.
4. As Vendor: check vendor dashboard for orders and sales report.
5. As Admin: view all orders, vendor activities, and manage roles.

---

## 🔜 What remains (Task 6 + Bonus)

**Task 6 — Commission System** (not implemented yet):

* Create `commissions` table: records per order, with `order_id`, `vendor_id`, `amount`, `percentage`, `admin_amount`, `vendor_amount`, `status`.
* On order creation, calculate commission (e.g., 10% configurable) and store a commission record.
* Show commission report to Admin and show payouts to Vendor.
* Consider using Laravel Events (e.g., `OrderPlaced`) and a Listener that calculates & records commission.

**Bonus (optional)**

* Small REST API for products and orders — create API resources and routes in `routes/api.php`.
* Use AJAX or Livewire to show live metrics on vendor dashboard.

---

## 🧭 Implementation tips to finish Task 6 (quick plan)

1. Migration for commissions:

```php
Schema::create('commissions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')->constrained()->onDelete('cascade');
    $table->foreignId('vendor_id')->constrained('users');
    $table->decimal('percentage', 5, 2);
    $table->decimal('admin_amount', 10, 2);
    $table->decimal('vendor_amount', 10, 2);
    $table->string('status')->default('recorded');
    $table->timestamps();
});
```

2. Order flow: when order is stored, in the controller calculate totals per vendor and create commission rows.
3. Or better: dispatch `OrderPlaced` event and handle commission calculation in a Listener.

---

## 📎 README checklist (before submit)

* [ ] Update README with live demo link (if any)
* [ ] Add screenshots or GIFs showing the product CRUD and vendor dashboard
* [ ] Include SQL dump or `.env.example` showing example DB settings (do NOT commit secrets)
* [ ] Add instructions how to run seeders and example credentials
* [ ] Document remaining tasks and short plan (we already included this)

---

Good luck — you’ve done solid work so far 👌. This README now reflects all completed parts (manual login, role management by Admin, separate dashboards, cart system, pagination with seed data).
