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
	
	public function getUserContact($sid)
	{
		$sql = " SELECT u.username as name , u.lastname as lastname, u.email, c.address, c.tele, c.logos FROM users u, contact_user c WHERE u.id_user = c.id_user AND u.id_user = :sid ";
        $query = $this->db->prepare($sql);
		
		$parameters = array(
			":sid" => $sid
		);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		
        $query->execute($parameters);

		return $user = $query->fetch(PDO::FETCH_ASSOC);
	}


	public function getBuyer($cid)
	{
		$sql = " SELECT * FROM buyer WHERE cokie = :cid ";
        $query = $this->db->prepare($sql);
		
		$parameters = array(
			":cid" => $cid
		);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		
        $query->execute($parameters);

		return $buyer = $query->fetchAll(PDO::FETCH_ASSOC);
	}


	public function getLogin($pos)
	{
		$r = array("SUCCESS" => false);

		$sql = " SELECT id_user, id, type_user, username FROM users WHERE email = :email AND password = :password";
        $query = $this->db->prepare($sql);
		
		$parameters = array(
			":email" => $pos["member_username"],
			":password" => md5($pos["member_password"])
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


	public function getRegis($pos)
	{
		$r = array("SUCCESS" => false);
		
		$sql = "SELECT count(id) as ctn FROM users";
		$query = $this->db->prepare($sql);
		$query->execute();
		$cuser = $query->fetch(PDO::FETCH_ASSOC);
		
		$userid =  $cuser["ctn"] . date("dmy");

		$sql = "SELECT count(id) as ctn FROM users WHERE email = :email ";
		$query = $this->db->prepare($sql);
		$parameters = array(
			":email" => $pos["userEmail"]
		);

		$query->execute($parameters);
		$chkuser = $query->fetch(PDO::FETCH_ASSOC);

		if( $chkuser["ctn"] == 0 )
		{
			$password = md5($pos["password"]);	
			$acode = $this->rand_string(10);
			
			//add to the database
			$sql = " INSERT INTO users(username,lastname,password,email,id_user,type_user,activecode) VALUES(:username, :lastname, :password, :email, :userid, :usertype, :acode) ";
			$query = $this->db->prepare($sql);
			$parameters = array(
				":username" => $pos["userName"],
				":lastname" => $pos["lname"],
				":password" => $password,
				":email" => $pos["userEmail"],
				":userid" => $userid,
				":usertype" => "users",
				":acode" => $acode
			);

			if( $query->execute($parameters) )
			{
				$sql ="INSERT INTO contact_user(id_user,tele) VALUES(:userid,:teluser)";
				$query = $this->db->prepare($sql);
				$parameters = array(
					":userid" => $userid,
					":teluser" => $pos["userTele"]
				);

				if( $query->execute($parameters) )
				{
					$sql = "SELECT * FROM users WHERE id_user = :userid ";
					$query = $this->db->prepare($sql);
					$parameters = array( ":userid" => $userid );
					$query->execute($parameters);
					$user = $query->fetch(PDO::FETCH_ASSOC);

					$_SESSION["member_id"] = $userid;
					$_SESSION["member_ns"] = $user['id'];
					$_SESSION["member_name"] = $user['username'];
					$_SESSION["type_user"] = $user['type_user'];

					$r["SUCCESS"] = true;
				}
			}
		}
		else
		{
			$r["ERROR"] = "Duplicate Email";
		}

		return $r;
	}
	
	public function updateProfile($pos)
	{
		$r = array("SUCCESS" => false);
		
		$sql = " UPDATE contact_user SET tele = :tele, address = :address, logos = :logos WHERE id_user = :iid";
		$query = $this->db->prepare($sql);
		$parameters = array(
			":tele" => $pos["tele"],
			":address" => $pos["address"],
			":logos" => $pos["logos"],
			":iid" => $pos["iid"]
		);

		if( $query->execute($parameters) )
		{
			$r["SUCCESS"] = true;
		}

		return $r;
	}

	public function rand_string( $length ) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str ="";
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) 
		{
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}

		return $str;
	}
}	

