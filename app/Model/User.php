	<?php  

/**
* 
*/

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $primaryKey = 'user_id';
	
	public $validate = array(
			'user_fullname' => array(
					'rule' => 'notBlank',
					'message' => 'Please enter your name!'
				),
			'user_password' => array(
					'rule' => array('lengthBetween',8,15),
					'message' => 'Password must be between 8 and 15 charaters!'
				),
			'user_email' => array(
					'email' => array(
							'rule' => array('email',true),
							'message' => 'Please enter valid email!'
						),
					'unique' => array(
							'rule' => 'isUnique',
							'message' => 'Please use other email!'
						)
				),
			'user_new_password' => array(
					'rule' => array('lengthBetween',8,15),
					'message' => 'Password must be between 8 and 15 charaters!'
				),
			'user_confirm_password' => array(
					'rule' => array('lengthBetween',8,15),
					'message' => 'Password must be between 8 and 15 charaters!'
				),
			'user_phone' => array(
					'number' => array(
							'rule' => 'numeric',
							'message' => 'Phone number must be numeric'
						),
					'length' => array(
							'rule' => array('lengthBetween',10,11),
							'message' => 'Phone number must have 10 or 11 digit'
						)		
				)
		);

	public $hasMany = array(
			'Favorite' => array(
					'className' => 'Favorite',
					'foreignKey' => 'user_id',
					'dependent' => true
				),

			"Post" => array(
				"className" => "Post",
				"foreignKey" => "user_id",
				"dependent" => true 
			)
		);

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['user_password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();
	        $this->data[$this->alias]['user_password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['user_password']
	        );
	    }
	    return true;
	}


	public function checkExist($email)
	{	
		$user = $this->find('first',
				array(
						'conditions' => array(
								'user_email' => $email
							)
					)
			);
		if (empty($user)) {
			return false;
		} else {
			return true;
		}
	}


}
?>