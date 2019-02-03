<?php

/*
Main Render Page
- Uses passed data to render information onto the screen.
*/

// Sets and loads location.
$loader = new Twig_Loader_Filesystem("${path}/www");
$twig = new Twig_Environment($loader);

// Sets up the parsed information.
echo $twig->render("${page}.html", $pass);