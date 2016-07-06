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
	

	public function getLogin($pos)
	{
		$r = array("SUCCESS" => false);

		$sql = " SELECT id_user, id, type_user, username FROM users WHERE email = :email AND password = :password";
        $query = $this->db->prepare($sql);
		
		$parameters = array(
			":email" => $pos["member_username"],
			":password" => $pos["member_password"]
		);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		
        $query->execute($parameters);

		$info = $query->fetch(PDO::FETCH_ASSOC);
		
		if( !empty($info) )
		{
			$_SESSION["member_id"] = $info['id_user'];
			$_SESSION["member_ns"] = $info['id'];
			$_SESSION["member_name"] = $info['username'];
			$_SESSION["type_user"] = $info['type_user'];

			$r["SUCCESS"] = true;
		}

		return $r;
	}

}
