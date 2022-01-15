<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $typeFile = 'json';
        $pathFile = public_path() . '/filesImport/challenge.json';

        $listArray = [];

        switch ($typeFile) {
            case 'json':
                $listArray = \App\Http\Controllers\util\GetFiletoArrayController::JsonToArray($pathFile);
            break;
            case 'csv':
                $listArray = \App\Http\Controllers\util\GetFiletoArrayController::CSVtoArray($pathFile);
            break;
            case 'xml':
                $listArray = \App\Http\Controllers\util\GetFiletoArrayController::XMLtoArray($pathFile);
            break;
        }

        foreach ($listArray as $key => $user) {
            \App\Http\Controllers\ImportUserController::createPeople($user);
        }
    }

}
