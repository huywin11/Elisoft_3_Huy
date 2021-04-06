<?php
namespace App;
use App\Http\Controllers\UsersController;
use App\Models\User;
use App\RedisService;

class UserService
{
  private $_dbService;

    public function __construct(RedisService $dbService)
    {
        $this->_dbService = $dbService;
    }

    public function getLoggedInUser($email, $password)
    {
        $user = $this->_dbService->getLoggedInUser($email, $password);
        return $user;
    }
}











 ?>
