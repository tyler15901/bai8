<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'             => (new HomeController)->index(),
    'list_ticket'   => (new TicketController($pdo))->list(),
    'create_ticket' => (new TicketController($pdo))->create(),
    'update_ticket' => (new TicketController($pdo))->update(),
    default         => (new HomeController)->index(),
};
