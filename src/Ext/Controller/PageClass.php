<?php
/*
 * @author Michael Mifsud <info@tropotek.com>
 * @link http://www.tropotek.com/
 * @license Copyright 2007 Michael Mifsud
 */
namespace Ext\Controller;

/**
 * Run the dispatcher and build the page,
 * The page is the root node of the module tree.
 * Insert modules in this tree to ensure they are executed correctly.

 * @package Ext\Controller
 */
class PageClass extends \Tk\Object implements \Tk\Controller\Iface
{

    /**
     * Call after dispatcher is executer
     *
     * @param \Tk\FrontController $obs
     */
    public function update($obs)
    {
        tklog($this->getClassName().'::update()');

        // Discover page Template if not set yet
        //$this->getConfig()->set('system.theme.selected.themeFile', $this->getConfig()->get('system.theme.default.themeFile'));
        if (!$this->getConfig()->exists('res.pageClass')) {
            $this->getConfig()->set('res.pageClass', '\Ext\PagePublic');
            if (preg_match('/^\/admin/', $this->getUri()->getPath(true))) {
                $this->getConfig()->set('res.pageClass', '\Ext\PageAdmin');
                $this->getConfig()->set('res.system.permission', \Tk\Auth\Auth::P_ADMIN);
                $this->getConfig()->set('system.theme.selected.themeFile', 'admin.tpl');
            }
            if (preg_match('/^\/user/', $this->getUri()->getPath(true))) {
                $this->getConfig()->set('res.pageClass', '\Ext\PageUser');
                $this->getConfig()->set('res.system.permission', \Tk\Auth\Auth::P_USER);
                $this->getConfig()->set('system.theme.selected.themeFile', 'admin.tpl');
            }
        }
    }

}
