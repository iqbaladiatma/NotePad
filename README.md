# NotePad - A Modern Note-Taking Application

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## About NotePad

NotePad is a modern, feature-rich note-taking application built with Laravel. It provides a beautiful and intuitive interface for managing your notes with advanced features like priority levels, categories, and due dates.

## Features

-   📝 **Create and Manage Notes**

    -   Rich text content
    -   Title and description
    -   Priority levels (High, Medium, Low)
    -   Categories (Work, Personal, Shopping, Ideas, Tasks)
    -   Due dates with reminders

-   🔍 **Advanced Search and Filtering**

    -   Search notes by content
    -   Filter by categories
    -   Sort by various criteria:
        -   Latest/Oldest
        -   Title (A-Z/Z-A)
        -   Priority (High to Low/Low to High)
        -   Due Date

-   ✅ **Task Management**

    -   Mark notes as completed
    -   Visual indicators for completed tasks
    -   Priority-based organization

-   🎨 **Modern UI/UX**
    -   Responsive design
    -   Beautiful animations
    -   Dark/Light mode support
    -   Custom scrollbars
    -   Interactive hover effects

## Requirements

-   PHP >= 8.1
-   Composer
-   MySQL/PostgreSQL
-   Node.js & NPM (for frontend assets)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/notepad.git
cd notepad
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install NPM dependencies:

```bash
npm install
```

4. Create environment file:

```bash
cp .env.example .env
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Configure your database in `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=notepad
DB_USERNAME=root
DB_PASSWORD=
```

7. Run migrations:

```bash
php artisan migrate
```

8. Start the development server:

```bash
php artisan serve
```

9. In a separate terminal, compile assets:

```bash
npm run dev
```

## Usage

1. Register a new account or login with existing credentials
2. Start creating notes with the "Create New Note" button
3. Use the search and filter options to organize your notes
4. Set priorities and due dates for important notes
5. Mark notes as completed when finished

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
