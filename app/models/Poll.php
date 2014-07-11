<?php

class Poll extends \Eloquent {
	protected $fillable = ['question'];

	public function answers()
	{
		return $this->hasMany('Answer');
	}
}