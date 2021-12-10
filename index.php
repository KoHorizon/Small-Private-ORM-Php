<?php
require __DIR__ . '/config/ORM/Request.php';
require __DIR__ . '/src/Controller/APIController.php';
require __DIR__ . '/vendor/autoload.php';


// Create Router instance
$router = new \Bramus\Router\Router();





$router->get('/get/tables/(\w+)', 'src\Controller\API@getTable');
$router->get('/get/ticket/(\d+)', 'src\Controller\API@getTicket');
$router->get('/get/ticket/comment/(\d+)', 'src\Controller\API@getComment');
$router->get('/export/table/(\w+)/(\w+)', 'src\Controller\API@exportTable');
$router->get('/export/ticket/(\d+)/(\w+)', 'src\Controller\API@exportTicketBy');
$router->post('/post/ticket', 'src\Controller\API@postTicket');





$router->run();