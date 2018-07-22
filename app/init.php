<?php
session_start();

$route = new \Core\Route();

$route->start($_SERVER['REQUEST_URI']);
