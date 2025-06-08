<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Danh sach ticket</h2>
    <a href="index.php?action=create_ticket">tao moi</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>id</th>
            <th>so ghe</th>
            <th>movie id</th>
            <th>ten phim</th>
            <th>gia ve</th>
            <th>ngay chieu</th>
            <th>hanh dong</th>
        </tr>
        <?php foreach($tickets as $ticket): ?>
            <tr>
                <td><?=$ticket->id?></td>
                <td><?= htmlspecialchars($ticket->seat_number) ?></td>
                <td><?= $ticket->movie_id ?></td>
                <td><?= htmlspecialchars($ticket->movie_name) ?></td>
                <td><?= number_format($ticket->price) ?></td>
                <td><?= $ticket->show_date ?></td>
                <td>
                    <a href="index.php?action=update_ticket&id=1=<?=$ticket->id?>">sửa</a>
                    <a href="index.php?controller=ticket&action=delete&id=<?= $ticket->id ?>" onclick="return confirm('ban co chac muon xoa?')">xoa</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>