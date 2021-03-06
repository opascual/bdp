<?php

// Turn off error_reporting
error_reporting(0);

// Start session
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
}

// Define ROOT PATH
$root_path = getcwd();
define('ROOT_PATH', $root_path);

// Connection ot database
$mysqli = New MySQLi('localhost', 'root', 'root', 'bdp');

// Get current page DB model
if(!is_null($model_name)) {
    include 'models/' . $model_name . '.php';
    $model_ins = ucfirst($model_name);
    $model = new $model_ins($mysqli);
}

// Check action
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
    
    if ($page_name == "checkups") {

        return "SELECT cl.club_id as club_id, cl.club_name as club_name
            , COUNT(cl.club_id) as players, c.season_id as season_id
            FROM checkup as c
            LEFT JOIN player as p ON c.player_id = p.id
            LEFT JOIN club as cl ON p.club_id = cl.club_id
            WHERE c.season_id = 1
            GROUP BY cl.club_id";
    }
    
    if ($page_name == "checkups_club") {
        
        return "SELECT u.id, CONCAT(u.name, ' ', u.surname) as player_name, c.checkup_id as checkup_id, cat.category_name as player_category
            FROM checkup as c
            LEFT JOIN user as u ON c.player_id = u.id
            LEFT JOIN player as p ON c.player_id = p.id
            LEFT JOIN category as cat ON p.category_id = cat.category_id
            WHERE c.season_id = " . $_GET['s'] . "
            AND p.club_id = " . $_GET['cid'];
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

    if ($page_name == "checkups") {
        return array(
            'club_id'   => $rows['club_id'],
            'club_name' => $rows['club_name'],
            'players'   => $rows['players'],
            'season_id' => $rows['season_id']
        );
    }

    if ($page_name == "checkups_club") {
        return array(
            'player_id'         => $rows['id'],
            'player_name'       => $rows['player_name'],
            'checkup_id'        => $rows['checkup_id'],
            'player_category'   => $rows['player_category']
        );
    }
}
?>