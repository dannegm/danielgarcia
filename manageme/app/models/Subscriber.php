<?php

class Subscriber extends Eloquent {
	protected $table = 'subscribers';
	protected $hidden = array('token');
}
