<?php
/**
 * Model club
 */
class Club{
    
    var $_mysqli;
    
    function __construct($args) {
        
        $this->_mysqli = $args;
    }
    
    /**
     * Function to insert a new club
     * @param array $data
     * @return bool
     */
    function insert($data) {
        
        if(!empty($data['name'])) {
            
            // Get MAX id
            $id = $this->getMAX();
            
            // TODO - Add image
            
            
            $sql = 'INSERT INTO club VALUES (' . $id . ', "' . $data['name'] 
                . '","' . $data['description'] . '")';
            

            $res = $this->_mysqli->query($sql);

            return $res;
        }
    }
    
    /**
     * Function to update a new sport
     * @param array $data
     * @return bool
     */
    function update($data) {
        
        if(!empty($data['name'])) {
            $sql = 'UPDATE sport SET name="' . $data['name'] . 
                '", description="' . $data['description'] . '" WHERE sport_id=' . $data['sport_id'];

            $res = $this->_mysqli->query($sql);

            return $res;
        }
    }
    
    /**
     * Function to delete a sport
     * @param int $id
     * @return bool
     */
    function delete($id) {
        
        $sql = "DELETE FROM sport WHERE sport_id = " . $id;
        $res = $this->_mysqli->query($sql);
        
        return $res;
    }
    
    function getById($id) {
        $sql = "SELECT * FROM sport WHERE sport_id = " . $id;
        $res = $this->_mysqli->query($sql);

        $data = $res->fetch_array();
        return $data;
    }
    
    /**
     * Function that returns MAX id
     * @return int
     */
    function getMax() {
        $sql = "SELECT MAX(sport_id) as id FROM sport";
        $res = $this->_mysqli->query($sql);
        
        $m = $res->fetch_row();
        $max_id = $m[0] +1;
        
        return $max_id;
    }
    
}