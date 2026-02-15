# Sistema de Gerenciamento

Sistema web desenvolvido em PHP (sem framework) para gerenciamento de Produtos e Fornecedores com vínculo N:N.

## Tecnologias

- PHP 7.4+
- MySQL
- jQuery
- HTML + CSS

## Funcionalidades

- CRUD de Fornecedores
- CRUD de Produtos
- Vínculo N:N entre produtos e fornecedores
- Regra: impedir vínculo com fornecedor inativo
- Remoção individual e em massa
- Busca com filtro
- Comunicação AJAX
- Dark Mode
- Interface moderna e responsiva

## Como rodar o projeto

1. Clone o repositório
2. Crie o banco de dados executando `database.sql`
3. Configure a conexão em `config/database.php`
4. Coloque o projeto dentro do diretório do XAMPP (htdocs)
5. Acesse via:

http://localhost/sistema-gerenciamento/public

## Observações

Arquivo `DECISOES.md` contém as decisões técnicas adotadas.
