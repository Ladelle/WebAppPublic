<?php
// <!-- This page connects to the roles of the users  -->
class Role extends Connection{
    protected $table = 'roles';
    public function __construct(){
        parent::__construct();
    }
}

$rl = new Role();