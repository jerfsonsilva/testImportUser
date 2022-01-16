<?php

namespace App\Http\Controllers;

use App\Jobs\ImportUser;

class PeopleController extends Controller
{
   public function index()
   {
      try {
         ImportUser::dispatch();
         return ['msg' => 'created order to import file'];
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}
