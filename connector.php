<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
}

// Connection ot database
$mysqli = New MySQLi('localhost', 'root', 'root', 'bdp');

// Get current page DB model
if(!is_null($model_name)) {
    include 'models/' . $model_name . '.php';
    $model_ins = ucfirst($model_name);
    $model = new $model_ins($mysqli);
}

$action = $_GET['a'];
switch($action){
    case 'add':

        // Format page name by "_" on name_page
        if(strpos($page_name, '_')) {
            $page_list = substr($page_name, 0, strpos($page_name, '_')) . 's';
        }

        // If is POST
        if(!empty($_POST)) {

            // Insert new item
            $res = $model->insert($_POST);
            if($res) {
                header("location: " . $page_list . ".php?m=iok");
            }
        } else {
            header("location: " . $page_list . ".php");
        }

        break;
    case 'edit':

        // Format page name by "_" on name_page
        if(strpos($page_name, '_')) {
            $page_list = substr($page_name, 0, strpos($page_name, '_')) . 's';
        }

        // If is POST
        if($_POST) {
            // Update item by id
            $res = $model->update($_POST);
            if($res) {
                header("location: " . $page_list . ".php?m=uok");
            }
        } else {
            if(empty($_GET['id'])) {
                header("location: " . $page_list . ".php");
            }

            // Show data
            $array_obj = $model->getById($_GET['id']);
        }

        break;
    case 'delete':

        // Get item id 
        $id = $_GET['s'];
        $res = $model->delete($id);

        if($res) {
            header("location: " . $page_name . ".php?m=ok");
        }

        break;

    default :

        // Perform Select query
        $query_string = getQueryString($page_name);
        $resultSet = $mysqli->query($query_string);

        if ($resultSet->num_rows != 0) {
            $array_obj = array();

            while ($rows = $resultSet->fetch_assoc()) {
                // Get query data
                $data = getDataRow($rows, $page_name);

                // Push data to $array_obj
                array_push($array_obj, $data);
            }
        } else {
            echo "No results";
        }

        break;
}

/**
 * get SQL string
 */
function getQueryString($page_name) {
    if ($page_name == "seasons") {
        return "SELECT * FROM season";
    }

    if ($page_name == "sports") {
        return "SELECT * FROM sport";
    }

    if ($page_name == "clubs") {
        return "SELECT * FROM club";
    }

    if ($page_name == "club_add") {
        return "SELECT * FROM sport";
    }

    if ($page_name == "players") {
        //return "SELECT * FROM user";
        //return "SELECT * FROM user u INNER JOIN player p on u.id = p.id";
        return "SELECT * FROM user u INNER JOIN player p ON u.id = p.id INNER JOIN club c ON p.club_id = c.club_id";
    }
}

/**
 * get associative array
 */
function getDataRow($rows, $page_name) {
    if ($page_name == "seasons") {
        return array(
            'id'        => $rows['season_id'],
            'year'      => $rows['year'],
            'active'    => $rows['active']
        );
    }

    if ($page_name == "sports") {
        return array(
            'id'    => $rows['sport_id'],
            'name'  => $rows['name']
        );
    }

    if ($page_name == "clubs") {
        return array(
            'id'        => $rows['club_id'],
            'name'      => $rows['club_name'],
            'file_url'  => $rows['file_url']
        );
    }

    if ($page_name == "club_add") {
        return array(
            'id'    => $rows['sport_id'],
            'name'  => $rows['name']
        );
    }

    if ($page_name == "players") {
        return array(
            'nif'       => $rows['id'],
            'name'      => $rows['name'],
            'surname'   => $rows['surname'],
            'club_name' => $rows['club_name'],
            'club_id'   => $rows['club_id']
        );
    }
}

/*
  array(19) {
  ["id"]=> string(1) "1"
  ["name"]=> string(4) "UESC"
  ["surname"]=> string(14) "Ortega Carrion"
  ["user_name"]=> string(13) "eduard.ortega"
  ["password"]=> string(8) "19830521"
  ["deleted"]=> string(1) "0"
  ["last_login"]=> string(8) "20150617"
  ["admin"]=> string(1) "0"
  ["birth_date"]=> string(8) "19830521"
  ["created_at"]=> string(8) "20150520"
  ["club_id"]=> string(1) "1"
  ["sport_id"]=> string(1) "1"
  ["category_id"]=> string(1) "1"
  ["gender"]=> string(1) "1"

  ["file_url"]=> string(43) "http://bernatdepablo.cat/img/logos/uesc.jpg"
  ["contact_name"]=> string(11) "Llu�s Curto"
  ["contact_phone"]=> string(9) "606123123"
  ["contact_mail"]=> string(13) "info@uesc.org"
  ["visible"]=> string(1) "1"
  } */
?>