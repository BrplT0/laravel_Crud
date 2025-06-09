# Laravel Student Management System

A modern, full-featured student management system built with Laravel and Tailwind CSS. This application provides a comprehensive solution for managing students, cities, and their relationships with a beautiful, responsive user interface.

## Features

- 🔐 **Authentication & Authorization**
  - Secure login and registration system
  - Protected routes and resources
  - User profile management

- 👥 **Student Management**
  - Create, read, update, and delete student records
  - Associate students with cities
  - Soft delete functionality with trash management
  - Email validation and unique constraints

- 🏙️ **City Management**
  - CRUD operations for cities
  - Soft delete support
  - Relationship management with students

- 📧 **Contact System**
  - Contact form with email functionality
  - Form validation and error handling
  - Success notifications

- 🗑️ **Trash Management**
  - View deleted items
  - Restore deleted records
  - Permanent deletion option
  - Separate management for students and cities

## Technical Stack

- **Backend Framework:** Laravel 10
- **Frontend:** 
  - Tailwind CSS
  - Alpine.js
  - Blade Templates
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **Styling:** Custom dark theme with modern UI components

## Installation

1. Clone the repository:
```bash
git clone https://github.com/BrplT0/laravel-student-management.git
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure your environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up your database in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_berat
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations:
```bash
php artisan migrate
```

6. Start the development server:
```bash
php artisan serve
npm run dev
```

## Usage

1. Register a new account or login
2. Navigate to the dashboard
3. Use the navigation menu to access different features:
   - Students management
   - Cities management
   - Contact form
   - Trashed items
   - User profile

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author

- GitHub: [@BrplT0](https://github.com/BrplT0)

## Acknowledgments

- Laravel Team for the amazing framework
- Tailwind CSS for the utility-first CSS framework
- All contributors and supporters of the project
