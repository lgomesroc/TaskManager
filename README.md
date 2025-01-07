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
   ```

    Configure o ambiente usando Docker:

    Execute o comando abaixo para subir os containers:
```
docker-compose up -d
```

Instale as dependências do backend (Laravel):
```
cd backend
composer install
```

Configure o banco de dados no arquivo .env do Laravel com as seguintes credenciais:
``` mysql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=lgomesroc
DB_PASSWORD=12345
```

Execute as migrations para criar as tabelas no banco de dados:
``` bash
php artisan migrate
```

Para acessar o container e rodar o comando php artisan serve:
``` bash
docker-compose exec app bash
```

Dentro do container, execute:
``` bash
php artisan serve --host=0.0.0.0 --port=8080
```

Instale as dependências do frontend (Angular):
``` bash
cd ../frontend
npm install
```

Inicie o servidor de desenvolvimento do frontend:
``` bash
ng serve
```

Acesse o sistema no navegador:

Frontend http://localhost:4200  
Backend http://localhost:8080

### Testes de Criação de Usuário
Criação de Usuário via Banco de Dados

A criação de usuários foi testada diretamente no banco de dados utilizando a funcionalidade de migrations do Laravel. A tabela users foi criada corretamente, e usuários foram inseridos via seeder ou diretamente pelo código, garantindo que os dados sejam salvos com sucesso no banco de dados.

Passos para Testar:

   Execute a migration com o comando:
``` bash
    php artisan migrate
```
   Verifique se a tabela users foi criada no banco de dados.

Insira um novo usuário utilizando o seeder ou diretamente na aplicação.

Criação de Usuário via Navegador (Interface Web)

A criação de usuários também foi testada através da interface web, onde um formulário de registro foi implementado. Os dados inseridos no formulário são validados e enviados para o banco de dados, com sucesso na criação do usuário.

Passos para Testar:

    Acesse a URL de registro de usuários na aplicação.
    Preencha o formulário de registro com os dados necessários.
    Envie o formulário e verifique se o usuário foi criado corretamente no banco de dados.
    Certifique-se de que a aplicação responde com uma mensagem de sucesso ou redirecionamento após a criação do usuário.

Criação de Usuário via API

Ainda estamos configurando a versão da API para a criação de usuários. Em breve, será possível realizar a criação de usuários também via requisições API utilizando os endpoints apropriados. Fique atento para atualizações nesta parte da aplicação.
Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para mais detalhes.