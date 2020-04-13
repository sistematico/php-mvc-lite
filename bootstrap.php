<?php

if (file_exists('vendor/components/font-awesome/webfonts/')) {
    rename('vendor/components/font-awesome/webfonts/', 'public/webfonts/');
} else {
    echo "ERROR: Directory vendor/components/font-awesome/webfonts/ not found.";
}

if (file_exists('vendor/twbs/bootstrap/dist/css/bootstrap.min.css')) {
    copy('vendor/twbs/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');
} else {
    echo "ERROR: File vendor/twbs/bootstrap/dist/css/bootstrap.min.css not found.";
}

if (file_exists('vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map')) {
    copy('vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map', 'public/css/bootstrap.min.css.map');
} else {
    echo "ERROR: File vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map not found.";
}

if (file_exists('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js')) {
    copy('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js');
} else {
    echo "ERROR: File vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js not found.";
}

if (file_exists('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js.map')) {
    copy('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js.map', 'public/js/bootstrap.bundle.min.js.map');
} else {
    echo "ERROR: File vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js.map not found.";
}

if (file_exists('vendor/components/jquery/jquery.min.js')) {
    copy('vendor/components/jquery/jquery.min.js', 'public/js/jquery.min.js');
} else {
    echo "ERROR: File vendor/components/jquery/jquery.min.js not found.";
}

if (file_exists('vendor/components/font-awesome/css/all.min.css')) {
    copy('vendor/components/font-awesome/css/all.min.css', 'public/css/fontawesome.min.css');
} else {
    echo "ERROR: File vendor/components/font-awesome/css/all.min.css not found.";
}

?>