<?php
class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('uniqueClick', 'notEmpty'),
                'message' => 'Username is empty or already exist'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
    
	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}

	/**
	 * check sku exist
	 * @author duythanhdao@live.com
	 */
    public function uniqueClick($username) {
	   $count = $this->find('count', array(
	      'conditions' => array('username' => $username)
		));
		return $count == 0;
	}
}