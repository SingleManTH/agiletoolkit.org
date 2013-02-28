<?php
class Model_Content extends DisjointModel {
    public $table='content';
    public $type='Content';

    function init(){
        parent::init();

        $this->addField('name');
        $this->hasOne('User');

        // Is this a paid piece of content?
        $this->addField('is_paid')->type('boolean');

        // Have me paid for this content?
        $this->hasMany('Purchase');
        $this->addExpression('is_purchased')->set(function($m){
            $p=$m->refSQL('Purchase');
            $p->addCondition('user_id',$this->api->me->id);
            $p->addCondition('is_valid',true);
            return $p->count();
        });

        // This is a cached reputation for this object. It's calculated
        // by total reputation received for this piece of content plus
        // half of the reputation of the owner.
        $this->add('rep')->caption('Reputation');
        $this->hasMany('Vote');

        // my total vote
        $this->addExpression('my_vote')->set(function($m){
            $p=$m->refSQL('Vote');
            $p->addCondition('user_id',$this->api->me->id);
            return $p->sum('weight');
        });
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

