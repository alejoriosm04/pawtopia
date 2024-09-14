# Pawtopia 🐶

At Pawtopia, we create the perfect paradise for your pet. Explore our range of personalized products and services designed to give your furry friend the best care. Let your pet experience the Pawtopia difference today!

## Install

### Step 1: Prerequisites
Make sure you have the following installed:
- **PHP >= 8.2** (You can use tools like XAMPP, MAMP, or WAMP for local development)
- **Composer** (Dependency manager for PHP)
- **Git** (To clone the repository)
- **Node.js & NPM** (For frontend assets)
- **MySQL** (Or another database supported by Laravel)

### Step 2: Clone the Laravel Project from GitHub

Open your terminal and navigate to the directory where you want to clone the project, then run:

```bash
git clone git@github.com:alejoriosm04/pawtopia.git
```

Once cloned, navigate into the project directory:

```bash
cd pawtopia
```

### Step 3: Install Dependencies

Run Composer to install all necessary PHP dependencies:

```bash
composer install
```

If there are any errors related to missing extensions or PHP versions, ensure you meet the requirements listed in the `composer.json` file or the Laravel 11 documentation.

### Step 4: Set Up Environment Variables

1. Copy the `.env.example` file to create your `.env` file:

```bash
cp .env.example .env
```

2. Open the `.env` file and update the following values:
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=3306`
   - `DB_DATABASE=your_database`
   - `DB_USERNAME=your_username`
   - `DB_PASSWORD=your_password`

   Adjust them according to your local database setup.

### Step 5: Generate Application Key

Laravel requires an application key for encryption. Generate it by running:

```bash
php artisan key:generate
```

This will set the `APP_KEY` value in your `.env` file.

### Step 6: Run Database Migrations

Set up the database tables by running the migration command:

```bash
php artisan migrate
```

If you have seeders, you can also seed the database with:

```bash
php artisan db:seed
```

### Step 8: Serve the Application

You can now run the Laravel application locally using the built-in PHP server:

```bash
php artisan serve
```

This will start the server at `http://127.0.0.1:8000`.