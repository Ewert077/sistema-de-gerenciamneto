DECISÕES DO PROJETO
Sobre a modelagem do banco

Eu criei três tabelas:

fornecedores

produtos

produto_fornecedor

A tabela produto_fornecedor existe porque a relação entre produto e fornecedor é muitos-para-muitos. Um produto pode ter vários fornecedores, e um fornecedor pode fornecer vários produtos.

Em vez de colocar vários IDs em uma coluna ou duplicar dados, preferi fazer do jeito certo, usando uma tabela intermediária. Isso deixa o banco mais organizado, evita bagunça futura e facilita manutenção.

Também usei chaves estrangeiras para manter a integridade dos dados.

Por que usar tabela intermediária

Principalmente por organização e escalabilidade.

Se amanhã eu quiser colocar mais informações nesse vínculo (ex: preço negociado, prazo de entrega, fornecedor principal), já tenho onde colocar. A estrutura já nasce preparada para crescer.

Por que as regras ficaram no Model

Eu coloquei regras como “não permitir vincular fornecedor inativo” dentro do Model porque é ali que a entidade vive.

O Controller só orquestra a requisição.
Quem realmente entende as regras do fornecedor ou do produto é o Model.

Isso evita que no futuro alguém crie outro controller e fure a regra sem perceber.

Por que usei JOIN

Quando comecei a listar produtos com fornecedores, percebi que estava caindo no problema clássico de várias consultas dentro de um loop.

Isso não escala bem.

Então usei JOIN para resolver tudo em uma única query.
Fica mais performático e mais profissional.

Por que LEFT JOIN

Usei LEFT JOIN porque eu queria listar todos os produtos, mesmo os que ainda não têm fornecedor vinculado.

Se eu usasse INNER JOIN, os produtos sem vínculo simplesmente não apareceriam.

Por que Prepared Statements

Usei PDO com prepared statements para evitar SQL Injection.

Mesmo sendo um projeto simples, acho importante já aplicar prática segura desde o início. Segurança não deveria ser opcional.

Organização do projeto

Segui uma estrutura MVC simples, sem framework, como pedido no teste.

Separei:

Controller → controla fluxo

Model → conversa com banco e contém regras

View → só exibe

Tentei manter cada parte com responsabilidade clara para não virar um código misturado.

Uso de AJAX

Implementei AJAX no vínculo de fornecedores para evitar reload da página.

Não era obrigatório, mas achei que agregaria mais valor técnico ao projeto e melhoraria a experiência de uso.

Melhorias que eu faria com mais tempo

Se eu evoluísse esse projeto, faria:

Paginação nas listagens

Validação mais robusta de CNPJ e email

Sistema de autenticação

Separar melhor os scripts JS

Padronizar respostas JSON

Criar uma camada de service entre Controller e Model

Testes automatizados

Sobre o uso de IA

Durante o desenvolvimento eu utilizei IA como ferramenta de apoio.

Usei principalmente para:

Revisar decisões

Pensar em melhorias

Ajustar consultas

Confirmar boas práticas

Mas todas as implementações foram feitas entendendo o que estava sendo aplicado.
A IA foi suporte, não substituição de raciocínio.

Eu quis mostrar organização, clareza e boas práticas mesmo sendo um sistema pequeno.
Preferi fazer algo simples, mas bem estruturado.