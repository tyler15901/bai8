<?php
session_start();


$pdo = new PDO('mysql:host=localhost;dbname=lab05x06;charset=utf8', 'root', '');
include "models/BaseModel.php";
include "models/Ticket.php";
include "models/TicketQuery.php";
include "models/Movie.php";
include "models/MovieQuery.php";
include "controllers/TicketController.php";
include "controllers/HomeController.php";
include './configs/env.php';
include './configs/helper.php';
include './routes/index.php';
