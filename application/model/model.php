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
		$sql = " SELECT p.*, group_concat(u.file_name) as img_file FROM product p LEFT JOIN upload_data u ON p.code_product = u.prod_id WHERE p.shows = '1' GROUP BY p.id order by p.code_product ";
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
			$this->sendmailcontact($pos);

			$r["SUCCESS"] = true;
		}

		return $r;
	}

	public function sendmailcontact($pos)
	{
		$mail = new mail();
	   
	    $to_name = "administrator";
	    $to_email = "oom34299@gmail.com"; //$email;//"fon_0151@hotmail.com"; //
	    $sender_name = "alert@eityeight.com";
	    $sender_email = "alert@eityeight.com"; 
	    $sender_pass = "Ycg137g?";
	    // dev@eityeight.com
	   	// Tv13z$a7

	    $body_html = "";
	    $body_html .= "Contact Us Alert ";
	    $body_html .= "<br/>Name :".$pos["userName"];
		$body_html .= "<br/>Email : ".$pos["email"];
		$body_html .= "<br/>Subject : ".$pos["subject"];
		$body_html .= "<br/>Message : ".$pos["message"];
	
	    $subject = "Contact Us Alert";

	    $mail->to_name = $to_name;
	    $mail->to_email = $to_email;
	    $mail->subject = $subject;
	    $mail->body_html = $body_html; 
	    $mail->body_text  = "";
	    
	    //echo $body_html;
	  
	    $mail->send();
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
		$r = array(
			"FAKE" => true,
			"DUP" => false
		);

		$sql = "SELECT count(ps.code_product) as ctn, p.name_eng as name, ps.id as cid, ps.dupflag FROM product_serials ps, product p WHERE p.id = ps.code_product AND ps.code_serial= :serials "; 
		$query = $this->db->prepare($sql);

		$parameters = array(
			":serials" => $pos["pdata"]
		);

		$query->execute($parameters);
		$chk = $query->fetch(PDO::FETCH_ASSOC);

		if( $chk["dupflag"] > 4 )
		{
			$r["DUP"] = true;
			$r["FAKE"] = false;
		}
		elseif( $chk["ctn"] > 0 )
		{
			$r["FAKE"] = false;
			$r["PRODNAME"]  = $chk["name"];

			$sql = " UPDATE product_serials SET dupflag = '".($chk["dupflag"]+1)."' WHERE id='".$chk["cid"]."' ";
			$query = $this->db->prepare($sql);
			$query->execute($parameters);
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
		$sql = " SELECT p.*, group_concat(u.file_name) AS img_file, (SELECT group_concat(cp.name_eng) FROM color_select c, color_product cp WHERE c.code_color = cp.id AND c.prod_id = p.id) AS color_name_eng, (SELECT group_concat(cp.name_th) FROM color_select c, color_product cp WHERE c.code_color = cp.id AND c.prod_id = p.id) AS color_name_th  FROM product p LEFT JOIN upload_data u ON p.code_product = u.prod_id WHERE p.shows = '1' AND prod_id = :prod_id GROUP BY p.id ";
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




	public function chkLogin($param)
    {
		$Login = array();

        $sql = " SELECT * FROM users WHERE username=:uname AND password=:upass LIMIT 1 ";
        $query = $this->db->prepare($sql);
        $parameters = array(
			':uname' => $param["uname"],
			':upass' => md5($param["upass"])
		);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
		$count = $query->rowCount();

		if( $count > 0 )
		{
			$Login = $query->fetch(PDO::FETCH_ASSOC);
			$Login["count"] = $count;

			$_SESSION['EELOGINS'] = 1;
			$_SESSION['EELOGININFO'] = $Login;
			$_SESSION['EEUSERNAME'] = $Login['username'] . ' ' . $Login['lastname'];
		}

		return $Login;
    }

	public function getProductList()
	{
		$sql = " SELECT * FROM product ";
        $query = $this->db->prepare($sql);

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getProductDetail($code)
	{
		$sql = " SELECT GROUP_CONCAT(u.file_name) as files , p.*
					FROM product p left join upload_data u on prod_id = p.code_product
					WHERE p.code_product = :code  ";
        $query = $this->db->prepare($sql);
		$parameters = array(
			':code' => $code
		);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function generateProductCode($id, $stocks)
	{
		$sql = " DELETE FROM product_serials WHERE code_product = '".$id."' ";
		$query = $this->db->prepare($sql);
		$query->execute();

		$max = $stocks;
		$i = 1;
		$chuck = ceil($max / 20);
		$vsql = '';

		while( $i <= $max )
		{
			$code = md5($i.$id);
			$code = substr($code, 0, 13);
			
			$vsql .= "( '".$id."', '".$code."' ),";

			if( ($i % $chuck) == 0 || $i == $max )
			{
				$sql = 'INSERT INTO product_serials( code_product, code_serial ) VALUES ';
				$strSQL = $sql . substr($vsql, 0, -1);
				$query = $this->db->prepare($strSQL);
				$query->execute();
				$vsql = '';
			}
			
			$i++;
		}

		/*
		$handle = fopen('gencode.sql','w');
		fwrite($handle, $sql);
		fclose($handle);

		echo $command = "mysql -u ".DB_USER." -p ".DB_PASS." ".DB_NAME." < gencode.sql ";

		exec($command);
		*/
	}
	
	public function deleteGenProduct($param)
	{
		$res = array();
		$sql = " DELETE FROM product_serials WHERE code_product = '".$param["id"]."' ";
		$query = $this->db->prepare($sql);
		
		if( $query->execute() )
		{
			/*
			$sql = " UPDATE product SET stocks = '0' WHERE code_product = '".$param["code"]."' ";
			$query = $this->db->prepare($sql);
			
			$query->execute();
			*/
			$res["SUCCESS"] = true;
		}
		else
		{
			$res["SUCCESS"] = false;
		}

		return $res;
	}

	public function getProductGenCode($id)
	{
		$sql = " SELECT * FROM product WHERE id = :id ";
        $query = $this->db->prepare($sql);
		$parameters = array(
			':id' => $id
		);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function checkSerialCode($id)
	{
		ini_set('memory_limit', '750M');
		$sql = " SELECT * FROM product_serials WHERE code_product = :id ";
        $query = $this->db->prepare($sql);
		$parameters = array(
			':id' => $id
		);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function contSerial($code)
	{
		$sql = " SELECT count(id) as cnt FROM product_serials WHERE code_product = :code ";
        $query = $this->db->prepare($sql);
		$parameters = array(
			':code' => $code
		);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function newProduct($param)
	{
		$res = array();

		$sql = " INSERT INTO product( code_product, name_th, name_eng, weights, costs, stocks, details, detail_th, timep, types) VALUES( :code_product, :name_th, :name_eng, :weights, :costs, :stocks, :details, :detail_th, :timep, '001')";
        $query = $this->db->prepare($sql);

		$code = $this->genCode("prod");

        $parameters = array(
			':code_product' => $code,
			':name_th' => $param["txtname_th"],
			':name_eng' => $param["txtname_eng"],
			':weights' => $param["txtweights"],
			':costs' => $param["txtcosts"],
			':stocks' => $param["txtstocks"],
			':details' => $param["txtdetails"],
			':detail_th' => $param["txtdetail_th"],
			':timep' => date("d-M-y H.i.s")
		);

		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        if( $query->execute($parameters) )
		{
			$sql = " SELECT id FROM product WHERE code_product = :code ";
			$query = $this->db->prepare($sql);
			$parameters = array( ':code' => $code );
			$query->execute($parameters);
			$prod = $query->fetch(PDO::FETCH_ASSOC);
			
			foreach( $param["fcontent"] as $cont )
			{
				$sql = " INSERT INTO upload_data( file_name, times, prod_id, name_title) VALUES( :file_name, :times, :prod_id, :name_title )";
				$query = $this->db->prepare($sql);
				$parameters = array(
					':file_name' => $cont,
					':times' => date("d-M-y H.i.s"),
					':prod_id' => $code,
					':name_title' => $param["txtname_eng"]
				);
				
				$query->execute($parameters);
			}

			$res["SUCCESS"] = true;
			$res["code"] = $code;
		}
		else
		{
			$res["SUCCESS"] = false;
		}

		return $res;
	}

	public function updateProduct($param)
	{
		$res = array();
		$parameters = array();
		$select = array();
	
		$column = $this->getTbColumn('product');

		foreach( $column as $col )
		{
			if( isset($param[$col]) )
			{
				$parameters[':'.$col] = $param[$col];
				$select[] = $col . ' = :'.$col; 
			}
		}

		$sql = " UPDATE product SET ".implode(',', $select)." WHERE code_product = :code_product ";
		$parameters[':code_product'] = $param["code"];

		if( !empty($select) )
		{
			$query = $this->db->prepare($sql);

			if( $query->execute($parameters) )
			{
				if( !empty($param["fcontent"]) )
				{
					$sql = " DELETE FROM upload_data WHERE prod_id = :id ";
					$query = $this->db->prepare($sql);
					$parameters = array( ':id' => $param["code"] );
					$query->execute($parameters);
					
					foreach( $param["fcontent"] as $cont )
					{
						$sql = " INSERT INTO upload_data( file_name, times, prod_id, name_title) VALUES( :file_name, :times, :prod_id, :name_title )";
						$query = $this->db->prepare($sql);
						$parameters = array(
							':file_name' => $cont,
							':times' => date("d-M-y H.i.s"),
							':prod_id' => $param["code"],
							':name_title' => $param["txtname_eng"]
						);
						
						$query->execute($parameters);
					}
				}

				$res["SUCCESS"] = true;
				$res["code"] = $param["code"];
			}
			else
			{
				$res["SUCCESS"] = false;
			}
		}

		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

		return $res;
	}

	public function getTbColumn($tb)
	{
		$column_names = array();

		$sql = 'SHOW COLUMNS FROM product';
		$query = $this->db->prepare($sql);

		try 
		{    
            if( $query->execute() )
			{
                $raw_column_data = $query->fetchAll();
                
                foreach($raw_column_data as $outer_key => $array)
				{
                    foreach($array as $inner_key => $value)
					{
						if ($inner_key === 'Field')
						{
							if (!(int)$inner_key)
							{
								$column_names[] = $value;
							}
						}
                    }
                }        
            }

			return $column_names;
        } 
		catch (Exception $e)
		{
			return $e->getMessage(); //return exception
        }  
	}
	
	public function deleteProduct($param)
	{
		$res = array();
		
		$sql = " SELECT code_product FROM product WHERE id = :id ";
		$query = $this->db->prepare($sql);
		$parameters = array( ":id" => $param["id"] );
		$query->execute($parameters);
		$prod = $query->fetch(PDO::FETCH_ASSOC);

		$sql = 'DELETE FROM product WHERE id = :id ';

		$query = $this->db->prepare($sql);
		$parameters = array( ":id" => $param["id"] );
        
		if( $query->execute($parameters) )
		{
			$sql = " SELECT GROUP_CONCAT(file_name) as file_name FROM upload_data WHERE prod_id = :id ";
			$query = $this->db->prepare($sql);
			$parameters = array( ":id" => $prod["code_product"] );
			$query->execute($parameters);
			$file = $query->fetch(PDO::FETCH_ASSOC);

			$sql = 'DELETE FROM upload_data WHERE prod_id = :id ';
			$query = $this->db->prepare($sql);
			$parameters = array( ":id" => $prod["code_product"] );
			$query->execute($parameters);
			
			if( isset($file["file_name"]) && !empty($file["file_name"]) )
			{
				$file = explode(",", $file["file_name"]);
				foreach( $file as $i => $f )
				{
					if( file_exists('../../images/upload/' . $f) )
					{
						unlink('../../images/upload/' . $f);
					}
				}
			}

			$res["SUCCESS"] = true;
		}
		else
		{
			$res["SUCCESS"] = false;
		}

		return $res;
	}

	public function genCode($t)
	{
		switch($t)
		{
			case 'prod' : $table = 'product';  break;
		}
	
		$sql = 'SELECT MAX(code_'.$table.') as id FROM '.$table;

		$query = $this->db->prepare($sql);
		$query->execute();
        
		$tb = $query->fetch();
		if( $tb )
		{
			if( !empty($tb->id) )
			{
				$last = (int)$tb->id;
			}
		}

		$code = str_pad(($last+1),3,"0",STR_PAD_LEFT);


		return $code;
	}




}	

