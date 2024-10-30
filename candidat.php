<?php
require_once("Mysql.php");
class Candidat extends Mysql
{
    private $id;
    private $job_id;
    private $candidat;
    private $contenu;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function getJobId()
    {
        return $this->job_id;
    }

    public function setJobId(int $job_id)
    {
        $this->job_id = $job_id;

    }

    public function getCandidat()
    {
        return $this->candidat;
    }

    public function setCandidat(string $candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }
    
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from candidat");
    $les_candidats = $res->fetchAll(); 
 
        return $les_candidats;
    }
    public function ajouter()
	{	 if (!isset($this->candidat) || 
            !isset($this->contenu) ||
            !isset($this->date))
            return false;
            
	    $q = "INSERT INTO candidature (job_id, candidat, contenu ,date) 
		      VALUES 
		  	('$this->job_id' ,
			'$this->candidat'  , '$this->contenu','$this->date')";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	
    return $r;}	
	}

    public function getCandidatureDetails($id)
    {
        $conn = $this->connexion();

        $stmt = $conn->prepare("SELECT * FROM candidature WHERE id = ?");
        $stmt->execute([$id]);

        $candidature = $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        return $candidature;
    }
    public function updateCandidature($id, $candidat_name, $contenu, $job_id, $date)
{
    $conn = $this->connexion();

    $stmt = $conn->prepare("UPDATE candidature SET candidat = ?, contenu = ?, job_id = ?, date = ? WHERE id = ?");
    
    $stmt->bindParam(1, $candidat_name);
    $stmt->bindParam(2, $contenu);
    $stmt->bindParam(3, $job_id);
    $stmt->bindParam(4, $date);
    $stmt->bindParam(5, $id);

    $result = $stmt->execute();

    $conn = null;
    return $result;
}
public function deleteCandidature($id)
{
    $conn = $this->connexion();
    $stmt = $conn->prepare("DELETE FROM candidature WHERE id = ?");
    $stmt->execute([$id]);
    $affected_rows = $stmt->rowCount();
    $conn = null;
    return $affected_rows > 0;
}

}

