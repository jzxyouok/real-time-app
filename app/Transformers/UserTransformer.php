<?php 

namespace App\Transformers;

class UserTransformer extends Transformer {
	/**
     * Transform a lesson
     *
     * @param $lesson
     * @return array
     **/

    public function transform($user)
    {
    	return [
    		'name' => $user['name'],
    		'email' => $user['email'],
    		'status' => 'Offline'
    	];
    }
}