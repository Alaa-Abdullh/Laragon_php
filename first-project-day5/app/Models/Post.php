<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //لو هغير الاسم اغيره هنا id/name....>
    // protected $table=
    // protected $primarykey=
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];
    use HasFactory;
    
    protected $fillable =['title','body','user_id','content','image'];

    function user (){
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');

    }
}
