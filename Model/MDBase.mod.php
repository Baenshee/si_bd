<?php
class MDBase extends PDO {


    private static $engine = 'mysql';

    // OVH
    /*private static $dbName = 'laplateftifne13' ;
    private static $dbHost = 'laplateftifne13.mysql.db' ;
    private static $dbUsername = 'laplateftifne13';
    private static $dbUserPassword = 'natureC13';
    private static $cont  = null;

    /**/
    // LOCAL
    private static $dbName = 'FNESITE' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont  = null;
//*/
    public function __construct(){
        $dns = self::$engine.':dbname='.self::$dbName.";host=".self::$dbHost;
        parent::__construct( $dns, self::$dbUsername, self::$dbUserPassword );
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }


    public static function getAllPlayers()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM PLAYER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllItems()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM ITEM";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

    public static function getAllItem_families()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM ITEM_FAMILY";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

    public static function getAllFighters()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM FIGHTER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllFacilities()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM FACILITY";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllFacilities_families()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM FACILITYFAMILY";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllCenters()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM CENTER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllClubs()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM CLUB";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllCompetitions()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM COMPETITION";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

    public static function getAllNewspapers()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM NEWSPAPER";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllRaces()
    {
        $pdo = self::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM RACE";
        $qq = $pdo->prepare($query);
        $qq->execute();
        $data = $qq->fetchall();
        return $data;
    }

}
?>
