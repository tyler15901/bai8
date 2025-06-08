<?php
class TicketQuery extends BaseModel{
    public function all(){
        try{
            $sql = "SELECT ti.*, mo.name as movie_name FROM ticket as ti
                    JOIN movie as mo ON ti.movie_id = mo.id";
            $data = $this->pdo->query($sql)->fetchAll();
            $danhsach = [];
            foreach($data as $value){
                $object = new Ticket();
                $object->id=$value["id"];
                $object->seat_number=$value["seat_number"];
                $object->movie_id=$value["movie_id"];
                $object->price=$value["price"];
                $object->show_date=$value["show_date"];
                $object->movie_name=$value["movie_name"];
                $danhsach[]=$object;
            }
            return $danhsach;

        } catch(Exception $error) {
            echo "Lỗi: " . $error->getMessage();
        }
    }
    public function create($seat_number, $movie_id, $price, $show_date) {
        try {
            $sql = "INSERT INTO ticket (seat_number, movie_id, price, show_date) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$seat_number, $movie_id, $price, $show_date]);
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage();
            return false;
        }
    }
    public function find($id) {
        try {
            $sql = "SELECT ti.*, mo.name as movie_name FROM ticket as ti
                    JOIN movie as mo ON ti.movie_id = mo.id
                    WHERE ti.id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $value = $stmt->fetch();
            if ($value) {
                $object = new Ticket();
                $object->id = $value["id"];
                $object->seat_number = $value["seat_number"];
                $object->movie_id = $value["movie_id"];
                $object->price = $value["price"];
                $object->show_date = $value["show_date"];
                $object->movie_name = $value["movie_name"];
                return $object;
            }
            return null;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage();
            return null;
        }
    }

    public function update($id, $seat_number, $movie_id, $price, $show_date) {
        try {
            $sql = "UPDATE ticket SET seat_number=?, movie_id=?, price=?, show_date=? WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$seat_number, $movie_id, $price, $show_date, $id]);
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage();
            return false;
        }
    }
}

?>