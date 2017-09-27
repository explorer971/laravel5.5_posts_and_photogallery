<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
//    $fillable указывает те поля которые можно изменять,
//    поля не попадающие в список $fillable изменить нельзя    
    
    protected $fillable = ['title', 'alias', 'intro', 'body'];
    
//    $guarded это поля которые мы хотим защитить
//    то есть можно меня все поля кроме тех что в $guarded
//    protected $guarded = ['title', 'alias', 'intro', 'body'];
    public function getRouteKeyName()
    {
        return 'alias';
    }
}
