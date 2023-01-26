<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    
    protected $filable = [
       'user_id','place', 'station', 'address',
    ];
        
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function likes(){
        return $this->hasMany(Like::class);
    }
    
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
    'place',
    'station',
    'body',
    'address',
    ];

}
