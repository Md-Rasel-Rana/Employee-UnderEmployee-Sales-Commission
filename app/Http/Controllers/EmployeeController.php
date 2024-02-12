<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function employDashboardpage(){
        return view('EmployeeDashboard.sidenav-layout');
    }
    public function employeepage(){
      return view('employee.EmployeeCreate'); 
    }
    public function employeecreate(Request $request){
      $img_url = null; // Initialize $img_url to avoid scope issues
      
      if ($request->hasFile('image')) {
          // Upload New File
          $img = $request->file('image');
          $t = time();
          $file_name = $img->getClientOriginalName();
          $img_name = "{$t}-{$file_name}";
          $img_url = "uploads/{$img_name}";
          $img->move(public_path('uploads'), $img_name);
  
          // Delete Old File
          $filePath = $request->input('file_path');
          File::delete($filePath);
      }
      
      return employee::create([
          'name' => $request->input('name'),
          'commission' => $request->input('commission'),
          'image' => $img_url, // Make sure $img_url is accessible here
      ]);
  }
  
    public function listemployee(){
      return  Employee::all();
    }
    public function Salepage(){
      return view('employee.EmployeeSale');
    }
 
}
