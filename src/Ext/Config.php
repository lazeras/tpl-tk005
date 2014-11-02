<?php
/*
 * @author Michael Mifsud <info@tropotek.com>
 * @link http://www.tropotek.com/
 * @license Copyright 2007 Michael Mifsud
 */
namespace Ext;

/**
 *
 *
 * @package Ext
 */
class Config extends \Mod\Config
{

    /**
     * Init the config
     *
     * @param string $sitePath
     * @param string $siteUrl
     */
    protected function init($sitePath = '', $siteUrl = '')
    {
        parent::init($sitePath, $siteUrl);

        // User auth config
        $this->parseConfigFile($this->getLibPath().'/tk-user/config/auth-user.php');
        $this->parseConfigFile($this->getLibPath().'/tk-user/config/dispatch.php');

        // Local config files
        $this->parseConfigFile(dirname(dirname(__FILE__)).'/config/localSystem.php');
        $this->parseConfigFile(dirname(dirname(__FILE__)).'/config/dispatch.php');

        // User config prefs
        $this->parseConfigFile(dirname(dirname(__FILE__)).'/config/config.php');

        // Init the plugin lib
        $this->getPluginFactory();

    }




    //-------------- FACTORY METHODS ------------------
    // List them in alphbetical order ....


    /**
     * createPage
     *
     * @param string $pageClass
     * @param array $params
     * @return \Mod\pageClass
     * @throws \Tk\Exception
     */
    function createPage($pageClass, $params = array())
    {
        $page = parent::createPage($pageClass, $params);
        if ($page instanceof \Ext\PageAdmin) {
            $page->setActionPanelClass('\Ext\Ui\ActionsPanel');
            $page->setContentPanelClass('\Ext\Ui\ContentPanel');
        }
        return $page;
    }

    /**
     * Get the plugin instance...
     *
     * @return \Plg\Factory
     */
    public function getPluginFactory()
    {
        if (!$this->exists('res.pluginFactory')) {
            $this['res.pluginFactory'] = \Plg\Factory::getInstance();
        }
        return $this->get('res.pluginFactory');
    }




    /**
     * Get the main application executable controller
     * call execute() on this object to start the app
     *
     * @param \Tk\FrontController $frontController
     * @return \Ext\Application
     */
    public function getApplication($frontController = null)
    {
        if (!$this->exists('res.application')) {
            if (!$frontController) {
                $frontController = new \Tk\FrontController();
            }
            $obj = new Application($frontController);
            $this['res.application'] = $obj;
        }
        return $this->get('res.application');
    }


    /**
     * Get an instance of the URL Dispatcher
     *
     * @return \Tk\Dispatcher
     */
    public function getDispatcher()
    {
        if (!$this->exists('res.dispatcher')) {
            $obj = new \Tk\Dispatcher\Dispatcher($this->getRequest()->getUri());
            $obj->attach(new \Tk\Dispatcher\Ajax());
            $obj->attach($this->getDispatcherStatic());
            $obj->attach(new \Tk\Dispatcher\Module());
            $this['res.dispatcher'] = $obj;
        }
        return $this->get('res.dispatcher');
    }

}
