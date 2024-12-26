# TaskManager

**TaskManager** é um sistema de gerenciamento de tarefas, projetado para ajudar indivíduos ou equipes a organizar, priorizar e monitorar o progresso de suas tarefas. O sistema permite criar, editar, excluir e filtrar tarefas, além de fornecer notificações para prazos próximos.

## Funcionalidades

- Cadastro de usuários com diferentes níveis de acesso (admin e usuário).
- Criação, edição, exclusão e priorização de tarefas.
- Filtros por status das tarefas: pendente, em andamento e concluída.
- Notificações automáticas para prazos próximos.
- Gerenciamento de anexos relacionados às tarefas.
- Gerenciamento de permissões (roles) para controle de acesso.

## Tecnologias Utilizadas

- **Frontend**: Angular
- **Backend**: PHP com Laravel
- **Banco de Dados**: MySQL
- **Docker**: Para ambiente de desenvolvimento

## Estrutura do Projeto

- **Backend**: Laravel com suporte para API e rotas web.
   - Rotas configuradas em `web.php` e `api.php`.
   - Controllers separados para Web e API.
   - Migrations criadas para todas as tabelas do banco de dados.
   - Models configuradas para representar cada tabela.
- **Frontend**: Angular, com suporte para consumo de APIs.

## Como Rodar o Projeto

### Requisitos

- [Docker](https://www.docker.com/)
- [Node.js](https://nodejs.org/)
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)

### Configuração do Ambiente

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/TaskManager.git
   cd TaskManager

    Configure o ambiente usando Docker:

docker-compose up -d

Instale as dependências do backend (Laravel):

cd backend
composer install

Configure o banco de dados no arquivo .env do Laravel com as seguintes credenciais:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=lgomesroc
DB_PASSWORD=12345

Execute as migrations para criar as tabelas no banco de dados:

php artisan migrate

Inicie o servidor de desenvolvimento do backend:

php artisan serve

Instale as dependências do frontend (Angular):

cd ../frontend
npm install

Inicie o servidor de desenvolvimento do frontend:

ng serve

Acesse o sistema no navegador:

    Frontend: http://localhost:4200
    Backend: http://localhost:8000