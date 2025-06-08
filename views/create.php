<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thêm vé xem phim</h2>
<form method="post">
    <label for="seat_number">Số ghế:</label><br>
    <input type="text" name="seat_number" id="seat_number" required><br><br>

    <label for="movie_id">Chọn phim:</label><br>
    <select name="movie_id" id="movie_id" required>
        <option value="">--Chọn phim--</option>
        <?php foreach ($movies as $movie): ?>
            <option value="<?= $movie->id ?>"><?= htmlspecialchars($movie->name) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="price">Giá vé:</label><br>
    <input type="number" name="price" id="price" min="0" required><br><br>

    <label for="show_date">Ngày chiếu:</label><br>
    <input type="date" name="show_date" id="show_date" required><br><br>

    <button type="submit">Thêm mới</button>
    <a href="index.php?controller=ticket&action=list">Quay lại</a>
</form>

</body>
</html>