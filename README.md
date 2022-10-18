<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto:

Este projeto não é nada mais que um CRUD de produtos
  
## Dependências do projeto:
1- PHP 8.1+  
2- Composer 2.4.3+  
3- Mysql 8+  
  
## Passos para instalar:
1- git clone  
2- `composer install`  
3- configure seu banco de dados e seu .env  
4- `php run serve`  
5- acesse localhost:8000  
6- o aplicativo dará um erro de chave de criptografia, isto é normal, clique para gerar uma nova chave e em seguida dê um refresh  
  
## Rotas externas API

| GET | api/file/{id} | Download de um arquivo por ID |
  
| GET | api/products | busca todos os produtos cadastrados | filtros são feitos por query parameters
filtros disponíveis: id, barcode, name, description, quantity, created_at
  
## Troubleshooting:
1- Caso o aplicativo retorne um erro de cURL 60, isto aconteceu provavelmente pois você não tem um certificado http configurado no seu *PHP.ini* para a variavel `CURLOPT_CAINFO`. Para isto, configure em seu PHP.ini, `curl.cainfo` o caminho absoluto para seu certificado. Se você não tem um certificado, pode baixar um por https://curl.se/ca/cacert.pem e utilizá-lo.
  
