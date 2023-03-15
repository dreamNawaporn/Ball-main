<?php
class Player{
    private $ConDB;
    public function __construct(){
        $con = new ConDB();
        $con->connect();
        $this->ConDB = $con->conn;
    }

    // public function getPlayer($position)
    // {
    //     $sql = "SELECT * FROM playerlist where cs_position = ".$position;
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    public function getPlayer()
    {
        $sql = "SELECT * FROM playerlist";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return false;
        }
    }

     public function getPlayerDetail($identifier)
    {
        $sql = "SELECT * FROM playerlist where identifier = ".$identifier;
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return false;
        }
    }

    // public function getPlayerposition($position)
    // {
    //     $sql = "SELECT * FROM playerlist where cs_position = ".$position;
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }




    // public function getPlayerPro($pro_id)
    // {
    //     $sql = "SELECT * FROM agency WHERE `agency_pro_id` = '". $pro_id ."'";
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    // public function getAgencyID($a_id)
    // {
    //     $sql = "SELECT * FROM agency where agency_id=".$a_id;
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetch(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    public function addPlayer($data_Player)
    {
        $sql = "INSERT INTO `playerlist` (`identifier`, `first_name`, `last_name`, `team`, `position`, `image`)";
        $sql .= " VALUES ('', :first_name, :last_name, :team, :position , :image );";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute($data_Player)){
            return true;
        }else {
            return false;
        }
    }

    // public function registerPlayer($data_register_Player)
    // {
    //     $sql = "INSERT INTO `sci_re` (`re_id`, `re_email`, `re_prefix`, `re_name`, `re_phonenumber`, `re_IDnumber`, `re_educational`)";
    //     $sql .= " VALUES ('', :re_email, :re_prefix, :re_name, :re_phonenumber , :re_IDnumber , :re_educational);";
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute($data_register_Player)){
    //         return true;
    //     }else {
    //         return false;
    //     }
    // }

    public function delPlayer($identifier)
    {
        $sql = "DELETE FROM `playerlist` WHERE `identifier`='".$identifier."'";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function editPlayereditPlayer($identifier, 
    $first_name,
    $last_name,
    $team,
    $position,
    $image)
    {
        $sql = "UPDATE playerlist SET first_name='$first_name',
        last_name='$last_name',
        team='$team',
        position='$position',
        image='$image'
        WHERE identifier='$identifier'";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
        mysqli_close($this->ConDB);
    }


/********* */
    
    public function getPlayerJsonDB()
    {
        $sql = "SELECT * FROM playerlist";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            $obj = json_encode($result);//แปลงค่า $result ให้เป็นค่า json แล้วเก็บไว้ในตัวแปร $obj
            return ($obj); //ส่งค่าข้อมูลในรูปแบบ json กลับคืน

        }else {
            return false;
        }
    }
}
/************** */
?>

 