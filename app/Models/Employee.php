<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function Underemployees(){
        return $this->hasMany(Underemployee::class);
    }
    public function sale(){
        return $this->hasMany(Sale::class);
    }
    protected $fillable=['name','commission','image'];
}
