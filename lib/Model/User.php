<?php
class Model_User extends Model_Table {
    public $table='user';

    function init()
    {
        parent::init();

        // Let's deal with establishing user identity
        $this->initIdentity();

        // User can authenticate through different means
        $this->initAuthentication();

        // User may own content and have reputation
        $this->initContentOwner();

        // We want to know when, what and how many times
        $this->initAudit();
    }

    function initContentOwner(){
        // User accumulate reputation. Voting up user's stuff or
        // user's profile gives him more popularity. Reputation is quite
        // useful, for example user's content inherit's half of the
        // author's reputation, so being popular is good.
        $this->addField('rep')->caption('Reputation')->editable(false);

        $this->hasMany('VoteUp', 'voter_id', 'IVoted');
        $this->hasMany('VoteUp', 'content_owner_id', 'OthersVoted');


        // User has this concept of "Content". He can upload various
        // stuff to agiletoolkit.org. Everything he uploads gives
        // other users ability to vote on and hence affect user's
        // reputation. Content can be article, plugin, theme or
        // anything else.
        $this->hasMany('Content');
    }

    function initIdentity(){
        // In order to appear anyhow on the agiletoolkit.org user needs to 
        // have a username. Without a username, there is nothing user
        // can do. We will encourage users to select a username.

        $this->addField('name')->mandatory(true)->caption('Username');
        $this->addField('email')->mandatory(true)->editable(false);

        // At some point user needs to confirm his email
        $this->addField('is_email_confirmed')->type('boolean')->editable(false);

        // Several fields to establish power level of a user
        $this->addField('is_admin')->type('boolean')->editable(false);
        //$this->addField('is_moderator');

        // We would like to know more about the user
        $this->addField('full_name');

    }

    function initAuthentication(){
        // Users may have a regular password
        $this->addField('password');

        $this->hasMany('romaninsh/opauth/OPAuth',null,null,'OPAuth');   // Multiple 
    }

    function initAudit(){
    }

    function recalcReputation()
    {
        $this['rep']=$this->ref('OthersVoted')->sum('weight')->getOne();
        $this->save();
    }

}
