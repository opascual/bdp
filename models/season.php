<?php

class Season{
    
    var $_mysqli;
    
    function __construct($args) {
        
        $this->_mysqli = $args;
    }
    
    /**
     * Function to insert a new season
     * @param array $data
     * @return bool
     */
    function insert($data) {
        
        if(!empty($data['seasons'])) {
            
            // Get MAX id
            $id = $this->getMAX();
            
            $sql = "INSERT INTO season VALUES (". $id .", ". $data['seasons'] .", 0)";
            $res = $this->_mysqli->query($sql);

            return $res;
        }
    }
    
    /**
     * 
     * @param int $id
     * @return bool
     */
    function delete($id) {
        
        $sql = "DELETE FROM season WHERE season_id = " . $id;
        $res = $this->_mysqli->query($sql);
        
        return $res;
    }
    
    
    /**
     * Function that returns MAX id
     * @return int
     */
    function getMax() {
        $sql = "SELECT MAX(season_id) as id FROM season";
        $res = $this->_mysqli->query($sql);
        
        $m = $res->fetch_row();
        $max_id = $m[0] +1;
        
        return $max_id;
    }
}