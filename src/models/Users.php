<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Users extends Model {
    use SoftDeletes; 
    protected $table = 'users';
    protected $fillable = ['login'];

    protected $casts = [
        'id' => 'integer',
        'login' => 'string',
    ];

    public static $rules = [
        'login' => 'unique|required|min:3',
        'password' => 'password|required',
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $options = [
            'cost' => 12,
        ];
        if ( !empty($password) ) {
            $this->attributes['password'] = password_hash($password,  PASSWORD_BCRYPT, $options);
        }
    } 
}
 