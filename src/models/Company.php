<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model {
    use SoftDeletes; 
    protected $table = 'companies';
    protected $fillable = ['name','phone'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string'
    ];

    public static $rules = [
        'name' => 'unique|required|min:3',
        'phone' => 'required|min:9',
    ];
}
 