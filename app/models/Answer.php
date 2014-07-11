<?php

class Answer extends \Eloquent {
	protected $fillable = ['poll_id', 'text', 'votes'];

	public function poll()
	{
		$this->belongTo('Poll');
	}
}