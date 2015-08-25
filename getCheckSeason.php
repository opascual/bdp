<?php
// Connection ot database
$mysqli = New MySQLi('localhost', 'root', 'root', 'bdp');

$sql = "SELECT cl.club_id as club_id, cl.club_name as club_name
            , COUNT(cl.club_id) as players, c.season_id as season_id
            FROM checkup as c
            LEFT JOIN player as p ON c.player_id = p.id
            LEFT JOIN club as cl ON p.club_id = cl.club_id
            WHERE c.season_id = " . $_POST['sid'] . "
            GROUP BY cl.club_id";

$res = $mysqli->query($sql);
for ($data = array(); $tmp = $res->fetch_array(MYSQLI_ASSOC);) {
    $data[] = $tmp;
}

echo json_encode($data);

