<?php
class Database{
    private $con;
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $db = "proyectofinal";

    public function __construct()
    {
        $this->connect_db();
    }

    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser,$this->dbpass,$this->db);
        if (mysqli_connect_error()){
            die("Fallo en la conexion".mysqli_connect_error().mysqli_connect_errno());
        }
    }
    
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }

    public function create($NickName,$Email,$Age){
        $sql = "INSERT INTO `gamesonline` (NickName,Email,Age) values ('$NickName','$Email','$Age')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        } else {
            return false;
        }
    }

    public function read(){
        $sql ="SELECT * FROM gamesonline";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
    public function single_record($Id){
        $sql = "SELECT * FROM gamesonline where Id='$Id'";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res );
        return $return ;
        }
    public function update($NickName,$Email,$Age,$Id){
        $sql = "UPDATE gamesonline SET NickName='$NickName', Email='$Email', Age='$Age' WHERE id=$Id";
        $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
                }else{
                return false;
                }
            }
    public function delete($id){
        $sql = "DELETE FROM gamesonline WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
            if($res){
            return true;
            }else{
            return false;
            }
        }
}
