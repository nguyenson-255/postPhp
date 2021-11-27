<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    public function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    public function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }


    public function createPost($table, $food, $address, $description, $owner)
    {
        $food = $this->prepareData($food);
        $address = $this->prepareData($address);
        $description = $this->prepareData($description);
        $owner = $this->prepareData($owner);
        
        $this->sql =
            "INSERT INTO " . $table . " (food, address, description, owner) VALUES ('" . $food . "','" . $address . "','" . $description . "','" . $owner . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
    

}
?>
