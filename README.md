# PHP MVC SQLite CRUD (Lite Version)

Simple CRUD project (Create, Read, Update, Delete) made with [PHP](https://php.net), [Mini3](https://github.com/panique/mini3) and [Twitter Boostrap 5](https://v5.getbootstrap.com) with [SQLite3](https://www.sqlite.org) as database.

## Prerequisites

- [Nginx](https://www.nginx.com) or [Apache](https://www.apache.org)
- [PHP](https://php.net)
- [Docker(opcional)](https://www.docker.com/)
- [Faith](https://en.wikipedia.org/wiki/Faith)

## Installation

- Unzip or clone this repository on your web server's webroot: `git clone https://github.com/sistematico/php-mvc-lite /var/www/html`
- Go to https://site.com
- Pray.

## Nginx

Nginx recommended configuration:

```
server {
    listen 80;
    server_name localhost;
    error_log  /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
    root /var/www/html/public;

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
- [PHP](https://www.php.net)
- [PHP-FIG](https://www.php-fig.org/psr/psr-4/)
- [Mini3](https://github.com/panique/mini3)
- [Twitter Boostrap 5](https://v5.getbootstrap.com)

## Contribute

- Collaborators are welcome!

## Contact

- lucas@archlinux.com.br

## Help

Donate any amount through <a href="https://pag.ae/bfxkQW"><img src="https://img.shields.io/badge/pagseguro-green"></a> or <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DWHJL387XNW96&source=url"><img src="https://img.shields.io/badge/paypal-blue"></a>