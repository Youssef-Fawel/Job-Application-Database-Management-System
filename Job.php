<?php
require_once("Mysql.php");
class Job extends Mysql
{
       private $id;

       private $type;

        private $company;

        private $description;

       private $expires_at;

        private $email;

    public function getIdd()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;

        }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    public function setExpiresAt($expires_at)
    {
        $this->expires_at = $expires_at;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from job");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
    $les_jobs = $res->fetchAll(); 
 
        return $les_jobs;
    }
    public function ajouter()
	{	 if (!isset($this->type) || 
	    	!isset($this->company) || 
            !isset($this->description) ||
            !isset($this->expires_at)||
            !isset($this->email))
            return false;
            
	    $q = "INSERT INTO job (type, company, description,expires_at,email) 
		      VALUES 
		  	('$this->type' ,
			'$this->company'  , '$this->description','$this->expires_at','$this->email'
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
	}



  
}
