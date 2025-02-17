# PaySwitch Visitor and Event Logger

A comprehensive visitor , key and device management logger for PaySwitch Com. Ltd.

## Table of Content

1.[Introduction](#introduction) 
2.[Features](#features) 
3.[Installation](#installation) 
4.[Usage](#usage) 
5.[Configuration](#configuration) 
6.[Contributing](#contributing) 
7.[References](#references) 
8.[Contact](#contact)

## Introduction

Previously, PaySwitch employed a manual paper-and-pen system to document events at security checkpoints. The process of recording visitor information was tedious and time-consuming, particularly when multiple people visited for the same purpose. Similarly, staff logging in their devices and department keys involved lengthy queues to sign in before retrieving the items. This app aims to streamline these processes, reducing the number of steps and the workload for both users(visitors and employees).

## Features

-   Authentication and Authorization
-   Create, view, update and delete Employees, Visits, Keys, Visitor Access Cards and Departments.
-   Auto-assign Access Cards to visitors on sign-up
-   Verify returning Visitors with OTP on subsequent visitors.
-   Record management with search and filter functionalities.

## Installation

### Prerequisites

-   PHP >= PHP 8.1
-   Laravel >= 10.0
-   Tailwind

### Steps

1. Clone the repository

    ```bash
    git clone https://github.com/Korkoe27/Payswitch-visitor-log-app.git
    cd Payswitch-visitor-log-app

    ```

2. Configure your environment

    - Rename the database in your env file
    - Configure the database connection

3. Install dependencies:

    ```bash
    composer install
    php artisan migrate:fresh --seed
    npm install & npm run build

    ```

4. Start the Application
    ```bash
    npm run dev
    php artisan serve
    ```

## Usage

1. Once you follow all the steps above there will be data seeded for testing.

2. Login with the admin credentials:

    - username: admin
    - password: admin

3. Test all the features.

## Configuration

No configuration needed.

## Contribution

1. [Fork the repository](https://github.com/Korkoe27/Payswitch-visitor-log-app.git)
2. Create a new branch: git checkout -b feature/YourFeatureName.

3. Commit your changes: git commit -m 'Add some feature'.

4. Push to the branch: git push origin feature/YourFeatureName.

5. Open a pull request.

## References

-   [Official Laravel Docs](https://laravel.com/docs/10.x)
-   [30 Days to learn Laravel by Laracasts.](https://www.youtube.com/watch?v=SqTdHCTWqks&t=2271s)

## Contact

This Laravel Application is designed by Chris Ashley and developed by Korkoe Dumashie.
