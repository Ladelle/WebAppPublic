
<?php
//<!-- This page connects to the profile of the users and the profile information associated with the user -->
class Profile extends Connection{
    protected $table = 'profiles';
    public function __construct(){
        parent::__construct();
    }
}

$profile = new Profile();