<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto:

Este projeto não é nada mais que um CRUD de produtos

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

