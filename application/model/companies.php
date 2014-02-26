<?php

class model_companies
{
    public function __construct($config)
    {
            $txt = 'model_companies_mappers_'.$config['mapper']['companies'].'_companies';
            $this->mapper = new $txt($config['database']);
    }
    
    function loadCompaniesData()
    {
        return $this->mapper->loadCompaniesData();
    }
    
    function loadCompany($idcompany)
    {
        return $this->mapper->loadCompany($idcompany);
    }
    
    function deleteCompany($idcompany)
    {
        return $this->mapper->deleteCompany($idcompany);
    }
    
    function insert($tablename, $data, $id, $config)
    {
        return $this->mapper->insert($tablename, $data, $id, $config);
    }
    
    function update($tablename, $data, $id, $config)
    {
        return $this->mapper->update($tablename, $data, $id, $config);
    }
    
    function getCompanies($tablename)
    {
    	return $this->mapper->selectAll($tablename);
	}
}