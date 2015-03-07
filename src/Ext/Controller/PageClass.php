<?php
    /*
     * @author Michael Mifsud <info@tropotek.com>
     * @link http://www.tropotek.com/
     * @license Copyright 2007 Michael Mifsud
     */
    namespace Ext\Controller;

    /**
     * Run the dispatcher and build the page,
     * The page is the root node of the Module tree.
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

            //if (!$this->getConfig()->exists('res.pageClass')) {


            /*        if (preg_match('/^\/auth/', $this->getUri()->getPath(true))) {
                        new \Tk\Auth\Controller\opAuthInterface();
                    }*/

            $this->getConfig()->set('res.pageClass', '\Ext\PagePublic');

            if (preg_match('/^\/user/', $this->getUri()->getPath(true))) {
                $this->getConfig()->set('res.pageClass', '\Ext\PageUser');
                $userRole_id = $this->getConfig()->getRbac()->Roles->returnId('user');
                $this->getConfig()->set('res.system.permission', $userRole_id);
                $this->getConfig()->set('system.theme.selected.themeFile', 'admin.tpl');
            }

            if (preg_match('/^\/admin/', $this->getUri()->getPath(true))) {
                $this->getConfig()->set('res.pageClass', '\Ext\PageAdmin');
                $adminRole_id = $this->getConfig()->getRbac()->Roles->returnId('admin');
                $this->getConfig()->set('res.system.permission', $adminRole_id);
                $this->getConfig()->set('system.theme.selected.themeFile', 'admin.tpl');
            }
            //}
        }

    }
