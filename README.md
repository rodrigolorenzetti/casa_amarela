# Casa Amarela

Siga os passos descritos abaixo para rodar a aplicação.

## Requisitos

PHP >= 8.0<br />
Composer >= 2.0<br />
NPM instalado<br />

## Instalação / configuração

Primeiramente, é necessário criar seu banco de dados local e alterar sua conexão no arquivo .env, localizado na raíz do projeto:

DB_CONNECTION=mysql<br />
DB_HOST=127.0.0.1<br />
DB_PORT=3306<br />
DB_DATABASE=[insira aqui o banco de dados do projeto]<br />
DB_USERNAME=[insira aqui nome de usuario da sua conexao]<br />
DB_PASSWORD=[insira aqui a senha da sua conexao]<br />

Para criar o banco de dados com a tabela admins:

```bash
php artisan migrate
```

Para instalar pacotes Composer:

```bash
composer install
```

Para instalar pacotes NPM:

```bash
npm install
```

## Inicialização

Aconselho abrir três terminais, sendo o primeiro para rodar o server local, o segundo para rodar o NPM e o terceiro para possíveis criações de controllers, migrations e models

PHP:

```php
php artisan serve
```

NPM:

```php
npm run watch
```

## Recados

Caso tenha erros relacionados a banco de dados, verifique se todas as configurações estão corretas o arquivo.env
