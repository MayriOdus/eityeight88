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
			$sess_user = $_SESSION["authen_session"];
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
		$sess_user = $_SESSION['authen_session'];

		$sql = " SELECT p.code_product, p.name_th, p.name_eng, p.costs, p.sale_cost, c.*, (SELECT file_name FROM upload_data WHERE prod_id = p.code_product LIMIT 1 ) as img FROM product p, compare c WHERE p.id = c.id_product AND c.cokie = :sess ";

		$query = $this->db->prepare($sql);

		$parameters = array(
			":sess" => $sess_user
		);
		 // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		$query->execute($parameters);

		return $basket = $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getmember_contact()
	{
		$id = $_SESSION["member_ns"];

		$sql = " SELECT u.*, c.tele, c.address FROM users u , contact_user c WHERE u.id_user = c.id_user AND u.id = :id  ";

		$query = $this->db->prepare($sql);

		$parameters = array(
			":id" => $id
		);
		 // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		$query->execute($parameters);

		return $basket = $query->fetch(PDO::FETCH_ASSOC);
	}

	public function getpaymentid()
	{
		$sql = " SELECT COUNT(id) as cnt FROM buyer ";
		$query = $this->db->prepare($sql);

		 // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		$query->execute();
		$pid = $query->fetch(PDO::FETCH_ASSOC);

		return date("dmyis") . ( $pid["cnt"] + 1 );
	}

	public function addpayment($pos)
	{
		$r = array("SUCCESS" => false);

		$sess_user = $_SESSION['authen_session'];

		$sql =" UPDATE compare SET chk_pay = :payid WHERE cokie = :sess ";
		$query = $this->db->prepare($sql);

		$parameters = array(
			":payid" => $pos["input-idpost"],
			":sess" => $sess_user
		);

		if( $query->execute($parameters) )
		{
			$sql = " INSERT INTO buyer(cokie,id_pay,namep,lname,addressp,telep,email,img,timep,cost) VALUES(:sess, :payid, :name, :lastname, :address, :tel, :email, :image, :timep, :cost);";
			$query = $this->db->prepare($sql);

			$parameters = array(
				":payid" => $pos["input-idpost"],
				":sess" => $sess_user,
				":name" => $pos["userName"],
				":lastname" => $pos["lname"],
				":address" => $pos["input-add"],
				":tel" => $pos["userTele"],
				":email" => $pos["userEmail"],
				":image" => $pos["img_payment"],
				":timep" => date('d-M-y h.i.s'),
				":cost" => $pos["input-val"]
			);

			if( $query->execute($parameters) )
			{
				unset($_SESSION['authen_session']);

				$r["SUCCESS"] = true;
			}
		}

		return $r;
	}

	public function addcontactmessage($pos)
	{
		$r = array("SUCCESS" => false);

		$sql = " INSERT INTO custo_contact(nameu,email,subject,Message,timep) VALUES(:name, :email, :subject, :message, :timepost) ";
		$query = $this->db->prepare($sql);

		$timepost =  date('d-M-y h.i.s');
		$parameters = array(
			":name" => $pos["userName"],
			":email" => $pos["email"],
			":subject" => $pos["subject"],
			":message" => $pos["message"],
			":timepost" => $timepost
		);

		if( $query->execute($parameters) )
		{
			$r["SUCCESS"] = true;
		}

		return $r;
	}

	public function getpaymentbill($payid)
	{
		$sql = " SELECT  c.*, p.costs, p.sale_cost, p.code_product FROM compare c, product p WHERE c.id_product = p.id AND c.chk_pay = :payid ";
		$query = $this->db->prepare($sql);

		$parameters = array(
			":payid" => $payid
		);

		$query->execute($parameters);

		return $product = $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function chk_serial($pos)
	{
		$r = array("FAKE" => true);

		$sql = "SELECT count(ps.code_product) as ctn, p.name_eng as name FROM product_serials ps, product p WHERE p.id = ps.code_product AND ps.code_product= :id and ps.code_serial= :serials "; 
		$query = $this->db->prepare($sql);

		$parameters = array(
			":id" => $pos["pid"],
			":serials" => $pos["pdata"]
		);

		$query->execute($parameters);
		$chk = $query->fetch(PDO::FETCH_ASSOC);

		if( $chk["ctn"] > 0 )
		{
			$r["FAKE"] = false;
			$r["PRODNAME"]  = $chk["name"];
		}

		return $r;
	}

	public function chk_serial_all($pos)
	{
		$r = array("FAKE" => true);

		$sql = "SELECT count(ps.code_product) as ctn, p.name_eng as name FROM product_serials ps, product p WHERE p.id = ps.code_product AND ps.code_serial= :serials "; 
		$query = $this->db->prepare($sql);

		$parameters = array(
			":serials" => $pos["pdata"]
		);

		$query->execute($parameters);
		$chk = $query->fetch(PDO::FETCH_ASSOC);

		if( $chk["ctn"] > 0 )
		{
			$r["FAKE"] = false;
			$r["PRODNAME"]  = $chk["name"];
		}

		return $r;
	}

	public function getbanner($page)
	{
		$sql = " SELECT img FROM banners WHERE descript = :page ";
		$query = $this->db->prepare($sql);

		$parameters = array(
			":page" => $page
		);

		$query->execute($parameters);
		
		return $img = $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getaboutus()
	{
		$sel = ($_SESSION["Lang"] == "en")? "txt1" : "txt2";
		$sql = " SELECT ".$sel." as txt FROM about WHERE id = '1' ";
		$query = $this->db->prepare($sql);

		$query->execute();
		$txtabout = $query->fetch(PDO::FETCH_ASSOC);

		return $txtabout["txt"];
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
		$sql = " SELECT * FROM buyer WHERE namep = :cid ";
        $query = $this->db->prepare($sql);
		
		$parameters = array(
			":cid" => $_SESSION["member_name"]
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

