<?php
class TicketController{
    public $ticketQuery;
    public $movieQuery;
    public function __construct($pdo)
    {
        $this->ticketQuery = new TicketQuery($pdo);
        $this->movieQuery = new MovieQuery($pdo);
    }
    public function list(){
        $tickets = $this->ticketQuery->all();
        include "views/list.php";
    }
    public function create(){
        $movie = $this->movieQuery->all();
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $seat_number= $_POST['seat_number'];
            $movie_id = $_POST['movie_id'];
            $price = $_POST['price'];
            $show_date = $_POST['show_date'];
            $this ->ticketQuery->create($seat_number, $movie_id, $price, $show_date);
            header("Location: index.php?controller=ticket&action=list&success=1");
            exit;
        }
        include "views/create.php";
    }
     public function update() {
        $id = $_GET['id'] ?? null;
        $ticket = $this->ticketQuery->find($id);
        $movies = $this->movieQuery->all();
        if (!$ticket) {
            header("Location: index.php?controller=ticket&action=list");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seat_number = $_POST['seat_number'];
            $movie_id = $_POST['movie_id'];
            $price = $_POST['price'];
            $show_date = $_POST['show_date'];
            $this->ticketQuery->update($id, $seat_number, $movie_id, $price, $show_date);
            header("Location: index.php?controller=ticket&action=list&success=1");
            exit;
        }
        include "views/update.php";
}
}
?>