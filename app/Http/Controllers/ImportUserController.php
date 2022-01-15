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

   public static function createPeople($user)
   {
      \App\Models\people::createPeople($user);
   }
}
