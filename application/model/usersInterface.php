<?php

interface model_usersInterface
{
	public function getUsers();
	public function getUser($iduser);
	public function insertUser($tablename,$data);
	public function updateUser($tablename, $data, $id);
	public function deleteUser($iduser);
		
}