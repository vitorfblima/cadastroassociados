<?php
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

  public $useTable = 'users';
  public $displayField = 'login';
/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'login' => array(
    ),
    'password' => array(
      'notEmpty' => array(
        'rule' => 'notEmpty'
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    )
  );

  public function beforeSave($options = array()) {
    if (isset($this->data['User']['password'])) {
      $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    }

    return true;
  }
}