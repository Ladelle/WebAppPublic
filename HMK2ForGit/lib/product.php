<!-- This page connects to the products the users picks and the product information associated with the product -->
<?php
class Product extends Connection{
    protected $table = 'products';
    public function __construct(){
        parent::__construct();
    }
}

$product = new Product();