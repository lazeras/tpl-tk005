<?php

$dispatcher = $config->getDispatcherStatic();

$dispatcher->add('/login.html', '\Tk\Auth\Module\Login');
$dispatcher->add('/logout.html', '\Tk\Auth\Module\Logout');

$dispatcher->add('/oauth/dropbox.html', 'Ext\Oauth\ExtDropBox');


$dispatcher->add('/index.html', 'Ext\Module\Index');
$dispatcher->add('/admin/index.html', 'Ext\Module\Admin\Index');

