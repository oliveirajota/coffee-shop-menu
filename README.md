# Interactive Mobile Menu for Bars, Pubs, and Coffee Shops

An intuitive and user-friendly mobile menu designed for bars, pubs, and coffee shops. This interactive tool enhances the customer experience by providing a seamless way to browse and order items. It includes an admin panel for easy product management.

## Features

### Admin Tool

- **Add Products**: Easily add new products to your menu, complete with prices, images, and detailed descriptions.
- **Activate/Deactivate Products**: Manage your menu in real-time by activating or deactivating products based on availability.
- **Organize by Groups**: Categorize your menu items into groups (e.g., Beverages, Snacks, Cocktails) for easy navigation.

## Getting Started

### Prerequisites

Before you start, ensure you have the following installed:

- PHP >= ^7.3|^8.0
- Laravel = 7.3
- Composer
- MySQL or another supported database
- Web server (Apache, Nginx, etc.)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/coffee-shop-menu.git
    cd coffee-shop-menu
    ```

2. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

3. Copy the `.env.example` file to create your environment configuration:

    ```bash
    cp .env.example .env
    ```

4. Set up your environment variables in the `.env` file, including database credentials and any other necessary configurations.

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run database migrations to create the necessary tables:

    ```bash
    php artisan migrate
    ```

7. (Optional) Seed the
