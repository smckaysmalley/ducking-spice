<?php

class Account extends Eloquent
{
   protected $connection = 'mysql';
   
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'accounts';
	
}