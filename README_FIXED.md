# EssenceWebsite - Fixed Version

This version keeps the existing visual design, colours and main layout. The changes are focused on functionality, database storage/retrieval, navigation and security.

## Setup

1. Create/use the MySQL database named `essencewebsite`.
2. Open `.env` and set your own MySQL username/password.
3. From the project folder run:

```powershell
C:\xampp\php\php.exe artisan migrate
C:\xampp\php\php.exe artisan db:seed
C:\xampp\php\php.exe artisan serve
```

4. Open `http://127.0.0.1:8000`.

If dependencies are missing, run `composer install` first.

## Main fixed features

- Login, registration and logout use Laravel authentication and sessions.
- Passwords are hashed by Laravel.
- Cart belongs to the logged-in user.
- Cart quantity, remove and stock checks use MySQL.
- Checkout is saved to `orders` and `order_items`.
- Stock is reduced after an order is created.
- Cart is cleared after successful checkout.
- Order history is available under `Orders`.
- Users cannot view another user's orders or cart records.
- Contact form validates input and stores inquiries in MySQL.
- Business contact information is read from `business_details`.
- Catalog search, category, longevity and note filters work from the database.
- Product details load from the database.
- Buy Now adds the product and goes to checkout.
- Product reviews are stored in MySQL and displayed on the product page.
- Broken old HTML links and route names were replaced with Laravel routes.
- `localStorage` cart/checkout logic was removed so MySQL is the source of truth.
- Raw card/CVV information is not stored.

## Database tables added

- `orders`
- `order_items`
- `reviews`

The `carts` table now also stores `user_id`.

## Important

The `.env` included in this package does not contain a database password. Set your own local MySQL password before running migrations.
