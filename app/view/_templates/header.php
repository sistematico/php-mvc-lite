<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP MVC Lite</title>
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/main.css">
    <link rel="shortcut icon" href="<?php echo URL; ?>img/favicon.ico">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo URL; ?>">PHP MVC Lite</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>pages/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>pages/credits">Credits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>songs">Songs</a>
                    </li>
                </ul>
                <form action="<?php echo URL; ?>songs/search" method="post" class="form-inline my-2 my-lg-0">
                    <input name="term" class="form-control mr-sm-2" type="text" placeholder="Search a song" aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>












<!doctype html>
<html lang="pt-br" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>PHP MVC Lite</title>
    <meta name="theme-color" content="#7952b3">
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/sticky.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/main.css">
    <link rel="shortcut icon" href="<?php echo URL; ?>img/favicon.ico">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo URL; ?>">PHP MVC Lite</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
        <form class="d-flex">
          <input name="term" class="form-control mr-2" type="search" placeholder="Search a song" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>