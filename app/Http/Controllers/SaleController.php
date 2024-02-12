<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Underemployee;

class SaleController extends Controller
{
    public function employeesalepage(){
        return view('employee.Sale');
    }
 
    public function employeelist($mainEmployerId){
        return Underemployee::where('employee_id',$mainEmployerId)->get();
    }

    public function salesaveall(Request $request){
     return  Sale::create([
            'employee_id' => $request->input('employee_id'),
            'saleprice' => $request->input('saleprice'),
            'underemployee_id' => $request->input('underemployee_id'),
        ]);
        
    }
    public function EmployeeAllList(){
        return Employee::with('Underemployees')->get();
    }
    public function saleslist(){
        return Employee::with('sale')->get();
    }
}
