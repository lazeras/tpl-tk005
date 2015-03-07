<?php
/**
 * Encoding: utf-8
 * File: MonoLog.php
 * PHP version 5
 * Created: 04-03-2015
 * 
 * Controller to initiate the PSR-3 compliant log objects
 *
 * Class called with following code in Ext\Application function run
 * <code>
 * $this->frontAttach(new \Ext\Controller\Log());
 * </code>
 * 
 * @category Ext
 * @package Log
 * @version 1.0
 *  
 * @copyright  Copyright (c) 2015 and Onwards, Patrick S Scott. All rights reserved.
 * @author Patrick S Scott<lazeras@kaoses.com>
 * @link http://www.kaoses.com
 */
 
 /**
  * Description of Log
  */

namespace Ext\Controller;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SyslogHandler;
use \Bramus\Monolog\Formatter\ColoredLineFormatter;
use MySQLHandler\MySQLHandler;

class MonoLog extends \Tk\Object {

    /**
     *
     * @param \Tk\FrontController $obj
     */
    public function update($obj)
    {
        $logMgr = $this->getConfig()->getLog();

        // the default date format is "Y-m-d H:i:s"
        $dateFormat = "Y n j, g:i a";
        // the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
        $output = "%datetime% > %channel% > %level_name% > %message% %context% %extra%\n";
        // finally, create a formatter
        $formatter = new LineFormatter($output, $dateFormat, true, true);

        /*
         * log messages to firebug console in browser
         */
        $fireHandler = new FirePHPHandler();
        $fireLogger = new Logger('WebConsole');
        $fireLogger->pushHandler($fireHandler);
        $this->getConfig()->getLog()->setLogger($fireLogger, 'WebConsole');

        /**
         * Logs to the file specified in the config 'system.log.path'
         */
        $logHandler = new StreamHandler($this->getConfig()->get('system.log.path'), 'DEBUG');
        $logHandler->setFormatter(new ColoredLineFormatter(null, $output, $dateFormat, true, true));
        $log = new Logger('default');
        $log->pushHandler($logHandler);
        $this->getConfig()->getLog()->setLogger($log);

        $plgHandler = new StreamHandler($this->getConfig()->get('system.log.path'), 'DEBUG');
        $plgHandler->setFormatter(new ColoredLineFormatter());
        $logPlg = new Logger('plg');
        $logPlg->pushHandler($plgHandler);
        $this->getConfig()->getLog()->setLogger($plgHandler, 'plg');

        /**
         * Outputs log to php error_log()
         */
        //$log->pushHandler(new \Monolog\Handler\ErrorLogHandler());
        $pdo = $this->getConfig()->getDb();
        $mySQLHandler = new MySQLHandler($pdo, "log", array('username', 'userid'), 'DEBUG');
        $logger = new Logger('DB');
        $logger->pushHandler($mySQLHandler);
        $this->getConfig()->getLog()->setLogger($logger, 'DB');





        /**
         * Out puts log to syslog
         */
        //$handler = new SyslogHandler('TEST');
        //$handler->setFormatter($formatter);
        //$log->pushHandler($handler);
        $this->getConfig()->getLog()->setLogger($log);

    }

}
