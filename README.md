# 🧭 Atlas ServiceDesk

### Sistema de gerenciamento de chamados de suporte técnico

O **Atlas ServiceDesk** é um sistema web de gerenciamento de chamados desenvolvido com PHP e MySQL, com o objetivo de organizar solicitações de suporte técnico, controlar atendimentos e facilitar o acompanhamento das atividades entre solicitantes e responsáveis.

O projeto está sendo desenvolvido com foco em aprendizado prático, aplicação de conceitos de desenvolvimento web e construção de uma solução funcional, escalável e organizada.

**Status:** MVP em desenvolvimento contínuo.

---

## 📌 Sobre o projeto

O Atlas ServiceDesk surgiu com a proposta de desenvolver uma solução para centralizar o gerenciamento de chamados de suporte técnico.

A aplicação permite trabalhar com abertura, consulta, atribuição e acompanhamento de chamados, além de oferecer funcionalidades administrativas para gerenciamento dos usuários e cadastros auxiliares.

O desenvolvimento busca aplicar conceitos importantes da área de desenvolvimento de software, como:

- Operações CRUD (Create, Read, Update e Delete).
- Integração entre PHP e MySQL.
- Consultas SQL e relacionamentos entre tabelas.
- Autenticação e gerenciamento de sessões.
- Controle de acesso baseado em perfis.
- Validação de dados.
- Organização e manutenção de código.

## 🎯 Objetivos

- Desenvolver uma aplicação web funcional para gerenciamento de chamados.
- Aplicar conhecimentos de PHP, SQL e desenvolvimento web.
- Implementar autenticação e controle de permissões.
- Organizar informações por categorias, prioridades e status.
- Desenvolver uma estrutura que permita futuras melhorias e expansão do sistema.

## ⚙️ Funcionalidades

### Chamados
- Abertura de chamados.
- Consulta dos chamados atribuídos ao usuário.
- Visualização dos detalhes de um chamado.
- Edição de informações do chamado.
- Atribuição e alteração de responsável.
- Acompanhamento e atualização de status.

### Usuários
- Autenticação por e-mail e senha.
- Controle de sessão.
- Consulta de usuários.
- Restrição do gerenciamento de usuários ao perfil administrador.
- Estrutura para cadastro e gerenciamento de usuários.

### Categorias e prioridades
- Cadastro e organização de categorias.
- Cadastro e organização de prioridades.
- Controle de disponibilidade dos registros.

### Dashboard
- Página inicial do sistema.
- Navegação entre os módulos.
- Acesso às funcionalidades conforme as permissões do usuário.

> Observação: as funcionalidades estão sendo implementadas e aprimoradas gradualmente. Algumas regras de negócio e melhorias de segurança ainda fazem parte da evolução do MVP.

## 🔐 Perfis e permissões

O sistema trabalha com dois perfis principais:

| Funcionalidade | Usuário | Administrador |
|---|---|---|
| Abrir chamados | ✅ | ✅ |
| Visualizar chamados próprios | ✅ | ✅ |
| Visualizar chamados atribuídos | ✅ | ✅ |
| Visualizar qualquer chamado | ❌ | ✅ |
| Atualizar status de chamados atribuídos | ✅ | ✅ |
| Gerenciar categorias | ✅ | ✅ |
| Gerenciar prioridades | ✅ | ✅ |
| Gerenciar usuários | ❌ | ✅ |

**Regras de negócio:** o responsável por um chamado pode atualizar seu status, mas não alterar os demais dados do atendimento. O solicitante e o administrador possuem permissões de edição conforme as regras definidas pelo sistema.

## 🛠️ Tecnologias utilizadas

| Tecnologia | Aplicação |
|---|---|
| PHP | Lógica de negócio e processamento no servidor |
| MySQL | Banco de dados relacional |
| SQL | Consultas e manipulação de dados |
| HTML5 | Estrutura das páginas |
| CSS3 | Estilização da interface |
| JavaScript | Interatividade no frontend |
| XAMPP | Ambiente de desenvolvimento local |
| PDO | Conexão e consultas ao banco de dados |

## 🗄️ Modelagem do banco de dados

A estrutura principal do banco de dados contempla as seguintes entidades:

### `usuarios`
Armazena os dados dos usuários cadastrados no sistema.

Campos principais:
- `id`
- `nome`
- `email`
- `senha`
- `perfil`
- `status`

### `chamados`
Armazena as solicitações de suporte técnico.

Campos principais:
- `id`
- `titulo`
- `descricao`
- `categoria`
- `prioridade`
- `status`
- `solicitante`
- `responsavel`
- `data_abertura`

### `categorias`
Armazena as categorias utilizadas na classificação dos chamados.

### `prioridades`
Armazena os níveis de prioridade disponíveis para os atendimentos.

A modelagem está em evolução, com planejamento para aprimorar os relacionamentos entre as tabelas utilizando chaves primárias e estrangeiras.

## 🔄 Fluxo básico do sistema

1. O usuário acessa a aplicação.
2. Informa suas credenciais na tela de login.
3. O sistema valida os dados e inicia uma sessão.
4. O usuário é direcionado ao dashboard.
5. Pode abrir, consultar ou acompanhar chamados conforme suas permissões.
6. O responsável realiza o atendimento e atualiza o status.
7. O administrador possui acesso às funcionalidades administrativas.

## 💻 Como executar o projeto

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- PHP compatível com a versão utilizada pelo projeto.
- MySQL ou MariaDB.
- Navegador web.
- Git (opcional).

### 1. Clonar o repositório

```bash
git clone URL_DO_REPOSITORIO
```

### 2. Mover o projeto

Coloque a pasta do projeto dentro do diretório `htdocs` do XAMPP.

Exemplo:

```text
C:\xampp\htdocs\Atlas-ServiceDesk
```

### 3. Iniciar os serviços

Abra o painel do XAMPP e inicie:

- Apache
- MySQL

### 4. Configurar o banco de dados

Acesse o phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Crie o banco de dados utilizado pelo projeto e configure as credenciais de conexão no arquivo `conexao.php`.

> O script SQL de criação das tabelas e os dados iniciais deverão ser disponibilizados no repositório conforme a evolução do projeto.

### 5. Acessar a aplicação

No navegador, acesse:

```text
http://localhost/Atlas-ServiceDesk/
```

A página inicial deverá direcionar o usuário para o fluxo de autenticação, conforme a configuração atual da aplicação.

## 📁 Estrutura do projeto

Estrutura ilustrativa dos principais arquivos e módulos:

```text
Atlas-ServiceDesk/
│
├── conexao.php
├── login.php
├── logout.php
├── dashboard.php
│
├── novo_chamado.php
├── meus_chamados.php
├── detalhes_chamado.php
├── editar_chamado.php
│
├── usuarios.php
├── categorias.php
├── prioridades.php
│
└── README.md
```

A organização dos arquivos poderá evoluir conforme a implementação de novas funcionalidades e a separação das responsabilidades da aplicação.

## 🗺️ Próximas melhorias

- [ ] Finalizar a modelagem relacional do banco de dados.
- [ ] Padronizar o controle de permissões.
- [ ] Implementar armazenamento seguro de senhas com `password_hash()`.
- [ ] Implementar validação de senhas com `password_verify()`.
- [ ] Aprimorar validações de formulários.
- [ ] Implementar pesquisa e paginação de registros.
- [ ] Desenvolver indicadores e estatísticas no dashboard.
- [ ] Melhorar a interface com CSS e Bootstrap.
- [ ] Implementar histórico de alterações dos chamados.
- [ ] Aprimorar a organização da estrutura do projeto.
- [ ] Desenvolver testes para os principais fluxos.

## 📚 Aprendizados

O desenvolvimento do Atlas ServiceDesk proporciona experiência prática com:

- Desenvolvimento backend utilizando PHP.
- Modelagem e manipulação de bancos de dados relacionais.
- Construção de consultas SQL com JOIN, WHERE e operações CRUD.
- Utilização de PDO e consultas preparadas.
- Gerenciamento de sessões em PHP.
- Implementação de regras de negócio e permissões.
- Integração entre frontend, backend e banco de dados.

## 👨‍💻 Desenvolvimento

Projeto desenvolvido individualmente como iniciativa de aprendizado e evolução profissional na área de desenvolvimento de software.

O Atlas ServiceDesk continua em desenvolvimento, com melhorias planejadas para ampliar suas funcionalidades, segurança, organização e experiência de utilização.

---

**Atlas ServiceDesk** — Organização e controle para o gerenciamento de chamados de suporte técnico.