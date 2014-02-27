<?php

class model_users implements model_usersInterface
{
	public function __construct($config)
	{
		$txt = 'model_users_mappers_'.$config['mapper']['users'].'_users';
		$this->mapper = new $txt($config['database']);
	}
	
	public function getUsers()
	{
		return $this->mapper->getUsers();				
	}
	
	public function getUser($iduser)
	{
		return $this->mapper->getUser($iduser);
	}
	
	public function getCredential($email, $password)
	{
		return $this->mapper->getCredential($email, $password);
	}
	
	
	public function deleteUser($iduser)
	{
		return $this->mapper->delete('users', $iduser);
	}	

	public function insertUser($tablename,$data)
	{
		$photo_name = model_uploadFiles::renameFile($_FILES['photo']['name'],
				$_SERVER['DOCUMENT_ROOT']."/uploads");
		$destino = $_SERVER['DOCUMENT_ROOT']."/uploads";
		if(isset($photo_name)&&$photo_name!=='')
			$data['photo']= $photo_name;
		model_uploadFiles::uploadFile($photo_name, $destino, $_FILES['photo']);
			
		if(isset($data['password']))
			$data['password']=sha1($data['password']);
		return $this->mapper->insert($tablename, $data, $id);
	}
	
	public function updateUser($tablename, $data, $id)
	{
		if(isset($data['password']))
			$data['password']=sha1($data['password']);
		return $this->mapper->update($tablename, $data, $id);
	}	
	
}