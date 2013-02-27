<?php
class Model_Vote extends Model_Table {
    function init(){
        parent::init();

        $this->hasOne('User','voter_id')->caption('Voted by');
        $this->hasOne('Content','content_id')->caption('Voted for');

        $this->hasOne('User','content_owner_id')->caption('Contents owner')->editable('false');

        // Set content_owner_id based on selected content_id
        $this->addHook('beforeSave',function($m){
            if($m->dirty['content_id']){
                $m['content_owner_id']=$m->ref('content_id')->get('owner_id');
            }
        });

        $this->addField('weight')->defaultValue(1); // can be -1 if vote-down
    }
}
