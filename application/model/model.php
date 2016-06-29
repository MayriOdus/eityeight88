<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
	

	public function getDistrictList($amp)
	{
		$sql = " SELECT DISTRICT_ID, DISTRICT_NAME FROM tbl_district WHERE AMPHUR_ID = '".$amp."' ";
        $query = $this->db->prepare($sql);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute();
		$dist = $query->fetchAll(PDO::FETCH_ASSOC);
	
		$opt = '<option value=""> -- เลือก -- </option>';
		foreach( $dist as $g )
		{
			$opt .= '<option value="'.$g["DISTRICT_ID"].'">'.trim($g["DISTRICT_NAME"]).'</option>';
		}

		return $opt;
	}

}
