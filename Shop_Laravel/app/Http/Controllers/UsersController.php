<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Hash;
use Auth;
use App\UserService;

class UsersController extends Controller
{
  public function profile()
    {
        $email = isset($_GET['email']) ? $_GET['email'] : null;
        $password = isset($_GET['password']) ? $_GET['password'] : null;

        $redisService = new \App\RedisService();
        $userService = new \App\UserService($redisService);

        $loggedInUser = $userService->getLoggedInUser($email, $password);

        if ($loggedInUser) {
            return "Chào " . $loggedInUser->name . "!";
        }
        return "Email hoặc pass không hợp lệ!";
    }
}
