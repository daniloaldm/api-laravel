

# Laravel Api
## Descrição

Construir uma API e banco de dados para a aplicação CMS (Content Management System). A aplicação é um simples repositório para gerenciar ferramentas com seus respectivos nomes, links, descrições e tags. Foram realizados:

● **Conteinerização da aplicação (Docker)**

● **Deploy no Heroku**

Dentre outros detalhes que se pode perceber analisando o código

## Tecnologias utilizadas

Para o desenvolvimento do projeto foi utilizada as seguintes tecnologias:

- :elephant: **PHP 7.4** 
- :small_red_triangle_down:  **Laravel** — Um framework é um facilitador no desenvolvimento de diversas aplicações e, sem dúvida, sua utilização poupa tempo e custos para quem o utiliza, pois de forma mais básica, é um conjunto de bibliotecas utilizadas para criar uma base onde as aplicações são construídas, um otimizador de recursos.
- :whale2: **Docker** — É um software que garante maior facilidade na criação e administração de ambientes isolados, garantindo a rápida disponibilização de programas para o usuário final.

## Instalação

Para o desenvolvimento do projeto utilizei um docker:
https://github.com/daniloaldm/dockerFileLaravel

1. Clone o docker:
> git clone https://github.com/daniloaldm/dockerFileLaravel.git dockerFileLaravel

2. Após clonar a pasta do docker execute:

> service docker restart sudo chown $USER /var/run/docker.sock

3. Acesse:
> cd dockerFileLaravel

4. e execute:
> sudo cp .env.example .env

Obs: Lembre-se de configurar o arquivo .env de acordo com suas configurações.

para subir os serviços:
> ./start

para derrubar: 
> ./stop

para acessar o container do laravel: 
> ./shell

5. Depois para utilizar o Docker do Laravel com um repositório específico, acesse o diretório onde fica seus projetos, no meu caso:

> cd html/

6. Clone o repositório que contém o projeto
> git clone  https://github.com/daniloaldm/api-laravel.git api-laravel

7. Entre no repositório clonado: 

> cd html/api-laravel

8. Execute: 

> sudo cp .env.example .env

9. Configure o .env do projeto de acordo com o que foi configurado no docker.

10. Vá para a raiz do sistema (digitando só "cd" no terminal) ou para onde fica o repositório com seus projetos no meu caso executei dessa forma:
> sudo chown -R $USER: $USER /html

11. Dentro do repositório **dockerFileLaravel/** execute:
> docker-compose exec app composer install

> docker-compose exec app php artisan key:generate

> docker-compose exec app php artisan migrate

OBS: Se for de sua preferência você pode também acessar o serviço do laravel (explicado no ponto 4) e executar:
> app composer install

> php artisan key:generate

> php artisan migrate

Prontinho :heart:

### Para testar a API com o Insomnia:
<br>
<a href="https://insomnia.rest/run/?label=API%20CMS%20Laravel&uri=https%3A%2F%2Fgithub.com%2Fdaniloaldm%2Fapi-laravel%2Fblob%2Fmaster%2Fapi_laravel_cms.json" target="_blank"><img src="https://insomnia.rest/images/run.svg" alt="Run in Insomnia"></a>

### Executando testes

Acesse o diretório do Docker e execute:

> docker-compose exec app php artisan test

Ou acesse o container executando:

> docker exec -i -t php_service_laravel /bin/bash

e execute:

> php artisan test


## Api no Heroku

[http://limitless-shelf-80029.herokuapp.com](http://limitless-shelf-80029.herokuapp.com/)

## Documentação da Api

[http://limitless-shelf-80029.herokuapp.com/api/documentation](http://limitless-shelf-80029.herokuapp.com/api/documentation)

## :man_technologist: Autor

- **Danilo Alexandrino** - [GitHub](https://github.com/daniloaldm) - Email: [danilo.alexandrinodm@gmail.com](mailto:danilo.alexandrinodm@gmail.com)
