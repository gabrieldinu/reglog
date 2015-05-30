<?php
//PDO for connecting to the mysql database.

class DB {
    
    private static $instant = null;
    private $host ='localhost';
    private $username='root';
    private $password='120287';
    private $db='social';    
    private $pdo;
    private $query;
    public  $error = false;
    public  $result;
    public  $affected_rows = 0;
    //we use salt to concatenate the password with the string below and get an md5 hash from the resulting string.
    private $salt='uj}7yZ%u.xG/N<U=&E@=2Ra!|b%q+;1]+lh&s9Fa_$X47]';   
    
    private function __construct(){
        try { 
            $this->pdo=new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->username,$this->password,
                                array(PDO::ATTR_PERSISTENT => true));
        }catch (PDOException $e){
            die($e->getMessage());
            }
    }
    
    public static function connect()
    {
        if(!isset(self::$instant)){
            self::$instant=new DB();
        }
        return self::$instant;
    }
    
    //using a function to easily bind values
    public function query($sql,$parameters=array()){
        $this->error = false;
        if($this->query = $this->pdo->prepare($sql)){
            $x=1;
            if(count($parameters)){
                foreach ($parameters as $p) {
                    $this->query->bindValue($x, $p);
                    $x++;
                }
            }
            if($this->query->execute()){
                $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
                $this->affected_rows = $this->query->rowCount();            
            }else{
                $this->error = true;
            }
        }
        return $this;
    }
    
    public function hashit($password) {
        return md5($password . $this->salt);        
    }
    
    public static function close(){
        self::$instant = null;
        $this->pdo = null;
    }
}

