<?php


namespace App;
use App\Http\Controllers\UsersController;
use App\Models\User;
use App\UserService;
class RedisService
{
  private $_username;
    private $_password;
    private $_database;

    public function __construct($username, $password, $database)
    {
        $this->_username = $username;
        $this->_password = $password;
        $this->_database = $database;
    }

    public function getLoggedInUser($email, $password) {
        $user = \App\User::where('email', '=', $email)
            ->where('password', '=', $password)->first();
        return $user;
    }
}
