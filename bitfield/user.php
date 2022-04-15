<?php
include('connection.php');

$connect = mysqli_connect('localhost', 'root', '', 'farmme');

class Users
{
    public $id;
    public $username;
    public $role;
    public $created_at;
    public $updated_at;

    public function __construct()
    {
    }

    public function attributes($id, $username, $role, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    const ROLE_CREATE = 2 ** 0;
    const ROLE_READ = 2 ** 1;
    const ROLE_UPDATE = 2 ** 2;
    const ROLE_DELETE = 2 ** 3;

    function all()
    {
        $users = array();
        $sql = 'SELECT * FROM users';

        global $connect;
        $query = mysqli_query($connect, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {
                $user = new Users();
                $user->attributes($row['id'], $row['username'], $row['role'], $row['created_at'], $row['updated_at']);
                array_push($users, $user);
            };
            return $users;
        }
        return 0;
    }

    function create()
    {
        global $connect;

        $sql = 'INSERT INTO users (`username`, `role`) VALUES ("' . $this->username . '", ' . $this->role . ')';
        $query = mysqli_query($connect, $sql);
        return $query;
    }
}