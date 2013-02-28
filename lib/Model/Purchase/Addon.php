<?php
class Model_Purchase_Addon extends Model_Purchase {
    public $type='Purchase_Addon';
    function init(){
    }
    function initPurchase(){
        // Narrow down selection of purchase
        $this->hasOne('Content_Addon',null,null,'Content');
    }
}
