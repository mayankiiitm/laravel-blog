<?php
 
class Post extends Eloquent
{
    protected $fillable = array('title','body','user_id');
    
    protected $table = 'post';


public function user()
{
    return $this->belongsTo('User');
}
}








 
