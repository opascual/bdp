<?php

class Player {

    var $_mysqli;

    function __construct($args) {

        $this->_mysqli = $args;
    }

    /**
     * Function to insert a new player
     * @param array $data
     * @return bool
     */
    function insert($data) {

        if (!empty($data['id'])) {

            // Prepare data to insert
            $bd = $data['birth_date'];
            $birth = substr($bd, strrpos($bd, '/') + 1) 
                . substr($bd, strpos($bd, '/') + 1, 2) 
                . substr($bd, 0, strpos($bd, '/'));
            
            // Created date
            $created_date = date('Ymd');
            
            // Insert data into USER
            $sql = 'INSERT INTO user VALUES ("' . $data['id'] . '", "' . $data['name']
                    . '","' . $data['surname']
                    . '","' . $data['user_name']
                    . '","' . $birth
                    . '", 0, "", "' . md5($birth) . '")';
            
            $res = $this->_mysqli->query($sql);
            if(!$res) {
                return FALSE;
            }
            
            // Insert data into PLAYER
            $sql = 'INSERT INTO player VALUES ("' . $data['id']
                    . '", 0, "' . $birth
                    . '","' . $created_date
                    . '","' . $data['club_id']
                    . '","' . $data['sport_id']
                    . '","' . $data['category_id']
                    . '","' . $data['gender']
                    . '")';
            
            $res2 = $this->_mysqli->query($sql);

            return $res2;
        }
    }

    /**
     * Function to update a player
     * @param array $data
     * @return bool
     */
    function update($data) {

        if (!empty($data['id'])) {

            // Prepare data to insert
            $bd = $data['birth_date'];
            $birth = substr($bd, strrpos($bd, '/') + 1) 
                . substr($bd, strpos($bd, '/') + 1, 2) 
                . substr($bd, 0, strpos($bd, '/'));
            
            // Update USER data
            $sql = 'UPDATE user SET name="' . $data['name']
                . '", surname="' . $data['surname']
                . '", user_name="' . $data['user_name'] 
                . '", password="' . $birth
                . '" WHERE id="' . $data['id'] . '"';            
            $res = $this->_mysqli->query($sql);
            if(!$res) {
                return FALSE;
            }
            
            // Update PLAYER data
            $sql = 'UPDATE player SET birth_date="' . $birth
                . '", club_id="' . $data['club_id'] 
                . '", sport_id="' . $data['sport_id'] 
                . '", category_id="' . $data['category_id'] 
                . '", gender="' . $data['gender'] 
                . '" WHERE id="' . $data['id'] . '"';            
            $res2 = $this->_mysqli->query($sql);

            return $res2;
        }
    }

    /**
     * 
     * @param int $id
     * @return bool
     */
    function delete($id) {

        $sql = "DELETE FROM player WHERE id = '" . $id . "'";
        $res = $this->_mysqli->query($sql);
        if(!$res) {
            return FALSE;
        }
        
        $sql = "DELETE FROM user WHERE id = '" . $id . "'";
        $res2 = $this->_mysqli->query($sql);

        return $res2;
    }

    /**
     * Function to get a club by id
     * @param type $id
     * @return type
     */
    function getById($id) {
        $sql = "SELECT * FROM user as u LEFT JOIN player as p ON u.id = p.id WHERE u.id = '" . $id . "'";
        $res = $this->_mysqli->query($sql);

        $data = $res->fetch_array();
        
        // Date format
        $bd = $data['birth_date'];
        $data['birth_date'] = substr($bd, 6)
                . '/' . substr($bd, 4, 2)
                . '/' . substr($bd, 0, 4);
        
        return $data;
    }
    
    /**
     * Function that returns MAX id
     * @return int
     */
    function getMax() {
        $sql = "SELECT MAX(id) as id FROM player";
        $res = $this->_mysqli->query($sql);

        $m = $res->fetch_row();
        $max_id = $m[0] + 1;

        return $max_id;
    }

    /**
     * Function to get all Clubs
     * @return array
     */
    function getClubs() {
        $sql = "SELECT * FROM club ORDER BY club_name ASC";
        $res = $this->_mysqli->query($sql);

        $data = $this->fetch_all($res, MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Function to get all Sports
     * @return array
     */
    function getSports() {
        $sql = "SELECT * FROM sport ORDER BY name ASC;";
        $res = $this->_mysqli->query($sql);

        $data = $this->fetch_all($res, MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Function to get all Categories
     * @return array
     */
    function getCategories() {
        $sql = "SELECT * FROM category ORDER BY category_name ASC";
        $res = $this->_mysqli->query($sql);

        $data = $this->fetch_all($res, MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Function to override non-existing method fetch_all
     * @param mysqli $result
     * @param string $resulttype
     * @return array
     */
    public function fetch_all($result, $resulttype = MYSQLI_NUM) 
    {
        for ($res = array(); $tmp = $result->fetch_array($resulttype);) {
            $res[] = $tmp;
        }

        return $res;
    }

}
