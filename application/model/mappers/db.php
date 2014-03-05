<?php

class model_mappers_db 
{
	private $config;
	public $link;
	public $linkW;
	public function __construct($config)
	{
		$this->config = $config;
		$this->linkR = $_SESSION['register']['linkR'];
		$this->linkW = $_SESSION['register']['linkW'];	
	}
		
	function findFields($tablename, $data)
	{
		$sql = "DESCRIBE ".$tablename;
		$result=mysqli_query($this->linkR, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$fields[]=$row['Field'];
			if($row['Key']=='PRI')
				$pkey = $row['Field'];
		}
		
		foreach($data as $key => $value)
		{
			if (!in_array($key, $fields))
				unset($data[$key]);
		}
		unset($data[$pkey]);
		return array($pkey, $data);
	}
	
	function update($tablename, $data, $id)
	{
		$fields= $this->findFields($tablename, $data);
		$sql = "UPDATE ".$tablename." SET " ;
		foreach($fields[1] as $key => $value)
		{
			$sql.=$key."='".$value."',";
		}
		$sql=substr($sql, 0, strlen($sql)-1);
		$sql.=" WHERE ".$fields[0].' = '.$id;
		
		$result=mysqli_query($this->linkW, $sql);
		return $result;	
	}
	
	function insert($tablename, $data)
	{
		$fields=  $this->findFields($tablename, $data);
		$sql = "INSERT INTO ".$tablename." SET " ;	
		foreach($fields[1] as $key => $value)
		{
			$sql.=$key."='".$value."',";
		}
		$sql=substr($sql, 0, strlen($sql)-1);
		$result=mysqli_query($this->linkW, $sql);
		return $result;
	}
	
	function selectAll($tablename)
	{
		$sql = "SELECT * FROM " .$tablename;
		$result = mysqli_query($this->linkR, $sql);
	
		while ($row = mysqli_fetch_assoc($result))
		{
			$rows[] = $row;
		}
		if (isset($rows)) return $rows;
		else
			return null;
	}
	
	/**
	 * findPkDesc: retrieve values and descriptions from a table to fill select form options
	 *
	 * @param string $tablename
	 * @param string $pkField
	 * @param string $descField
	 *
	 * @return array $pk_desc
	 */
	public function findPkDesc($tablename, $pkField, $descField)
	{
		$sql = "SELECT ".$pkField.", ".$descField.
		" FROM ".$tablename;
	
		$result = mysqli_query($this->linkR, $sql);
		while ($row = mysqli_fetch_array($result))
		{
			$rows[] = $row;
		}
	
		return $rows;
	}
	
	public function delete($tablename, $id)
	{
		$fields= $this->findFields($tablename, array());
		$sql = "DELETE FROM ".$tablename;
		$sql.= " WHERE ".$fields[0].' = '.$id;
	
		$result=mysqli_query($this->linkW, $sql);
		return $result;
	}
}