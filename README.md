# Dashboard de Finanças Pessoais

Este projeto é um painel financeiro construído com Vue.js e Symfony. Ele fornece uma visão geral de contas, receitas, despesas e transações com cartão de crédito.

### Pré-requisitos

- Docker

### Passos

1. Clonar o repositorio:
   ```sh
   git clone https://github.com/matheusbbdutra/financial-dashboard.git
   cd financial-dashboard
   
2. Iniciar o docker compose:
   ```sh
   docker compose up -d --build
   
3. Acessar o container:
   ```sh
   docker compose exec app /bin/bash
   
4. Configurar .env:
   ```sh
   cp .env.example .env
   

5. Instale dependências PHP:
    ```sh
    composer install

6. Instale dependências JS:
   ```sh
    npm install

7. Build assets:  
   ```sh
    npm run dev || npm run watch

8.Acessar dashboard:
   http://localhost:8000/dashboard
