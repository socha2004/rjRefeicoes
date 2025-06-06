# RJ Refeições

Software desenvolvido para um restaurante da região de Manaus com a finalidade de auxiliar no controle e administração de pedidos, cardápio e relatórios. O sistema também permite a criação de pedidos por parte dos clientes desse restaurante, onde eles podem consultar o andamento de seu pedido atual.

## Módulos do Sistema:

<h3>Área do cardápio</h3>
Este módulo é de uso específico para os clientes que desejam realizar um pedido, nele consta uma página que irá informar os pratos do dia separados em cards contendo o nome do prato e sua descrição. 
<h4>Fluxo de Pedido</h4>
<ol>
  <li>Visualizar produto</li>
  <li>Adicionar ao carrinho</li>
  <li>Confirmar itens do carrinho</li>
  <li>Redirecionamento para tela de confirmação onde será preenchido um formulário com informações do cliente</li>
  <li>Após confirmar o pedido é criado um registro no sistema onde o cliente pode consultar o andamento informando seu CPF</li>
</ol>

<h3>Painel Administrativo</h3>
<p>Nesta área o uso se restringe exclusivamente ao proprietário do restaurante onde o acesso é liberado por meio de autenticação com usuário e senha. No módulo em questão o proprietário tem o acesso às seguintes funcionalidades:</p>

<ul>
  <li>Cadastrar/atualizar/excluir os pratos do dia</li>
  <li>Gerenciar a fila de pedidos</li>
  <li>Cadastrar usuários que terão acesso ao painel administrativo</li>
  <li>Visualizar relatórios e dashboards</li>
</ul>

<h3>Tecnologias utilizadas</h3>
<div style="display:inline-block;">
  <img src="https://raw.githubusercontent.com/tandpfun/skill-icons/65dea6c4eaca7da319e552c09f4cf5a9a8dab2c8/icons/Bootstrap.svg" width="40px">
  <img src="https://raw.githubusercontent.com/tandpfun/skill-icons/65dea6c4eaca7da319e552c09f4cf5a9a8dab2c8/icons/PHP-Dark.svg" width="40px">
  <img src="https://raw.githubusercontent.com/tandpfun/skill-icons/65dea6c4eaca7da319e552c09f4cf5a9a8dab2c8/icons/JavaScript.svg" width="40px">
  <img src="https://raw.githubusercontent.com/tandpfun/skill-icons/65dea6c4eaca7da319e552c09f4cf5a9a8dab2c8/icons/MySQL-Dark.svg" width="40px">
</div>

## Planos Futuros
Nós da equipe de desenvolvimento do software possuímos planos futuro para o software como melhorias, correções e novas implementações. Abaixo está listado algumas delas.
<ul>
  <li>Re-design do layout para tornar mais intuitivo e dinâmico para o usuário</li>
  <li>Refatoração da lógica do backend para facilitar a manutenção e desempenho da aplicação</li>
  <li>Migrar a stack para React.js e Laravel, por se tratarem de ferramentas que irão contribuir na organização dos componentes e aproveitar a code-base do projeto.</li>
  <li>Tornar a rastreabilidade dos pedidos mais explícita para assim o usuário acompanhar com clareza</li>
</ul>
