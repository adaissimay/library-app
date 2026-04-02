# Library Management System - Laravel CRUD 

A practical demonstration of a Full-Stack CRUD (Create, Read, Update, Delete) application built with **Laravel 10**, **MariaDB**, and **Bootstrap 5**.

## Features
- **Create**: Add new books with title, author, year, and description.
- **Read**: View a responsive list of all library entries.
- **Update**: Edit existing book details with pre-filled forms.
- **Delete**: Remove entries with a confirmation safety check.
- **Validation**: Secure data entry (e.g., year must be a number).
- **UX**: Success flash messages for every action.

## Tech Stack
- **Framework**: Laravel 10
- **Database**: MariaDB (via XAMPP)
- **Frontend**: Blade Templates & Bootstrap 5
- **Server**: PHP Artisan

## Installation
1. Clone the repository: `git clone [https://github.com/adaissimay/library-app.git]`
2. Install dependencies: `composer install`
3. Configure your `.env` file (Database: `library_db`, Port: `3307`).
4. Run Migrations: `php artisan migrate`
5. Start the server: `php artisan serve`