<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //change of table name in model
    protected $table ='posts';

    //change of primary key name in model
    public $primaryKey ='id';

    //change of timestamps name in model
    public $timestamps ='id';

 protected $fillable = [
        'title', 'content', 'file_name', 'post_thumbnail',
    ];



    public static function Rules(){
         $rules= array(
        'title'=>'required', 
         'content'=>'required',
        
        ); 
       return $rules;
    }

     public static  $messages=array(
         'title.required'=>'Unesite naslov ! ',
        'content.required'=>'Unesite sadržaj ! ',
          
        );

   
}
