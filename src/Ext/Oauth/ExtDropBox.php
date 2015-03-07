<?php
/*
 * @author Michael Mifsud <info@tropotek.com>
 * @link http://www.tropotek.com/
 * @license Copyright 2007 Michael Mifsud
 */

namespace Ext\Oauth;

use OAuth\OAuth2\Service\Dropbox;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;
use OAuth\ServiceFactory;

/**
 * dropbox oauth module
 *
 *
 *
 * @package Ext\Oauth
 */
class ExtDropBox extends \Mod\Module
{


    /**
     */
    public function __construct()
    {
        $this->setSecure(true);
        $this->setInsertMethod(self::INS_REPLACE);

    }


    /**
     * Init the object
     */
    public function init()
    {

    }

    /**
     * Execute the object
     */
    public function doDefault()
    {
        require_once $this->getConfig()->getVendorPath().'/lusitanian/oauth/src/OAuth/bootstrap.php';
        $servicesCredentials = $this->getConfig()->get('system.auth.oauthAdapters');
        $serviceFactory = new \OAuth\ServiceFactory();
        $uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
        $currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
        $currentUri->setQuery('');

        // Session storage
        $storage = new Session();
        // Setup the credentials for the requests
        $credentials = new Credentials(
            $servicesCredentials['dropbox']['key'],
            $servicesCredentials['dropbox']['secret'],
            $currentUri->getAbsoluteUri()
        );
        // Instantiate the Dropbox service using the credentials, http client and storage mechanism for the token
        // @var $dropboxService Dropbox
        $dropboxService = $serviceFactory->createService('dropbox', $credentials, $storage, array());


        if (!empty($_GET['code'])) {
            // This was a callback request from Dropbox, get the token
            $token = $dropboxService->requestAccessToken($_GET['code']);

            // Send a request with it
            $result = json_decode($dropboxService->request('/account/info'), true);
            //$result['email'];
            //$result['email_verified'];
            if (isset($result['name_details']['familiar_name']) && $result['name_details']['familiar_name'] != '') {
                $username = $result['name_details']['familiar_name'];
            }else {
                $username =  $result['display_name'];
            }
            $identity = new \Tk\Auth\User\Object($username, -1, $result);
            $this->getConfig()->getAuth()->getStorage()->write($identity);


            if (\Tk\Session::getInstance()->exists('authRedirect')) {
                $url = \Tk\Url::create(\Tk\Session::getInstance()->get('authRedirect'));
                \Tk\Session::getInstance()->delete('authRedirect');
                $url->redirect();
            }else {
                \Tk\Url::create('/index.html')->redirect();
            }

        }elseif (!empty($_GET['go']) && $_GET['go'] === 'go') {
            $url = $dropboxService->getAuthorizationUri();
            header('Location: ' . $url);
        }
    }

    /**
     * show
     */
    public function show()
    {
        $template = $this->getTemplate();
        $template->insertText('test', $this->test);
    }



    /**
     * makeTemplate
     *
     * @return string
     */
    public function __makeTemplate()
    {
        $xmlStr = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<div class="row">
    <div var="test"></div>
</div>
XML;
        $template = \Mod\Dom\Loader::load($xmlStr, $this->getClassName());
        return $template;
    }
}
