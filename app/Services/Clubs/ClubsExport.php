<?php

namespace App\Services\Clubs;

use App\Models\Club;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ClubsExport
{
 public static function export(){
     $clubs = Club::all();

     $writer = SimpleExcelWriter::streamDownload('clubs.xlsx');
     foreach ($clubs as $club){
         $writer->addRow([
             'id' => $club->id,
             'name' => $club->name,
         ]);
     }
     $writer->toBrowser();
     return [
         'export' => true,
     ];
 }

}
