<?php
$config['dsn']='mysql://root:root@localhost/agiletoolkit';
$config['atk']['base_path']='/atk4/';
$config['url_prefix']='?page=';
$config['url_postfix']='';

$config['opauth']=array(
    // See: https://github.com/uzyn/opauth/wiki/Opauth-configuration
    'Strategy'=>array(
        'GitHub'=>array(
            'client_id'=>'09348363e5e10cf3a7ba',
            'client_secret'=>'432433a4f4418245dd8efcfd898f08e291b323d1'
        )
    )
);
