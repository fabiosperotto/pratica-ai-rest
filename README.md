# Game-API Pack - Lumen

Pacote de programação para disciplinas de desenvolvimento web back-end, utilizando PHP + microframework [Lumen](https://lumen.laravel.com/). O Objetivo é servir de exemplo para a elaboração de um webservice para comunicar dados em JSON a respeito de uma modelagem. É uma API RESTful e utiliza autenticação simples por cabeçalho HTTP via Authorization.

Este projeto faz parte de uma série de aprendizado em APIs. Nesta mesma série, você pode acessar o mesmo projeto implementado com [Nodejs e Express](https://github.com/fabiosperotto/api-players-express).


## Compatibilidade

- PHP 7.3 a 8.0;
- Lumen 8.0 e 10.0;
- MySQL 8.0;


### Docência
Se você é docente da área, pode entrar em contato para obter slides e dicas sobre o desenvolvimento de aulas com este projeto.


## Modelagem de Referência 

Este projeto faz referência a uma modelagem hipotética de um game, da relação entre um jogador e seus equipamentos.

![Imagem da Modelagem inicial do sistema](/docs/modelagem-inicial.png)

## Pré-requisitos:

1. Ambiente local de desenvolvimento com PHP + Servidor Apache (opcional) + Servidor MySQL:
- Se Windows: usar [Xampp](https://www.apachefriends.org) ou [Laragon](https://laragon.org/);
- Se Linux: [Pilha LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-pt).
2. Para acessar o banco de dados, caso não queira manipular o BD via linha de comando, pode utilizar um ou mais softwares clientes, como [MySQL Workbench](https://www.mysql.com/products/workbench/), [PHPMyAdmin](https://www.phpmyadmin.net) ou [DBeaver](https://dbeaver.io/).
3. PHP > 7.3 com as extensões OpenSSL, PDO e Mbstring ativas ([detalhes aqui](https://lumen.laravel.com/docs/10.x#server-requirements)). Verifique na sua configuração:
- Se Windows + Xampp: C:\xampp\php\php.ini se as extensões estão descomentadas;
- Se Linux: /etc/php/X.Y/apache/php.ini onde X.Y é a versão do PHP (8.0 por exemplo).
4. Para usuários Windows recomenda-se sempre utilizar o [Git Bash for Windows](https://gitforwindows.org/) a fim de executar comandos similares ao estilo linux das aulas.
5. Acesso via linha de comando ao PHP. Usuários Windows [acessem aqui](https://ichi.pro/pt/adicionar-xampp-php-a-variaveis-de-ambiente-no-windows-10-192554782273742) para verificar como incluir o executável do PHP caso estiverem com uma instalação XAMPP/WAMP.
6. Será utilizado o composer como gerenciador de dependências, é possível usá-lo sem instalação (usar direto o composer.phar). De qualquer forma o passo 5 é obrigatório (usuários Windows, [leiam aqui](https://webdevbr.com.br/fazendo-o-php-funcionar-no-console-cmd-do-windows-instalando-o-composer-e-o-git)). 



## Instalação e Configuração

1. Fazer o download/fork/cópia deste repositório.
2. Instalar via composer o projeto:
```console
dev@pc:~$ php composer.phar install #se usar executável do composer
ou
dev@pc:~$ composer install #se possuir instalado o composer
```
3. Copiar o .env.example para .env (arquivo de configuração) e gerar chave da aplicação:
```console
dev@pc:~$ cp .env.example .env
dev@pc:~$ php artisan key:generate
```
4. Verificar se no arquivo bootstrap/app.php:
- $app->withEloquent(); está descomentado
- $app->withFacades(); está descomentado
- $app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class); está adicionado
5. Inserir a configuração de conexão do banco de dados no arquivo .env e criar o respectivo banco no servidor mysql.
6. Executar as migrations para criar a estrutura de tabelas e os seeds para inserir dados de exemplo:
```console
dev@pc:~$ php artisan migrate
dev@pc:~$ php artisan db:seed
```
7. Para rodar o projeto, acesse o /public do projeto através do seu servidor web ou suba o projeto com o servidor embutido do PHP:
```console
dev@pc:~$ php -S localhost:8000 -t public
```


## Comandos
- Gerar Controller resource:
```console
dev@pc:~$ php artisan make:controller TesteController --resource
```
- Gerar uma Model (lembre sempre de adicionar protected $table com o nome da tabela que se relaciona a esta model):
```console
dev@pc:~$ php artisan make:model Jogador
```
- Gerar um arquivo de migration:
```console
dev@pc:~$ php artisan make:migration create_jogador_table
```
- Executar migrations para sincronizar com o banco de dados:
```console
dev@pc:~$ php artisan migrate
```
- Retornar uma migração (desfaz a última sincroniza/atualização com o banco de dados):
```console
dev@pc:~$ php artisan migrate:rollback
```
- Gerar uma Model + Controller + Migration em um único comando (cuide para corrigir a nomenclatura de nome de tabela dentro das migrations):
```console
dev@pc:~$ php artisan make:model Jogador -mcr
```
- Gerar middlewares:
```console
dev@pc:~$ php artisan make:middleware NomeMiddleware
```


## Documentações
[Migrations](https://laravel.com/docs/10.x/migrations)

[Eloquent ORM](https://laravel.com/docs/10.x/eloquent)

## Dependências

[flipboxstudio/lumen-generator](https://github.com/flipboxstudio/lumen-generator)

[Composer](https://getcomposer.org)



## Contribuindo com o projeto
Serão aceitas atualizações de pacotes, correções de bug e melhorias didáticas. Novas funcionalidades podem serem debatidas e adicionadas ao projeto se verificado necessidade do desenvolvimento de back-end de um jogo completo.

