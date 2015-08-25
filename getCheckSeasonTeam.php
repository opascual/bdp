<?php
// Connection ot database
$mysqli = New MySQLi('localhost', 'root', 'root', 'bdp');

$sql = "SELECT u.id, CONCAT(u.name, ' ', u.surname) as player_name, c.checkup_id as checkup_id, cat.category_name as player_category
            FROM checkup as c
            LEFT JOIN user as u ON c.player_id = u.id
            LEFT JOIN player as p ON c.player_id = p.id
            LEFT JOIN category as cat ON p.category_id = cat.category_id
            WHERE c.season_id = " . $_POST['s'] . "
            AND p.club_id = " . $_POST['cid'];

$res = $mysqli->query($sql);
for ($data = array(); $tmp = $res->fetch_array(MYSQLI_ASSOC);) {
    $data[] = $tmp;
}

echo json_encode($data);

