<!-- This page connects to the information of the users  -->
<?php
class User extends Connection{
    protected $table = 'users';
    public function __construct(){
        parent::__construct();
    }
}

$user = new User();