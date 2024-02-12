<?php

namespace App\Http\Controllers;

use App\Models\Underemployee;
use Illuminate\Http\Request;

class UnderEmployeeController extends Controller
{
    public function createemployee(Request $request){
    return Underemployee::create([
          'employee_id' => $request->input('employee_id'),
          'UnderName1' => $request->input('UnderName1'),
          'Designation1' => $request->input('Designation1'),
          'Commission1' => $request->input('Commission1'),
      ]);
     
    }
}
