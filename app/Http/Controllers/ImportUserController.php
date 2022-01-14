<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportUser;

class ImportUserController extends Controller
{

   public function index()
   {
      ImportUser::dispatch();
      return 'created order to import file';
   }

   public static function createUser($user)
   {
      var_dump($user);
      //TODO create user in database
      //TODO create credit_cart in database
   }

   public static function verifyUserExist($user)
   {
      //TODO validation if it exists in the database name and adress, and credit_cart
   }

   public static function verifyAgeUser($user)
   {
      //TODO validation age of records between 18 and 65 (or unknown).
   }
}
