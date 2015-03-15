<?php
class MDBase extends PDO {


    private $engine = 'mysql';

    // LOCAL
    private $dbName = 'Slave' ;
    private $dbHost = 'localhost' ;
    private $dbUsername;
    private $dbUserPassword;
    private $cont  = null;
//*/
    public function __construct($user, $pass){
        $dns = $this->engine.':dbname='.$this->dbName.";host=".$this->dbHost;
        $this->dbUsername=$user;
        $this->dbUserPassword= $pass;
        try{
          parent::__construct( $dns, $this->dbUsername, $this->dbUserPassword );
        }
        catch(PDOException $e){
          header("Location: ../index.php?Error=1");
        }
    }

    public function connect()
    {
        // One connection through whole application
        if ( null == $this->cont )
        {
            try
            {
              $this->cont =  new PDO( "mysql:host=".$this->dbHost.";"."dbname=".$this->dbName, $this->dbUsername, $this->dbUserPassword);
            }
            catch(PDOException $e)
            {
                header("Location: ../index.php?Error=1");
            }
        }
        session_start();
        $_SESSION['USER']=$this->dbUsername;
        $_SESSION['PASS']=$this->dbUserPassword;
        return $this->cont;
    }


    public function getAllPlayers()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM PLAYER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllItems()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM ITEM";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

    public function getAllItem_families()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM ITEM_FAMILY";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

    public function getAllFighters()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM FIGHTER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllFacilities()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM FACILITY";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllFacilities_families()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM FACILITYFAMILY";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllCenters()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM CENTER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllClubs()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM CLUB";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllCompetitions()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM COMPETITION";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

    public function getAllNewspapers()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM NEWSPAPER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllRaces()
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM RACE";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

}
?>
