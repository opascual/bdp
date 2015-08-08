<?php

class Checkup {

    var $_mysqli;

    function __construct($args) {

        $this->_mysqli = $args;
    }

    /**
     * Function to insert a new checkup
     * @param array $data
     * @return bool
     */
    function insert($data) {

        // Check if exist a revision with player_id and season_id
        $exist_id = $this->getCheckupByPlayerSeason($data['player_id'], $data['season_id']);
        if($exist_id) {
            
            // Set checkup_id
            $data['checkup_id'] = $exist_id;
            
            // Update revision
            $this->update($data);
        } else {
            if (!empty($data['season_id'])) {

                // Checkup id
                $checkup_id = $this->getMax();

                // Insert data into USER
                $sql = 'INSERT INTO checkup VALUES (' . $checkup_id
                        . ', "", "' 
                        . $data['player_id']
                        . '","' . $data['season_id']
                        . '",0' 
                        . ',"' . $data['background_family']
                        . '","' . $data['background_injuries']
                        . '","' . $data['background_disease']
                        . '","' . $data['background_fracture']
                        . '","' . $data['background_allergy']
                        . '","' . $data['background_activity']
                        . '","' . $data['background_other']
                        . '","' . $data['anthropometry_height']
                        . '","' . $data['anthropometry_weight']
                        . '","' . $data['anthropometry_morphotype']
                        . '","' . $data['cardio_rhytm']
                        . '","' . $data['cardio_pressure']
                        . '","' . $data['cardio_pulses']
                        . '","' . $data['cardio_ecg']
                        . '","' . $data['cardio_bufs']
                        . '","' . $data['cardio_oxygen']
                        . '","' . $data['musculoskeletal_column']
                        . '","' . $data['musculoskeletal_limb']
                        . '","' . $data['musculoskeletal_hamstrings']
                        . '","' . $data['musculoskeletal_varus']
                        . '","' . $data['musculoskeletal_podoscopia']
                        . '","' . $data['recommend']
                        . '")';

                $res = $this->_mysqli->query($sql);
                if($res) {
                    // Create file folder if doesn't exist
                    $filePath = $this->createFolder($data['season_id']);

                    // Create PDF file and move to folder
                    $this->createPDF($data, $filePath);
                }

                return $res;
            }
        }
    }

    /**
     * Function to update a checkup
     * @param array $data
     * @return bool
     */
    function update($data) {
        
        if (!empty($data['checkup_id'])) {

            // Update CHECKUO data
            $sql = 'UPDATE checkup '
                    . 'SET player_id="' . $data['player_id']
                    . '", season_id="' . $data['season_id']
                    . '", background_family="' . $data['background_family']
                    . '", background_injuries="' . $data['background_injuries']
                    . '", background_disease="' . $data['background_disease']
                    . '", background_fracture="' . $data['background_fracture']
                    . '", background_allergy="' . $data['background_allergy']
                    . '", background_activity="' . $data['background_activity']
                    . '", background_other="' . $data['background_other']
                    . '", anthropometry_height="' . $data['anthropometry_height']
                    . '", anthropometry_weight="' . $data['anthropometry_weight']
                    . '", anthropometry_morphotype="' . $data['anthropometry_morphotype']
                    . '", cardio_rhytm="' . $data['cardio_rhytm']
                    . '", cardio_pressure="' . $data['cardio_pressure']
                    . '", cardio_pulses="' . $data['cardio_pulses']
                    . '", cardio_ecg="' . $data['cardio_ecg']
                    . '", cardio_bufs="' . $data['cardio_bufs']
                    . '", cardio_oxygen="' . $data['cardio_oxygen']
                    . '", musculoskeletal_column="' . $data['musculoskeletal_column']
                    . '", musculoskeletal_limb="' . $data['musculoskeletal_limb']
                    . '", musculoskeletal_hamstrings="' . $data['musculoskeletal_hamstrings']
                    . '", musculoskeletal_varus="' . $data['musculoskeletal_varus']
                    . '", musculoskeletal_podoscopia="' . $data['musculoskeletal_podoscopia']
                    . '", recommend="' . $data['recommend']
                    . '" WHERE checkup_id="' . $data['checkup_id'] . '"';  
            
            $res = $this->_mysqli->query($sql);
            if($res) {
                // Create file folder if doesn't exist
                $filePath = $this->createFolder($data['season_id']);

                // Create PDF file and move to folder
                $this->createPDF($data, $filePath);
            }

            return $res;
        }
    }

    /**
     * Function to get a checkup by id
     * @param type $id
     * @return type
     */
    function getById($id) {
        $sql = "SELECT c.*, CONCAT(u.name, ' ', u.surname) as player_name, p.birth_date as player_birth_date "
                . "FROM checkup as c "
                . "LEFT JOIN user as u ON c.player_id = u.id "
                . "LEFT JOIN player as p ON c.player_id = p.id "
                . "WHERE c.checkup_id = '" . $id . "'";
        $res = $this->_mysqli->query($sql);

        $data = $this->fetch_all($res, MYSQLI_ASSOC);
        
        // Date format
        $bd = $data[0]['player_birth_date'];
        $data[0]['player_birth_date'] = substr($bd, 6)
                . '/' . substr($bd, 4, 2)
                . '/' . substr($bd, 0, 4);
        
        return $data[0];
    }

    /**
     * Function to get seasons with revision
     * @param type $id
     * @return type
     */
    function getSeasonsWithRevision() {
        $sql = "SELECT s.season_id as season_id, s.year as year "
                . "FROM checkup as c "
                . "LEFT JOIN season as s ON c.season_id = s.season_id "
                . "GROUP BY c.season_id "
                . "ORDER BY c.season_id ASC";
        
        $res = $this->_mysqli->query($sql);
        $data = $this->fetch_all($res, MYSQLI_ASSOC);
        
        return $data;
    }
    
    /**
     * Function to get a season by id
     * @param type $id
     * @return type
     */
    function getSeasonById($id) {
        $sql = "SELECT * FROM season WHERE season_id = '" . $id . "'";
        $res = $this->_mysqli->query($sql);

        $data = $res->fetch_array();
        return $data;
    }
    
    /**
     * Function to get a season by id
     * @param type $id
     * @return type
     */
    function getCheckupByPlayerSeason($player_id, $season_id) {
        $sql = "SELECT checkup_id "
                . "FROM checkup "
                . "WHERE season_id = '" . $season_id . "' "
                . "AND player_id = '" . $player_id . "'";
        $res = $this->_mysqli->query($sql);

        $data = $res->fetch_row();
        return $data[0];
    }
    
    /**
     * Function that returns MAX id
     * @return int
     */
    function getMax() {
        $sql = "SELECT MAX(checkup_id) as id FROM checkup";
        $res = $this->_mysqli->query($sql);

        if($res === FALSE) {
            return 1;
        }
        
        $m = $res->fetch_row();
        $max_id = $m[0] + 1;

        return $max_id;
    }

    /**
     * Function to get all Seasons
     * @return array
     */
    function getSeasons() {
        $sql = "SELECT * FROM season ORDER BY year ASC";
        $res = $this->_mysqli->query($sql);
        
        $data = $this->fetch_all($res, MYSQLI_ASSOC);
        
        return $data;
    }

    /**
     * Function to get club by player_id
     * @return array
     */
    function getLogoByPlayer($player_id) {
        $sql = "SELECT c.file_url as file_url "
                . "FROM club as c "
                . "LEFT JOIN player as p ON p.club_id = c.club_id "
                . "WHERE p.id = '" . $player_id ."'";
        $res = $this->_mysqli->query($sql);
        
        $data = $res->fetch_row();

        return $data[0];
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
    
    /**
     *  Function to create the folder to place the PDF file
     * @param int $season_id
     * @return string Path to place the file
     */
    private function createFolder($season_id) {
        // Get selected season
        $season = $this->getSeasonById($season_id);
        
        // Check if folder exist
        $pathToFiles = ROOT_PATH . '/files/' . $season['year'];
        if (!file_exists($pathToFiles)) {
            mkdir($pathToFiles);
        }
        
        return $pathToFiles;
    }
    
    private function createPDF($data, $filePath) {
        
//        require('fpdf.php');
        require('mc_table.php');
        
        // PDF file path
        $fileName = $filePath . '/' . $data['player_id'] . '.pdf';
        
        // Club logo
        $logo = $this->getLogoByPlayer($data['player_id']);
        
        // Season
        $season = $this->getSeasonById($data['season_id']);
        $season_formated = $season['year'] . '-' . (substr($season['year'], 2) + 1);
        
//        $pdf = new FPDF();
        $pdf = new PDF_MC_Table();
        $pdf->AddPage();
        $pdf->SetFont('Arial','BU',12);
        
        $str = iconv('UTF-8', 'windows-1252', 'RECONEIXEMENT MÈDIC ' . $season_formated);
        $pdf->Cell(40,10,$str, 0, 1);
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,6,'Nom i cognoms: ' . $data['player_name'], 0, 1, 'L');
        $pdf->Cell(40,6,'Data naixement: ' . $data['player_birth_date'], 0, 1, 'L');
        
        // Set logo
        // Insert a logo in the top-left corner at 300 dpi
        $pdf->Image(ROOT_PATH . '/' . $logo,120,10);
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'ANTECEDENTS:', 0, 1, 'L');
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,6,'Antecedents familiars: ' . $data['background_family'], 0, 1, 'L');
        $pdf->Cell(40,6,'Lesions esportives: ' . $data['background_injuries'], 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Malalties: ' . $data['background_disease']), 0, 1, 'L');
        $pdf->Cell(40,6,'Fractures: ' . $data['background_fracture'], 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Al·lèrgies: ' . $data['background_allergy']), 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', "Hores setmanals d'activitat física: " . $data['background_activity']), 0, 1, 'L');
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'ANTROPOMETRIA:', 0, 1, 'L');
        
        //Table with 5 rows and 2 columns
        $pdf->SetWidths(array(30,30,));
        $pdf->SetAligns(array('C', 'C',));
        $pdf->SetFont('Arial','',10);
        $pdf->Row(array('', $season_formated));
        $pdf->Row(array(iconv('UTF-8', 'windows-1252', 'Alçada'), $data['anthropometry_height']));
        $pdf->Row(array('Pes', $data['anthropometry_weight']));
        $pdf->Row(array('Morfotipus', iconv('UTF-8', 'windows-1252', $data['anthropometry_morphotype'])));
        $pdf->Row(array('IMC', $data['anthropometry_imc']));
        $pdf->Ln();
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'APARELL CARDIO-RESPIRATORI:', 0, 1, 'L');
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,6,'Ritme: ' . $data['cardio_rhytm'], 0, 1, 'L');
        $pdf->Cell(90,6, iconv('UTF-8', 'windows-1252', 'Tensió arterial: ' . $data['cardio_pressure']), 0, 0, 'L');
        $pdf->Cell(40,6,'Bufs: ' . $data['cardio_bufs'], 0, 1, 'L');
        $pdf->Cell(90,6, iconv('UTF-8', 'windows-1252', 'Polsos perifèrics: ' . $data['cardio_pulses']), 0, 0, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Saturació oxigen: ' . $data['cardio_oxygen']), 0, 1, 'L');
        $pdf->MultiCell( 180, 8, iconv('UTF-8', 'windows-1252', 'ECG: ' . $data['cardio_ecg']), 0);
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'APARELL LOCOMOTOR:', 0, 1, 'L');
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Columna: ' . $data['musculoskeletal_column']), 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Dismetries: ' . $data['musculoskeletal_limb']), 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Isquiotibials: ' . $data['musculoskeletal_hamstrings']), 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Genu varo/valg: ' . $data['musculoskeletal_varus']), 0, 1, 'L');
        $pdf->Cell(40,6, iconv('UTF-8', 'windows-1252', 'Podoscopia: ' . $data['musculoskeletal_podoscopia']), 0, 1, 'L');
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'RECOMANACIONS:', 0, 1, 'L');
        
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell( 180, 8, iconv('UTF-8', 'windows-1252', $data['recommend']), 0);
        $pdf->Ln();
        
        // Set footer
        $pdf->Cell(180,6, iconv('UTF-8', 'windows-1252', 'Dr. Bernat de Pablo'), 0, 1, 'R');
        $pdf->Cell(180,6, iconv('UTF-8', 'windows-1252', 'Nº col·legiat: 98-41781-2'), 0, 1, 'R');
        
        $pdf->Output($fileName, 'F');
    }

}
