 <div align="center">
    <img src="public/assets/docs/logo.png" width="200" />
    
    
</div>

## Sobre o projeto

O Librarian é um sistema de gerenciamento de biblioteca onde usuários podem visualizar, cadastrar e editar livros, autores, editoras e categorias. Além de poder gerenciar os estudantes cadastrados na plataforma.

Este projeto foi desenvolvido para a matéria de Desenvolvimento Web do curso de Análise e Desenvolvimento de Sistemas.

![librarian_dashboard](public/assets/docs/dashboard.png)

## Pré-requisitos

-   NodeJs
-   PHP
-   Composer

## :wrench: Instalação

1. Crie um arquivo **database.sqlite** na pasta **database**.
2. Rode o comando:

```sh
    npm install
```

3. Rode o comando:

```sh
    npm run setup
```

Depois de seguir esses passos o projeto está configurado. Para executar o projeto rode o comando:

```sh
    npm run start
```

O projeto estará rodando em **localhost:8000**.

O aplicativo já vem com alguns dados inseridos na base de dados através do seeder. O seeder também cria um usuário padrão que pode ser usado para fazer o primeiro login no app:
<br/>
**email**: admin@email.com
<br/>
**senha**: password
<br/>
Não se preocupe, a senha pode ser alterada logo no primeiro acesso na aba **conta** do menu de navegação do dashboard.

## :hammer_and_wrench: Construído com

-   [![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
-   [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
-   [![Vite](https://img.shields.io/badge/Vite-B73BFE?style=for-the-badge&logo=vite&logoColor=FFD62E)](https://vitejs.dev/)
-   [![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org/index.html)
-   [![ChartJs](https://img.shields.io/badge/Chart%20js-FF6384?style=for-the-badge&logo=chartdotjs&logoColor=white)](https://www.chartjs.org/)
