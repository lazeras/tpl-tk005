<?php

    /*
     * Setup a Database session
     */
    //$config['session.driver'] = 'Tk\Session\Database';
    //$config['session.database.table'] = 'session';
    //$config['session.database.config'] = 'db.connect.default';
    //$config['session.regenerate'] = 0; // Does not work for DB sessions yet
    //$config['session.gc_probability'] = 1;
    //$config['session.gc_divisor'] = 10; // lower this for high traffic sites.

    $config['system.theme.default.name'] = 'default';
    $config['system.theme.default.themeFile'] = 'public.tpl';

    /*
     * LDAP Config Options
     */
    //$config['system.auth.ldap.enable'] = true;
    //$config['system.auth.ldap.uri']    = 'ldap://ldap.example.com';
    //$config['system.auth.ldap.port']   = 389;
    //$config['system.auth.ldap.baseDn'] = 'ou=people,o=example';
    // $config['system.auth.ldap.filter'] = 'uid=%s';

    //$config['system.auth.loginAdapters'] = array(
    //    'Config' => '\Tk\Auth\Adapter\Config'
    //    ,'Trap' => '\Tk\Auth\Adapter\Trapdoor'
    // );

    $config['system.user.loginForm.enableAdapters'] = false;

    $config['system.auth.loginAdapters'] = array(
        'DbTable' => '\Tk\Auth\Adapter\DbTable',
        'Config' => '\Tk\Auth\Adapter\Config',
        'Trap' => '\Tk\Auth\Adapter\Trapdoor'
        //'User' => '\Auth\Adapter\Usr'
        //,'Unimelb (LDAP)' => '\Usr\Auth\Adapter\Unimelb'
    );

    /**
     * loginAdapters DbTable
     */
    $config['system.auth.dbTable.tableName'] = 'Users';
    $config['system.auth.dbTable.usernameColumn'] = 'Username';
    $config['system.auth.dbTable.passwordColumn'] = 'Password';


    // Set these when using admin only authentication
    // This is a simple one user auth used for small sites.
    /*$config['site.auth.username'] = 'admin';
    $config['site.auth.password'] = 'password';*/
    $config['system.auth.username'] = 'admin';
    $config['system.auth.password'] = 'jv926hnq';

    //$config->attach(new \Usr\Observer\AuthConfig(), 'res.auth');
    $config['system.user.defaultGroup'] = 'user';

    // Enable public users to register on the system.
    // setting this to false removes the registration form.
    // Also removes the link to it from the login form.
    $config['system.user.enableRegistration'] = true;
    $config['system.user.enableRegistration.Url'] = '/register.html';

    // Enable the recovery of password link and page on the login url
    $config['system.user.enablePwdRecovery'] = true;
    $config['system.user.enablePwdRecovery.Url'] = '/recover.html';

    // If set this html will be placed under the username and password
    // fields. Useful to add external registration and recovery information and links.
    $config['system.user.loginHtml'] = '';

    // This is the default login url
    $config['system.auth.loginUrl'] = '/login.html';
    $config['system.auth.loginUrl.secure'] = true;
    // This is the default logout url
    $config['system.auth.logoutUrl'] = '/logout.html';

    // Set a user class here for the login system EG: \Usr\Db\User
    $config['system.auth.userClass'] = '';


    $config['system.auth.oauthAdapters'] = array(
        'dropbox' => array(
            'key'       => '1udiybq4y4sfety',
            'secret'    => 'wr1y2uqh6bqxy4a',
        ),
        'facebook' => array(
            'key'       => '1udiybq4y4sfety',
            'secret'    => 'wr1y2uqh6bqxy4a',
        )
    );










