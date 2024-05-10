<?php
	function dbconnect()
	{
		$con = mysqli_connect('localhost', 'root', '', 'ommsculpture');
		return $con;
	}
	
	/*
`	function dbclose($c)
	{
		mysqli_close($c);
	}
	*/

	function secured($connection, $field_name)
	{
		return mysqli_real_escape_string($connection, $_POST[$field_name]);
	}
	
	function redirect($url, $get =null)
	{
		header("location:$url ?$get");
	}
	
	function insert($table, $fields, $values)
	{
		$field ='';
		foreach ($fields as $f) 
		{
			$field.="`$f` ,";
		}
		$field1 =rtrim($field, ",");

		$value ='';
		foreach ($values as $v) 
		{
			$value.="'$f',";
		}
		$value1 =rtrim($value, ",");

		$query ="insert into $table($field1) values($value1)";
		$c = dbconnect();
		mysqli_query($c, $query);
		dbclose();
		return 1;
	}
	
	function update($table, $fields, $id)
	{
		$q ='';
		foreach ($fields as $f => $v) 
		{
			$q.="`$f` ='$v' ,";
		}
		$q =rtrim($q, ",");
		$query ="update $table set $q where PAD_PACD=$id";
		$c =dbconnect();
		mysqli_query($c, $query);
		dbclose($c);
		return 2;
	}

	function insertphoto($photo, $oldphoto)
	{
		if($photo['size'] > 0)
		{
			if($oldphoto != NULL ||$oldphoto == NULL)
			{
				$name =$photo['name'];
				$tmp_name =$photo['tmp_name'];
				$a_type =$photo['type'];
				$a_size =$photo['size'];
				$path ='uploadimage/';
				$filename =$name;
				if( $a_type =='image/jpeg' ||$a_type =='image/jpg'||$a_type =='image/png'||$a_type =='image/gif' ||$a_type=='application/pdf' ||$a_type=='application/msword'||$a_type=='application/doc')
				{
					if($a_size <= 1048576)
					{
						if($oldphoto != NULL )
						{
							unlink($path.$oldphoto);
						}
						move_uploaded_file($tmp_name, $path.$filename);
						return $filename;
					}
					else
					{
						return $msg ='File size maximum 1Mb';
					}
				}
				else
				{
					return $msg ='Upload image in jpeg, jpg, png and gif format';
				}
			}
			else
			{
				return $oldphoto;
			}
		}
		else
		{
			return $oldphoto;
		}
	}

	function insertFiles($photo, $oldphoto)
	{
		if($photo['size'] > 0)
		{
			if($oldphoto != NULL ||$oldphoto == NULL)
			{
				$name =$photo['name'];
				$tmp_name =$photo['tmp_name'];
				$a_type =$photo['type'];
				$a_size =$photo['size'];
				$path ='uploadimage/';
				$filename =$name;
				if($a_type=='application/pdf' ||$a_type=='application/msword'||$a_type=='application/doc')
				{
					unlink($path.$oldphoto);
					move_uploaded_file($tmp_name, $path.$filename);
					return $filename;

				}
				else
				{
					return $msg ='Upload files in pdf and docs format';
				}
			}
			else
			{
				return $oldphoto;
			}
		}
		else
		{
			return $oldphoto;
		}
	}
	
	function insertImage($photo)
	{
		if($photo !=null)
		{
			$name =$photo['name'];
			$tmp_name =$photo['tmp_name'];
			$a_type =$photo['type'];
			$a_size =$photo['size'];
			$path ='uploadimage/';
			$filename =$name;
			if( $a_type =='image/jpeg' ||$a_type =='image/jpg'||$a_type =='image/png'||$a_type =='image/gif')
			{
				if($a_size <= 1024)
				{
					unlink($path.$oldphoto);
					move_uploaded_file($tmp_name, $path.$filename);
					return $filename;
				}
				else
				{
					return $msg ='File size maximum 2Mb';
				}
			}
			else
			{
				return $msg ='Upload image in jpeg, jpg, png and gif format';
			}
		}
	}

	function updatephoto($photo, $oldphoto)
	{
		if($photo !='')
		{
			if($oldphoto != NULL)
			{
				$name =$photo['name'];
				$tmp_name =$photo['tmp_name'];
				$a_type =$photo['type'];
				$a_size =$photo['size'];
				$path ='uploadimage/';
				$filename =$name;
				if( $a_type =='image/jpeg' ||$a_type =='image/jpg'||$a_type =='image/png'||$a_type =='image/gif')
				{
					if($a_size <= 2048)
					{
						unlink($path.$oldphoto);
						move_uploaded_file($tmp_name, $path.$filename);
						return $filename;

					}
					else
					{
						return $msg ='File size maximum 2Mb';
					}
				}
				else
				{
					return $msg ='Upload image in jpeg, jpg, png and gif format';
				}
			}
			else
			{
				return $oldphoto;
			}
		}
	}
	
	/*
	function getdata($table, $id=null)
	{
		$row =array();
		if($id ==null)
		{
			$q ="select * from $table";
		}
		else
		{
			$q ="select * from $table where id=$id";
		}
		$con =dbconnect();
		$query =mysqli_query($con, $q);
		while($ro =mysqli_fetch_assoc($query))
		{
			$row[] =$ro;
		}
		return $row;
	}
	*/
	
	function limit_text($text, $limit) 
	{
		if (str_word_count($text, 0) > $limit) 
		{
			$words = str_word_count($text, 2);
			$pos   = array_keys($words);
			$text  = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}
?>