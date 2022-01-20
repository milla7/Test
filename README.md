<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Api Test

## Configuración

1. Clonar el proyecto.

2. Crear el archivo **.env** y configurar la base de datos como aparece en el archivo **.env.example** 

3. Ejecutar los siguientes comandos
```
$ composer install
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan server 
```
4. La documentación del api se puede visualizar ingresando al ruta raiz del proyecto: localhost:8000/

**Nota:** El usuario y contraseña para generar el token es: test@gmail.com 123456. De igual manera se importara un archivo sql con la bd en caso de tener problemas con las migraciones y seeders, este archivo esta dentro de la carpeta bd