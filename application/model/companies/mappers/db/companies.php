<?php

class model_companies_mappers_db_companies extends model_mappers_db
{
    public $conection;
    
    public function __construct($config)
    {
            $this->config = $config;
            $this->conection = parent::__construct($config);		
    }

    function loadCompaniesData()
    {
        $query = "SELECT * FROM companies ORDER BY name";
        
        $result = mysqli_query($this->conection, $query);
        
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        return $rows;    
    }
    
    function loadCompany($idcompany)
    {
        $query = "SELECT * FROM companies WHERE idcompany = ".$idcompany;
        $result = mysqli_query($this->conection, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        
        return $rows[0];
    }
    
    function deleteCompany($idcompany)
    {
        $query = "DELETE FROM companies WHERE idcompany = ".$idcompany;
        $result = mysqli_query($this->conection, $query);
        return $result;
    }    
    
}

