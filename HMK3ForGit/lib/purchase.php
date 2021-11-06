
<?php
//<!-- This page connects to the purchase information of the user -->
class Purchase extends Connection{
    protected $table = 'purchased_info';
    public function __construct(){
        parent::__construct();
    }
}

$purchase = new Purchase();