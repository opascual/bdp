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
        if(!empty($data['name'])) 
        {
            // Get MAX id
            $id = $this->getMAX();
            
            // Add logo image
            if ($_FILES["file_url"]["error"] == UPLOAD_ERR_OK) 
            {
                // Logos path
                $logos_path = ROOT_PATH . '/img/logos/';
                
                // File data
                $tmp_name   = $_FILES["file_url"]["tmp_name"];
                $file_name  = $logos_path . $_FILES["file_url"]["name"];
                
                // Url to show thumb image
                $file_url   = substr($file_name, strpos($file_name, '/img') + 1);
                
                move_uploaded_file($tmp_name, "$file_name");
            } else {
                $file_url   = "";
            }
            
            // Insert data
            $sql = 'INSERT INTO club VALUES (' . $id . ', "' . $data['name'] 
                . '","' . $file_url 
                . '","' . $data['contact_name']
                . '","' . $data['contact_phone']
                . '","' . $data['contact_mail']
                . '", 1)';
            
            $res = $this->_mysqli->query($sql);

            return $res;
        }
    }
    
    /**
     * Function to update a club
     * @param array $data
     * @return bool
     */
    function update($data) {
        
        if(!empty($data['name'])) {
            
            // Add logo image
            if ($_FILES["file_url"]["error"] == UPLOAD_ERR_OK) 
            {
                // Logos path
                $logos_path = ROOT_PATH . '/img/logos/';
                
                // File data
                $tmp_name   = $_FILES["file_url"]["tmp_name"];
                $file_name  = $logos_path . $_FILES["file_url"]["name"];
                
                // Url to show thumb image
                $file_url   = substr($file_name, strpos($file_name, '/img') + 1);
                
                move_uploaded_file($tmp_name, "$file_name");
            } else {
                $file_url   = $data['uploaded_file'];
            }
            
            // Update data
            $sql = 'UPDATE club SET club_name="' . $data['name']
                . '", file_url="' . $file_url
                . '", contact_name="' . $data['contact_name'] 
                . '", contact_phone="' . $data['contact_phone'] 
                . '", contact_mail="' . $data['contact_mail'] 
                    . '" WHERE club_id=' . $data['club_id'];
            
            $res = $this->_mysqli->query($sql);

            return $res;
        }
    }
    
    /**
     * Function to delete a club
     * @param int $id
     * @return bool
     */
    function delete($id) {
        
        $sql = "DELETE FROM club WHERE club_id = " . $id;
        $res = $this->_mysqli->query($sql);
        
        return $res;
    }
    
    /**
     * Function to get a club by id
     * @param type $id
     * @return type
     */
    function getById($id) {
        $sql = "SELECT * FROM club WHERE club_id = " . $id;
        $res = $this->_mysqli->query($sql);

        $data = $res->fetch_array();
        return $data;
    }
    
    /**
     * Function that returns MAX id
     * @return int
     */
    function getMax() {
        $sql = "SELECT MAX(club_id) as id FROM club";
        $res = $this->_mysqli->query($sql);
        
        $m = $res->fetch_row();
        $max_id = $m[0] +1;
        
        return $max_id;
    }
    
}