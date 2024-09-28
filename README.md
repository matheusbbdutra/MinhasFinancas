# Financial Dashboard Project

This project is a financial dashboard built with Vue.js and Symfony. It provides an overview of accounts, revenues, expenses, and credit card transactions.

## Installation

### Prerequisites

- Node.js and npm
- PHP and Composer
- Docker

### Steps

1. Clone the repository:
   ```sh
   git clone https://github.com/matheusbbdutra/financial-dashboard.git
   cd financial-dashboard

2. Install PHP dependencies:
    ```sh
    composer install

3. Install JavaScript dependencies:
   ```sh
    npm install
4. Set up environment variables:
   ```sh
    cp .env.example .env
   
5. Build assets:  
   ```sh
    npm run dev
6. Start the Docker containers:
   ```sh
   docker compose up -d --build

7 . Acess the dashboard: http://localhost:8000/dashboard
