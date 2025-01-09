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

## Configuração do Ambiente

### Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/TaskManager.git
   cd TaskManager
   ```

Instale as dependências do backend (Laravel):
```bash
cd backend
composer install
```

Configure o banco de dados no arquivo .env do Laravel com as seguintes credenciais:
```mysql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=lgomesroc
DB_PASSWORD=12345
```

Execute as migrations para criar as tabelas no banco de dados:
```bash
php artisan migrate
```

### Comandos para Preparar o Ambiente

- **Parar o Apache (se estiver em execução):**
```bash
   sudo systemctl stop apache2
```

- **Desativar o Apache para não iniciar automaticamente no sistema.**
  Se preferir desativar para não ser inicializado com o sistema, use o seguinte comando:
```bash
sudo systemctl disable apache2
```

## Comandos Básicos para Containers

### Inicializar os Containers
```bash
docker-compose build --no-cache
docker-compose up -d
```
Inicializa os containers em segundo plano.

### Verificar os Containers Ativos
```bash
docker ps
```
Mostra todos os containers em execução, com os nomes e IDs.

### Entrar no Container do Laravel
```bash
docker-compose exec app bash
```

### Executar o php artisan serve

Após entrar no container, execute:
```bash
php artisan serve --host=0.0.0.0 --port=8080
```
- Inicia o servidor Laravel dentro do container.
    O parâmetro --host=0.0.0.0 garante que o servidor fique acessível de fora do container.

### Parar os Containers
```bash
docker-compose down
```
Para e remove todos os containers iniciados pelo docker-compose.

### Reiniciar os Containers
```bash
docker-compose restart
```
Reinicia os containers sem precisar recriá-los.

### Gerar uma Nova Chave de Aplicação

Siga o passo:

- Abra um terminal dentro do seu contêiner Docker onde a aplicação está rodando. Execute o comando:
```bash
php artisan key:generate
```
Isso gerará uma nova chave de aplicação e atualizará seu arquivo .env com essa chave.

## Instruções para Gerar Senha Criptografada com bcrypt no Laravel

Durante o desenvolvimento do projeto, você pode precisar gerar senhas criptografadas para inserir no banco de dados. Para isso, o Laravel utiliza o `bcrypt` para criptografar as senhas de maneira segura.

### Passo a Passo

### 1. Abra o terminal no diretório do seu projeto Laravel

Certifique-se de que você está no diretório backend do seu projeto Laravel.

### 2. Execute o comando `php artisan tinker`

O comando `php artisan tinker` abre um ambiente interativo onde você pode executar código PHP dentro do contexto do Laravel. No terminal, execute:

```bash
php artisan tinker
```
### 3. Gere a senha criptografada com o bcrypt

Dentro do ambiente interativo do tinker, execute o seguinte comando para gerar uma senha criptografada:
```
bcrypt('password123');
```
Isso retornará uma string como:

**$2y$10$B1.k/IE2HZmjFg7gnnxHRf8MyDJcn5UbyON6eA2sdoHEdf6I7uX9i**

Essa string é a versão criptografada da senha 'password123'.
### 4. Use a senha criptografada no banco de dados

Agora que você tem a senha criptografada, pode utilizá-la ao inserir dados na tabela users. Exemplo de como inserir um usuário com a senha criptografada:
```
INSERT INTO users (name, email, password, password_confirmation, role)
VALUES ('John Doe', 'john.doe@example.com', 
'$2y$10$B1.k/IE2HZmjFg7gnnxHRf8MyDJcn5UbyON6eA2sdoHEdf6I7uX9i', 
'$2y$10$B1.k/IE2HZmjFg7gnnxHRf8MyDJcn5UbyON6eA2sdoHEdf6I7uX9i', 'usuario');
```
### 5. Saia do tinker

Após gerar a senha, você pode sair do ambiente interativo com o comando:
```bash
exit
```

### Comando para entrar no conteiner do banco de dados e popular pelo terminal
- para acessar:
- ```bash
  docker exec -it mysql_db mysql -u lgomesroc -p
  ```
- para popular, mas antes tem que escolher o banco de dados
```mysql
- USE taskmanager;
  INSERT INTO users (name, email, password, password_confirmation, role)
  VALUES ('John Doe', 'john.doe@example.com',
  '$2y$10$B1.k/IE2HZmjFg7gnnxHRf8MyDJcn5UbyON6eA2sdoHEdf6I7uX9i',
  '$2y$10$B1.k/IE2HZmjFg7gnnxHRf8MyDJcn5UbyON6eA2sdoHEdf6I7uX9i', 'usuario');
 ```
- Para sair do conteiner do banco de dados 
```bash 
exit;
```

### Instale as dependências do frontend (Angular):
```bash
cd ../frontend
npm install
```

### Inicie o servidor de desenvolvimento do frontend:
```bash
ng serve
```

### Acesse o sistema no navegador:

- **Frontend http://localhost:4200**  
- **Backend http://localhost:8080**

### Testes de Criação de Usuário
**Criação de Usuário via Banco de Dados**

A criação de usuários foi testada diretamente no banco de dados utilizando a funcionalidade de migrations do Laravel. A tabela users foi criada corretamente, e usuários foram inseridos via seeder ou diretamente pelo código, garantindo que os dados sejam salvos com sucesso no banco de dados.

**Passos para Testar:**

- Execute a migration com o comando:
```bash
    php artisan migrate
```
- Verifique se a tabela users foi criada no banco de dados.

- Insira um novo usuário utilizando o seeder ou diretamente na aplicação.

### Criação de Usuário via Navegador (Interface Web)

A criação de usuários também foi testada através da interface web, onde um formulário de registro foi implementado. Os dados inseridos no formulário são validados e enviados para o banco de dados, com sucesso na criação do usuário.

**Passos para Testar:**

- Acesse a URL de registro de usuários na aplicação. **
- Preencha o formulário de registro com os dados necessários.
- Envie o formulário e verifique se o usuário foi criado corretamente no banco de dados.
- Certifique-se de que a aplicação responde com uma mensagem de sucesso ou redirecionamento após a criação do usuário.

### Criação de usuário via API

Ainda estamos configurando a versão da API para a criação de usuários. Em breve, será possível realizar a criação de usuários também via requisições API utilizando os endpoints apropriados. Fique atento para atualizações nesta parte da aplicação.

## Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para mais detalhes.