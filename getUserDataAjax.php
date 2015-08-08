<?php
// Connection ot database
$mysqli = New MySQLi('localhost', 'root', 'root', 'bdp');

$sql = "SELECT u.name as name, u.surname as surname, p.birth_date as player_birth_date"
        . ", c.background_family as background_family, c.background_injuries as background_injuries"
        . ", c.background_disease as background_disease, c.background_fracture as background_fracture"
        . ", c.background_allergy as background_allergy, c.background_activity as background_activity"
        . ", c.background_other as background_other "
        . "FROM checkup as c "
        . "LEFT JOIN user as u ON u.id = c.player_id "
        . "LEFT JOIN player as p ON u.id = p.id "
        . "WHERE u.id = '" . $_POST['id'] . "'"
        . "ORDER BY c.checkup_id DESC";
$res = $mysqli->query($sql);

$data = $res->fetch_array();
if(is_null($data)) {
    $sql = "SELECT u.name as name, u.surname as surname, p.birth_date as player_birth_date "
        . "FROM user as u "
        . "LEFT JOIN player as p ON u.id = p.id "
        . "WHERE u.id = '" . $_POST['id'] . "'";
    $res = $mysqli->query($sql);
    
    // Fetch data
    $data = $res->fetch_array();
    
    // Data format
    $result = array();

    $result['player_name'] = $data['name'] . ' ' . $data['surname'];
    $bd = $data['player_birth_date'];
    $result['player_birth_date'] = substr($bd, 6)
            . '/' . substr($bd, 4, 2)
            . '/' . substr($bd, 0, 4);

    echo json_encode($result);
} else {
    // Data format
    $result = array();

    $result['player_name'] = $data['name'] . ' ' . $data['surname'];
    $bd = $data['player_birth_date'];
    $result['player_birth_date'] = substr($bd, 6)
            . '/' . substr($bd, 4, 2)
            . '/' . substr($bd, 0, 4);

    // Get background from last revision
    $result['background_family']    = $data['background_family'];
    $result['background_injuries']  = $data['background_injuries'];
    $result['background_disease']   = $data['background_disease'];
    $result['background_fracture']  = $data['background_fracture'];
    $result['background_allergy']   = $data['background_allergy'];
    $result['background_activity']  = $data['background_activity'];
    $result['background_other']     = $data['background_other'];

    echo json_encode($result);
}
