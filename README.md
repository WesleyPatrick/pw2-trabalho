# 🛍️ Sistema de Gerenciamento de Produtos e Categorias

## 📋 Descrição

Sistema web desenvolvido em Laravel para gerenciamento de produtos e categorias, com funcionalidades completas de CRUD, autenticação de usuários, busca e filtros avançados. Desenvolvido como trabalho escolar individual para a disciplina de Programação Web 2.

## ✨ Funcionalidades

### 🔐 Autenticação e Usuários

- ✅ Sistema de registro e login de usuários
- ✅ Autenticação protegida por middleware
- ✅ Gerenciamento de perfil do usuário
- ✅ Logout seguro

### 📦 Gerenciamento de Produtos

- ✅ **CRUD Completo**: Criar, Listar, Editar, Excluir produtos
- ✅ **Busca Avançada**: Busca por nome do produto
- ✅ **Filtros**: Por categoria e faixa de preço
- ✅ **Relacionamentos**: Produtos vinculados a categorias
- ✅ **Validação**: Campos obrigatórios e validações de dados
- ✅ **Paginação**: Listagem paginada dos resultados

### 🏷️ Gerenciamento de Categorias

- ✅ **CRUD Completo**: Criar, Listar, Editar, Excluir categorias
- ✅ **Contagem de Produtos**: Mostra quantos produtos cada categoria possui
- ✅ **Proteção**: Não permite excluir categorias que possuem produtos
- ✅ **Validação**: Nome único para cada categoria

### 🎨 Interface e Design

- ✅ **Design Moderno**: Interface responsiva com Tailwind CSS
- ✅ **Cores Personalizadas**: Tema em azul e verde água
- ✅ **Layout Reutilizável**: Template base consistente
- ✅ **Menu de Navegação**: Menu superior com todas as funcionalidades
- ✅ **Mensagens**: Feedback visual para ações do usuário

## 🚀 Tecnologias Utilizadas

- **Backend**: Laravel 11.x (PHP 8.2+)
- **Frontend**: Blade Templates + Tailwind CSS
- **Banco de Dados**: SQLite
- **Autenticação**: Laravel Breeze
- **Validação**: Laravel Validation
- **Paginação**: Laravel Pagination

## 📦 Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e NPM (para compilação de assets)

## 🛠️ Instalação

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd pw2-trabalho
```

### 2. Instale as dependências do PHP

```bash
cd laravel-app
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure o banco de dados

O projeto está configurado para usar SQLite por padrão. O arquivo `database/database.sqlite` será criado automaticamente.

### 5. Execute as migrações

```bash
php artisan migrate
```

### 6. Popule o banco com dados de exemplo

```bash
php artisan db:seed
```

### 7. Instale e compile os assets (opcional)

```bash
npm install
npm run build
```

### 8. Inicie o servidor

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

## 👤 Usuário Padrão

Após executar os seeders, você pode fazer login com as seguintes credenciais:

- **Email**: `test@example.com`
- **Senha**: `password`

## 🌐 Rotas da Aplicação

### Rotas Públicas

- `GET /` - Página inicial
- `GET /login` - Página de login
- `POST /login` - Processar login
- `GET /register` - Página de registro
- `POST /register` - Processar registro

### Rotas Protegidas (requer autenticação)

#### Dashboard

- `GET /dashboard` - Dashboard principal

#### Perfil do Usuário

- `GET /profile` - Editar perfil
- `PATCH /profile` - Atualizar perfil
- `DELETE /profile` - Excluir conta

#### Categorias

- `GET /categorias` - Listar categorias
- `GET /categorias/create` - Formulário de criação
- `POST /categorias` - Criar categoria
- `GET /categorias/{id}` - Ver categoria
- `GET /categorias/{id}/edit` - Formulário de edição
- `PUT /categorias/{id}` - Atualizar categoria
- `DELETE /categorias/{id}` - Excluir categoria

#### Produtos

- `GET /produtos` - Listar produtos (com filtros)
- `GET /produtos/create` - Formulário de criação
- `POST /produtos` - Criar produto
- `GET /produtos/{id}` - Ver produto
- `GET /produtos/{id}/edit` - Formulário de edição
- `PUT /produtos/{id}` - Atualizar produto
- `DELETE /produtos/{id}` - Excluir produto

## 📊 Estrutura do Banco de Dados

### Tabela: `users`

- `id` - Chave primária
- `name` - Nome do usuário
- `email` - Email único
- `email_verified_at` - Data de verificação do email
- `password` - Senha criptografada
- `remember_token` - Token de "lembrar-me"
- `created_at` - Data de criação
- `updated_at` - Data de atualização

### Tabela: `categorias`

- `id` - Chave primária
- `nome` - Nome da categoria (único)
- `created_at` - Data de criação
- `updated_at` - Data de atualização

### Tabela: `produtos`

- `id` - Chave primária
- `nome` - Nome do produto
- `preco` - Preço do produto
- `descricao` - Descrição do produto (opcional)
- `categoria_id` - Chave estrangeira para categorias
- `created_at` - Data de criação
- `updated_at` - Data de atualização

## 🔧 Funcionalidades Detalhadas

### Sistema de Busca e Filtros (Produtos)

- **Busca por nome**: Pesquisa produtos que contenham o termo no nome
- **Filtro por categoria**: Mostra apenas produtos de uma categoria específica
- **Filtro por preço**: Define faixa de preço mínimo e máximo
- **Combinação de filtros**: Todos os filtros podem ser usados simultaneamente
- **Limpeza de filtros**: Botão para remover todos os filtros aplicados

### Validações Implementadas

- **Produtos**: Nome obrigatório, preço numérico positivo, categoria existente
- **Categorias**: Nome obrigatório e único
- **Usuários**: Email único, senha confirmada, nome obrigatório

### Relacionamentos

- **Categoria → Produtos**: Uma categoria pode ter muitos produtos (1:N)
- **Produto → Categoria**: Um produto pertence a uma categoria (N:1)

## 🎨 Personalização de Cores

O sistema utiliza um tema personalizado com as seguintes cores:

```css
/* Cores principais */
--blue: #3b82f6;
--blue-dark: #1d4ed8;
--blue-light: #dbeafe;

--teal: #14b8a6;
--teal-dark: #0f766e;
--teal-light: #ccfbf1;

--aqua: #06b6d4;
--aqua-light: #cffafe;
```

## 📁 Estrutura de Arquivos

```
laravel-app/
├── app/
│   ├── Http/Controllers/
│   │   ├── CategoriaController.php
│   │   ├── ProdutoController.php
│   │   └── ProfileController.php
│   ├── Models/
│   │   ├── Categoria.php
│   │   ├── Produto.php
│   │   └── User.php
│   └── Requests/
│       └── ProfileUpdateRequest.php
├── database/
│   ├── migrations/
│   │   ├── create_categorias_table.php
│   │   └── create_produtos_table.php
│   └── seeders/
│       ├── CategoriaSeeder.php
│       ├── ProdutoSeeder.php
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── categorias/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── produtos/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       └── layouts/
│           └── app.blade.php
└── routes/
    └── web.php
```

## 🚀 Como Usar

### 1. Acesse a aplicação

Abra o navegador e vá para `http://localhost:8000`

### 2. Faça login

Use as credenciais padrão ou registre uma nova conta

### 3. Navegue pelo sistema

- **Dashboard**: Visão geral do sistema
- **Categorias**: Gerencie as categorias de produtos
- **Produtos**: Gerencie os produtos com busca e filtros

### 4. Funcionalidades principais

- **Criar**: Adicione novas categorias e produtos
- **Listar**: Veja todos os itens com paginação
- **Editar**: Modifique informações existentes
- **Excluir**: Remova itens (com validações)
- **Buscar**: Encontre produtos rapidamente
- **Filtrar**: Refine os resultados por critérios

## 🐛 Solução de Problemas

### Erro "Could not open input file: artisan"

- Certifique-se de estar no diretório `laravel-app`
- Execute: `cd laravel-app && php artisan serve`

### Erro de permissão no banco SQLite

- Verifique se o arquivo `database/database.sqlite` existe
- Execute: `touch database/database.sqlite`

### Assets não carregando

- Execute: `npm install && npm run build`

### Erro de chave da aplicação

- Execute: `php artisan key:generate`

## 📝 Notas de Desenvolvimento

- **Framework**: Laravel 11.x
- **Padrão**: MVC (Model-View-Controller)
- **Autenticação**: Laravel Breeze
- **Frontend**: Blade + Tailwind CSS
- **Banco**: SQLite (configurável para MySQL/PostgreSQL)
- **Validação**: Laravel Validation
- **Paginação**: Laravel Pagination

## 🎯 Requisitos Atendidos

✅ **CRUD para duas tabelas**: Categorias e Produtos  
✅ **Relacionamento entre tabelas**: Categoria → Produtos  
✅ **Busca e filtro**: Sistema completo de busca e filtros  
✅ **Menu de navegação**: Menu superior responsivo  
✅ **Layout atraente**: Design moderno com Tailwind CSS  
✅ **Template reutilizável**: Layout base consistente  
✅ **Autenticação de usuário**: Sistema completo de login/registro  
✅ **Validações**: Validação de dados em formulários  
✅ **Mensagens de feedback**: Sucesso e erro para ações  
✅ **Paginação**: Listagem paginada dos resultados

