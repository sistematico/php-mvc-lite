# PHP MVC SQLite CRUD (Lite Version)

Simple CRUD project (Create, Read, Update, Delete) made with [PHP](https://php.net), [Mini3](https://github.com/panique/mini3) and [Twitter Boostrap 4](https://getbootstrap.com) with [SQLite3](https://www.sqlite.org) as database.

## Prerequisites

- [Nginx](https://www.nginx.com) ou [Apache](https://www.apache.org)
- [PHP](https://php.net)
- [Composer](https://getcomposer.org)
- [Docker(opcional)](https://www.docker.com/)
- [Fé](https://pt.wikipedia.org/wiki/F%C3%A9)

## Installation

- Unzip or clone this repository on your web server's webroot: `cd /var/www/html && git clone https://github.com/sistematico/php-mvc-lite`
- Run command `composer install` in the same directory where the file `composer.json` is located.
- Go to https://site.com/songs/install
- Pray.

## Nginx

Nginx recommended configuration:

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

## Docker

- https://gist.github.com/sistematico/8798adbc6b55e8e34b0bd093588b7a5f

## Demo

- [https://mvc-lite.lucasbrum.net](https://mvc-lite.lucasbrum.net)

## Credits

- [Arch Linux](https://archlinux.org)
- [Mini3](https://github.com/panique/mini3)
- [Twitter Boostrap 4](https://getbootstrap.com)
- [jQuery](https://jquery.com)
- [Composer](https://getcomposer.org)

## Contribute

- Collaborators are welcome!

## Contact

- lucas@archlinux.com.br

## Help

Donate any amount through <a href="https://pag.ae/bfxkQW"><img src="https://img.shields.io/badge/pagseguro-green"></a> or <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DWHJL387XNW96&source=url"><img src="https://img.shields.io/badge/paypal-blue"></a>