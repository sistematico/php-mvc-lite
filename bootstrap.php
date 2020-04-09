<?php

if (file_exists('vendor/components/font-awesome/webfonts/')) {
    rename('vendor/components/font-awesome/webfonts/', 'public/webfonts/');
}

if (file_exists('vendor/twbs/bootstrap/dist/css/bootstrap.min.css')) {
    copy('vendor/twbs/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');
}

if (file_exists('vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map')) {
    copy('vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map', 'public/css/bootstrap.min.css.map');
}

if (file_exists('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js')) {
    copy('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js');
}

if (file_exists('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js.map')) {
    copy('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js.map', 'public/js/bootstrap.bundle.min.js.map');
}

if (file_exists('vendor/components/jquery/jquery.min.js')) {
    copy('vendor/components/jquery/jquery.min.js', 'public/js/jquery.min.js');
}

if (file_exists('vendor/components/font-awesome/css/all.min.css')) {
    copy('vendor/components/font-awesome/css/all.min.css', 'public/css/fontawesome.min.css');
}

?>