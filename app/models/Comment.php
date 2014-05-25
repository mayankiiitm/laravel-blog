<?php
 
class Comment extends Eloquent
{
	protected $fillable = array('commentbody','post_id','user_id');
    
    protected $table = 'comment';

    public function user()
    {
    	return $this->belongsTo('User');
    }
}