# Game-API Pack - Lumen

Pacote de Desenvolvimento para a Disciplina de PPI2, utilizando PHP + microframework Lumen. O Objetivo é servir de exemplo para a elaboração de um webservice para comuncar dados em JSON a respeito de uma modelagem.

## Modelagem de Referência 

Este projeto faz referência a uma modelagem extremamente simplificada da interação entre um jogador e seus equipamentos (correções e relações many-to-many não serão abordadas até a presente versão).

![Imagem da Modelagem inicial do sistema](/docs/modelagem-inicial.png)

## Pré-requisitos:

1. Ambiente local de desenvolvimento com PHP + Servidor Apache (opcional) + Servidor MySQL:
- Se Windows: usar [Xampp](https://www.apachefriends.org) ou [Laragon](https://laragon.org/);
- Se Linux: [Pilha LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-pt).
2. Para acessar o banco de dados, caso não queira manipular o BD via linha de comando, pode utilizar um ou mais softwares clientes, como [MySQL Workbench](https://www.mysql.com/products/workbench/), [PHPMyAdmin](https://www.phpmyadmin.net) ou [DBeaver](https://dbeaver.io/).
2. Acesso via linha de comando ao PHP e composer (usuários Windows, [leiam aqui](https://webdevbr.com.br/fazendo-o-php-funcionar-no-console-cmd-do-windows-instalando-o-composer-e-o-git)). Uma alternativa para usuários Windows é sempre utilizar o [Git Bash for Windows](https://gitforwindows.org/).
3. PHP >= 7.3 com as extensões OpenSSL, PDO e Mbstring ativas ([detalhes aqui](https://lumen.laravel.com/docs/8.x/installation#server-requirements)). Verifique na sua configuração:
- Se Windows + Xampp: C:\xampp\php\php.ini se as extensões estão descomentadas;
- Se Linux: /etc/php/7.4/apache/php.ini

## Instalação e Configuração

1. Fazer o download/fork/cópia deste repositório.
2. Instalar via composero projeto:
```console
dev@pc:~$ php composer.phar install #se usar executável do composer
ou
dev@pc:~$ php composer install #se possuir instalado o composer
```
3. Gerar chave da aplicação:
```console
dev@pc:~$ php artisan key:generate
```
4. Verificar se no arquivo bootstrap/app.php:
- $app->withEloquent(); está descomentado
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


## Documentações
[Migrations](https://laravel.com/docs/8.x/migrations)

[Eloquent ORM](https://laravel.com/docs/8.x/eloquent)

## Dependências

[flipboxstudio/lumen-generator](https://github.com/flipboxstudio/lumen-generator)

[Composer](https://getcomposer.org)


