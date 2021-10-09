<?php
session_start();
//Create Constants to Store Non Repeating Value
define('SITEURL', 'http://127.0.0.1/test/');
define('LOCALHOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error());;
$db_select = mysqli_select_db($conn, DB_NAME);
//$res = mysqli_query($conn,$sql) or die(mysqli_error()); 


class DB_con
{
    function __construct()
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, DB_NAME);
        if (mysqli_connect_errno()) {
            echo "Faild to connect to mySQL :" . mysqli_connect_error();
        }
    }

    public function select_cardscan() //SELECT DISTINCT (EmployeeID) FROM cardscan 
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM cardscan");
        
        return $result;
    }

    public function select_cardscan_DISTINCT() //SELECT DISTINCT (EmployeeID) FROM cardscan 
    {
        $result = mysqli_query($this->dbcon, "SELECT DISTINCT(EmployeeID) FROM cardscan");
        
        return $result;
    }
    public function select_workschedule()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM workschedule");
        return $result;
    }
    public function select_join_table($value)
    {
        $result = mysqli_query($this->dbcon, "SELECT distinct T1.EmployeeID,T1.Clock,T2.BeginTime,T2.EndTime,T2.WorkDate  FROM cardscan T1 LEFT JOIN workschedule T2 ON T2.EmployeeID = T1.EmployeeID  WHERE T1.EmployeeID = '$value'" );
        return $result;
    }

    public function select_join_table1()
    {
        $result = mysqli_query($this->dbcon, "SELECT distinct T1.EmployeeID,T1.Clock,T2.BeginTime,T2.EndTime,T2.WorkDate  FROM cardscan T1 LEFT JOIN workschedule T2 ON T2.EmployeeID = T1.EmployeeID" );
        return $result;
    }

    public function insert_pic($path,$picname)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO fruit (pic_path, name)VALUES($path,picname) " );
        return $result;
    }
 

}