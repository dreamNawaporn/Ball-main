<?php {
class ConDB{
    private $host,$db,$user,$pass;
    public $conn;

    public function ConDB(){
        $this->host = 'localhost';
        $this->user = 'root'; 
        $this->pass = ''; 
        $this->db = 'termfootball'; 
    }

    public function connect(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=termfootball","root","");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
} 
?>

<?php }