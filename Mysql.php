<?php
class Mysql
{
	private $_serveur = "localhost";
	private $_login = "root";
	private $_mdp	= "";
	private $_bdd	= "dbjob";
	
	public function connexion(){
	try{
		$_cnx = new PDO("mysql: host=$this->_serveur; dbname=$this->_bdd", $this->_login, $this->_mdp);
	}catch (PDOException $e) {
		echo 'Échec lors de la connexion : ' . $e->getMessage();}
	return $_cnx;}

	
	//public function requete($q)
    //{
      //  try {
        //    $res = $this->_cnx->query($q);
          //  if (!$res)
            //    throw new Exception('Échec de la requête : ' . $this->_cnx->errorInfo()[2]);
            //return $res;
        //} catch (PDOException $e) {
          //  throw new Exception('Erreur PDO : ' . $e->getMessage());
      //  }
    //}
}
?>
