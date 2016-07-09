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


	public function getproducts()
	{
		$sql = " SELECT p.*, group_concat(u.file_name) as img_file FROM product p LEFT JOIN upload_data u ON p.code_product = u.prod_id WHERE p.shows = '1' GROUP BY p.id ";
		$query = $this->db->prepare($sql);

		$query->execute();

		return $product = $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function add_basket($pos)
	{
		$r = array("SUCCESS" => false);

		$pid = $pos["hidid"];
		$qty = $pos['input-qty'];
		$color_code = $pos['color_code'];

		if( !empty($qty) )
		{
			$sess_user = $_SESSION['member_id'] . date('ymd');
			$timepost =  date('d-M-y h.i.s');
			
			//echo "Save Your Compare";
			$sql = " INSERT INTO compare(id_product,cokie,qty,color_code,timepost) VALUES( :pid, :sess, :qty, :color, :timepost) "; 

			$query = $this->db->prepare($sql);

			$parameters = array(
				":pid" => $pid,
				":sess" => $sess_user,
				":qty" => $qty,
				":color" => $color_code,
				":timepost" => $timepost
			);

			if( $query->execute($parameters) )
			{
				$r["SUCCESS"] = true;
			}

		}

		return $r;
	}

	public function deletebasket($id)
	{
		$r = array("SUCCESS" => false);

		$sql = " DELETE FROM compare WHERE id = :id ";

		$query = $this->db->prepare($sql);

		$parameters = array(
			":id" => $id
		);

		if( $query->execute($parameters) )
		{
			$r["SUCCESS"] = true;
		}

		return $r;
	}

	public function getcomparebasket()
	{
		$sess_user = $_SESSION['member_id'] . date('ymd');

		$sql = " SELECT p.name_th, p.name_eng, p.costs, p.sale_cost, c.*, (SELECT file_name FROM upload_data WHERE prod_id = c.id_product LIMIT 1 ) as img FROM product p, compare c WHERE p.code_product = c.id_product AND c.cokie = :sess ";

		$query = $this->db->prepare($sql);

		$parameters = array(
			":sess" => $sess_user
		);

		$query->execute($parameters);

		return $basket = $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getproduct_detail($prod_id)
	{
		$sql = " SELECT p.*, group_concat(u.file_name) AS img_file, (SELECT group_concat(code_color) FROM color_select WHERE prod_id = p.code_product) AS color_prod  FROM product p LEFT JOIN upload_data u ON p.code_product = u.prod_id WHERE p.shows = '1' AND prod_id = :prod_id GROUP BY p.id ";
		$query = $this->db->prepare($sql);

		$parameters = array(
			":prod_id" => $prod_id
		);

		$query->execute($parameters);

		return $product = $query->fetch(PDO::FETCH_ASSOC);
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

