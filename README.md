# Projeto Ticketeiro

<p>
    <img src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" />
    <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" />
    <img src="https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white" />
</p>

## Web App para criar e gerenciar tickets de suporte desenvolvido no framework Laravel

O ticketeiro é um webapp com funcionalidades de autenticação e com separação de acesso por niveis de privilégio (roles) para facilitar a criação e solução de tickets de suporte.

<p  align="center">
<a>
    <img align="center" src="/public/images/p1.png" width="400" />
</a>
<a>
    <img align="center" src="/public/images/p2.png" width="400" />
</a>
</p>
<p  align="center">
<a>
    <img align="center" src="/public/images/p3.png" width="400" />
</a>
<a>
    <img align="center" src="/public/images/p4.png" width="400" />
</a>
</p>

Com relação ao banco de dados, como cada ticket tem um usuário que o criou e outro que irá trabalhar nele (um agente), foi criada essa relação <b>dois para muitos</b> entre as tabelas. Para facilitar a criação e visualização do banco de dados foi modelado este diagrama no [Draw.io](https://app.diagrams.net/)
<img align="center" src=https://github.com/Riko07br/ticketeiro/assets/65051970/aff2c0fb-571e-4a37-86a9-0df04f381722/ width="500">

O projeto foi realizado para aprender mais sobre o framework laravel bem como testar meus conhecimentos e adicionar algo interessante para meu portfolio. A ideia de criar um app de tickets de suporte veio deste [site](https://laraveldaily.com/post/demo-project-laravel-support-ticket-system).

## Funcionalidades

O ticket é criado com um título, descrição, etiquetas e categorias.
O administrador pode atribuir um agente para trabalhar no problema, bem como a prioridade e o status.

<img align="center" src="/public/images/p6.png" width="400" />

### Tem-se três tipos de usuário

Usuário (padrão):

-   Criação de novos tickets;
-   Visualização dos tickets submetidos;

Agente:

-   Visualização e edição de tickets designados para si pelo adm;

Administrador:

-   CRUD para tickets, etiquetas, categorias;
-   Pode modificar o acesso dos usuários (pode tornar usuários em agentes e vice-versa);
-   Define a prioridade e o status do ticket (criado, aberto, resolvido, etc.);
-   Define o agente para o ticket;

## License

The Ticketeiro app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
