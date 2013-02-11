<?php
class Model_Content extends Model_Table {
    public $table='content';

    function init(){
        parent::init();

        $this->addField('name');
        $this->hasOne('User','owner_id');

        // Is this a paid piece of content?
        $this->addField('is_paid')->type('boolean');

        // This is a cached reputation for this object. It's calculated
        // by total reputation received for this piece of content plus
        // half of the reputation of the owner.
        $this->add('rep')->caption('Reputation');
        $this->hasMany('VoteUp','content_id');
    }

    function my(){
        $this->addCondition('owner_id',$this->api->me->id);

        return $this;
    }

    function recalcReputation()
    {
        $this['rep']=
            $this->ref('VoteUp')->sum('weight')->getOne()
            +
            floor($this->ref('owner_id')->get('rep')/1);
    }

    function vote($weight)
    {
        $vote = $this->ref('VoteUp')->tryLoadBy('voter_id',$this->api->me->id);
        $vote['weight']=$weight;
        $vote->save();
    }

