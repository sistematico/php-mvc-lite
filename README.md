# PHP MVC SQLite CRUD (Lite Version)

Projeto simples de CRUD(Create, Read, Update, Delete) em [PHP](https://php.net) usando o [Mini3](https://github.com/panique/mini3) e o [Twitter Boostrap 4](https://getbootstrap.com) com o banco de dados em [SQLite3](https://www.sqlite.org).

## Pré-requisitos

- Nginx ou Apache
- PHP
- Composer
- Fé

## Instalação

- Descompacte ou clone este repositório no webroot do seu servidor web: `cd /var/www/html && git clone https://github.com/sistematico/php-mvc-lite`
- Rode o comando `composer install` no mesmo diretório onde se encontra o arquivo `composer.json`
- Visite: https://site.com/songs/install
- Reze.

## Nginx

Sugestão de configuração do Nginx:

```
server {
    listen 80;
    server_name localhost;
    error_log  /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
    root /var/www/php-mvc-lite/public;

    location / {
    	index index.php;
        try_files /$uri /$uri/ /index.php?url=$uri&$args;
    }

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

## Demo

- [https://mvc-lite.lucasbrum.net](https://mvc-lite.lucasbrum.net)

## Créditos

- [Arch Linux](https://archlinux.org)
- [Mini3](https://github.com/panique/mini3)
- [Twitter Boostrap 4](https://getbootstrap.com)
- [jQuery](https://jquery.com)
- [Spur](https://hackerthemes.com/bootstrap-templates/spur/)
- [Composer](https://getcomposer.org)
- [PHPMailer](https://packagist.org/packages/phpmailer/phpmailer)
- [Monolog](https://packagist.org/packages/monolog/monolog)

## Contribuindo

- Colaboradores são bem vindos(as)!

## Contato

- lucas@archlinux.com.br

## Ajude

Doe qualquer valor através do <a href="https://pag.ae/bfxkQW"><img src="https://img.shields.io/badge/pagseguro-green"></a> ou <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DWHJL387XNW96&source=url"><img src="https://img.shields.io/badge/paypal-blue"></a>