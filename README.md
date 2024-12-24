# TaskManager

**TaskManager** é um sistema de gerenciamento de tarefas, projetado para ajudar indivíduos ou equipes a organizar, priorizar e monitorar o progresso de suas tarefas. O sistema permite criar, editar, excluir e filtrar tarefas, além de fornecer notificações para prazos próximos.

## Funcionalidades

- Cadastro de usuários com diferentes níveis de acesso (admin e usuário).
- Criação, edição, exclusão e priorização de tarefas.
- Filtros por status das tarefas: pendente, em andamento e concluída.
- Notificações automáticas para prazos próximos.

## Tecnologias Utilizadas

- **Frontend**: Angular
- **Backend**: PHP com Laravel
- **Banco de Dados**: MySQL
- **Docker**: Para ambiente de desenvolvimento

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
Para configurar o ambiente, use o Docker:

docker-compose up -d

Instale as dependências do backend (Laravel):

cd backend
composer install

Crie o banco de dados:

php artisan migrate

Inicie o servidor de desenvolvimento:

php artisan serve

O frontend (Angular) pode ser iniciado com:

cd frontend
npm install
ng serve

Acesse o sistema no navegador: http://localhost:4200 para o frontend e http://localhost:8000 para o backend.