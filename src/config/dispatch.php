<?php

$dispatcher = $config->getDispatcherStatic();

//$dispatcher->add('/index.html', 'Ext\Module\Index');
$dispatcher->add('/admin/index.html', 'Ext\Module\Admin\Index');

