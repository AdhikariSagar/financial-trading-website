<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Project

Welcome to our Laravel project! This README will guide you through setting up and running the application, including project information, technical specifications, and detailed instructions for installation and execution.

## Table of Contents

- [Project Information](#project-information)
- [Technical Specifications](#technical-specifications)
- [Installation](#installation)
- [Running the Application](#running-the-application)
- [Database Management](#database-management)
- [Additional Notes](#additional-notes)
- [Contributing](#contributing)
- [License](#license)

## Project Information

### Overview

This project is a web application designed to display financial instruments with an optimal UI/UX design. The financial instruments are provided in three unique JSON files with different data structures: `exchange.json`, `metadata.json`, and `candle.json`. Each JSON file contains data for various types of financial instruments:

### JSON Files

1. **exchange.json:** Contains data related to exchanges and trading platforms.
2. **metadata.json:** Provides metadata information for financial instruments.
3. **candle.json:** Includes historical price data in candlestick format for financial analysis.

### Financial Instrument Types

- **Stock:** Shares of individual companies.
- **Cryptocurrency:** Digital or virtual currencies using cryptography for security.
- **Exchange Traded Commodity (ETC):** Commodities traded on exchanges.
- **Exchange Traded Fund (ETF):** Funds traded on stock exchanges, holding assets such as stocks or bonds.
- **Fund:** Pooled investment vehicles, including mutual funds and hedge funds.
- **Index:** Statistical measures of changes in a securities market.
- **Commodity:** Basic goods used in commerce that are interchangeable with other goods of the same type.
- **Mutual Fund:** Investment programs funded by shareholders that trade in diversified holdings.

### Unique Identifiers

- **Symbol:** A shorthand representation of the financial instrument, often used in trading.
- **ISIN:** A 12-character alphanumeric code that uniquely identifies a specific financial instrument.
  
### Features
- It is built using the Laravel framework, providing a robust and scalable solution for web development.
- **Data Integration:** Import and process data from three JSON files with distinct formats.
- **Financial Instruments Display:** Show detailed information for various types of financial instruments.
- **Responsive Design:** Ensure the application is usable across different devices with a focus on a great user experience.


## Technical Specifications

- **Framework:** Laravel 11.x
- **Programming Language:** PHP 8.2+
- **Database:** MySQL 8.0+
- **Dependencies:**
  - Composer
  - tinker

## Installation

### Prerequisites

Before you begin, ensure you have the following installed:

- PHP (>= 7.4)
- Composer
- MySQL DataBase

### Steps

1. **Clone the repository:**
   ```bash
   git clone git@github.com:AdhikariSagar/financial-trading-website.git
   cd financial-trading-website
   ```
2.  **Install Composer dependencies:**
    ```bash
    composer install 
    ```

3.  **Copy the .env.example file:**
    ```bash
    cp .env.example .env
    ```
    - use Powershell for Window
      
4.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Configure your MySQL database:**
    - Open the .env file in your project root directory and update the following lines with your MySQL credentials:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[your_database_name]
    DB_USERNAME=[your_database_username]
    DB_PASSWORD=[your_database_password]

    ```
6.  **Run database migrations::**
    ```bash
    php artisan migrate
    ```
7.  **Run the Application:**
   Once you have completed the installation steps above, you can run the Laravel development server using the following command:
    ```bash
    php artisan serve
    ```
### Refreshing the Database and Running Seeders

If you need to refresh the database and run the seeders, you can do it in one step:
**Refresh the Database and Run Seeders:**
   ```bash
    php artisan migrate:refresh --seed
   ```
Additional Notes
    * Environment Variables: Make sure your .env file is correctly set up with all necessary configurations.
    * Logging: Check the storage/logs/laravel.log file for any errors or issues.
    * Using MySQL Workbench or Similar Tools: If you prefer a GUI tool to manage your MySQL database, you can use MySQL Workbench or any other MySQL management tool to interact with your database.
    
    
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Sagar Adhikari via [sagar.adhikari86@gmail.com] (mailto:sagar.adhikari86@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
