<?php
/*
 * @author Michael Mifsud <info@tropotek.com>
 * @link http://www.tropotek.com/
 * @license Copyright 2007 Michael Mifsud
 */
try {

    include(dirname(__FILE__).'/vendor/autoload.php');
    \Ext\Config::getInstance()->getApplication()->execute();

} catch (Exception $e) {
    error_log(print_r($e."", true));
}

