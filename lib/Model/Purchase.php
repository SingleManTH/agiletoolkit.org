<?php
class Model_Purchase extends DisjointModel {
    public $table='purchase';
    public $type='Purchase';
    function init(){
        parent::init();

        $this->hasOne('User');
        $this->initPurchase();
        $this->initTimestamps();
        $this->addField('purchased_dts')->type('datetime')->system(true);

        $this->addField('is_paid')->type('boolean');

        $this->addField('domain');
        $this->addField('expires_dts')->type('datetime');
        $this->addField('expires')->calculated(true);

        $this->addExpression('is_valid')->type('boolean')
            ->set('if(is_paid=1 and expires_dts>now(),1,0)');

        $this->addExpression('name')->set(function($m){
            return $m->_dsql()->concat(
                'Purchase of ',
                $this->refSQL('Content')->fieldQuery('name')
            );
        });
    }
    function initPurchase(){
        $this->hasOne('Content');
    }
}
