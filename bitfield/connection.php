<?php
class Conn
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'farmme';

    public function connect()
    {
        $connect = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
        // Check connection
        if (mysqli_connect_errno()) {
            return "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $connect;
    }
}