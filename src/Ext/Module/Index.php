<?php
    /*
     * @author Michael Mifsud <info@tropotek.com>
     * @link http://www.tropotek.com/
     * @license Copyright 2007 Michael Mifsud
     */
    namespace Ext\Module;

    use kaoses\Kdo\Kdo;
    use \Tk\Log\Log;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Monolog\Handler\FirePHPHandler;
    use Monolog\Formatter\LineFormatter;
    use Monolog\Handler\SyslogHandler;

    /**
     *
     *
     * @package Ext\Module
     */
    class Index extends \Mod\Module
    {

        /**
         * __construct
         */
        public function __construct()
        {


        }


        /**
         * init
         */
        public function init()
        {
            //$test = new \stdClass();
            //$test->email = 'testing@test.com';
            //$test->password = '$2y$10$OLC7dBF4gZcdSXDOS6THqee58dcvuYvWgtofAjIHEfoRNxkUVktDq';
            //$test->activated = true;
            //$test->first_name = 'tester';
            //$test->last_name = 'createdmanually';
            //$test->table = 'users';
            //$date = new \DateTime('now');
            //$test->created_at = $date->format('Y-m-d H:i:s');
            //$test->updated_at = $date->format('Y-m-d H:i:s');

            //vd($test);

            /*
                    $rbac = $this->getConfig()->getRbac();

                    $devPerm_id = $rbac->Permissions->add('dev', 'Website developer');
                    $devRole_id = $rbac->Roles->add('dev', 'Website developer');


                    $adminPerm_id = $rbac->Permissions->add('admin', 'website administrator');
                    $adminRole_id = $rbac->Roles->add('admin', 'website administrator');

                    $userPerm_id = $rbac->Permissions->add('user', 'website user');
                    $userRole_id = $rbac->Roles->add('user', 'website user');


                    $rbac->Permissions->assign(1, $devPerm_id);
                    $rbac->Permissions->assign(1, $adminPerm_id);
                    $rbac->Permissions->assign(1, $userPerm_id);
                    $rbac->Roles->assign(1, $devPerm_id);
                    $rbac->Roles->assign(1, $adminPerm_id);
                    $rbac->Roles->assign(1, $userPerm_id);


                    $rbac->Permissions->assign($devRole_id, $devPerm_id);
                    $rbac->Permissions->assign($devRole_id, $adminPerm_id);
                    $rbac->Permissions->assign($devRole_id, $userPerm_id);
                    $rbac->Roles->assign($devRole_id, $devPerm_id);
                    $rbac->Roles->assign($devRole_id, $adminPerm_id);
                    $rbac->Roles->assign($devRole_id, $userPerm_id);

                    $rbac->Permissions->assign($adminRole_id, $adminPerm_id);
                    $rbac->Permissions->assign($adminRole_id, $userPerm_id);
                    $rbac->Roles->assign($adminRole_id, $adminPerm_id);
                    $rbac->Roles->assign($adminRole_id, $userPerm_id);

                    $rbac->Permissions->assign($userRole_id, $userPerm_id);
                    $rbac->Roles->assign($userRole_id, $userPerm_id);

            $rbac->Users->assign(1, -4);
            $rbac->Users->assign($devRole_id, -3);
            $rbac->Users->assign($adminRole_id, -2);
            $rbac->Users->assign($userRole_id, -1);
            */


            $msg = 'This is a test log message for testing purposes';
            //\Tk\Config::getInstance()->getLog()->Log($msg);

            /*
                 $session = \Tk\Session::getInstance();
                 $typeMapping = array('timestamp' => array('object' => '\Tk\Date', 'save' => "format('Y-m-d H:i:s')", 'create' => "create"), 'updateField' => 'modified', 'createdField' => 'created');
                 $session->set('typeMapping', $typeMapping);

                 $config = \Tk\Config::getInstance();
                 $params = $this->getConfig()->get('db.connect.default');
                 $dns = $params['type'] . ':dbname=' . $params['dbname'] . ';host=' . $params['host'];
                 $pdo = new \Ext\Db\Epdo($dns, $params['user'], $params['pass']);
                 $config->set('pdo', $pdo);
                 $result = $pdo->selectQuery('SELECT * FROM scheme ', 'scheme');

                 foreach ($result['objects'] as $obj) {
                     //$res = $pdo->save($obj);

                     //$pdo->insert($obj);
                 }
                 /*
                         $test = new \stdClass();
                         $test->email = 'testing@test.com';
                         $test->password = '$2y$10$OLC7dBF4gZcdSXDOS6THqee58dcvuYvWgtofAjIHEfoRNxkUVktDq';
                         $test->activated = true;
                         $test->first_name = 'tester';
                         $test->last_name = 'createdmanually';
                         $test->table = 'users';
                         $date = new \DateTime('now');
                         $test->created_at = $date->format('Y-m-d H:i:s');
                         $test->updated_at = $date->format('Y-m-d H:i:s');

                         $res = $pdo->insert($test);


            $pdo = new \Kdo\Kdo($dns, $params['user'], $params['pass']);
            $config->set('pdo', $pdo);
           $result = $pdo->selectQuery('SELECT * FROM users ', 'users');

            foreach ($result['objects'] as $obj) {
                $res = $pdo->save($obj);
                //$pdo->insert($obj);
                vd($res);
            }*/











            /*
             *



    vd({Ext\Db\tableMeta}): Ext\Db\tableMeta Object
    (
        [tableName:Ext\Db\tableMeta:private] => scheme
        [primary:Ext\Db\tableMeta:private] => int
        [uniqueList:Ext\Db\tableMeta:private] => Array
            (
                [serial] => serial
            )

        [columnProperties:Ext\Db\tableMeta:private] => Array
            (
                [serial] => Array
                    (
                        [name] => serial
                        [type] => bigint
                        [len] =>
                        [comment] => auto increment id primary field
                        [default] =>
                        [uni] => 1
                        [extra] => auto_increment
                    )

                [int] => Array
                    (
                        [name] => int
                        [type] => int
                        [len] =>
                        [comment] => standard int field
                        [default] =>
                        [pri] => 1
                    )

                [tinyint] => Array
                    (
                        [name] => tinyint
                        [type] => tinyint
                        [len] =>
                        [comment] => tinyint length 1 as in for a boolean field
                        [default] =>
                    )

                [varchar] => Array
                    (
                        [name] => varchar
                        [type] => varchar
                        [len] => 255
                        [comment] => varchar field standard field for mixed data
                        [default] =>
                    )

                [decimal] => Array
                    (
                        [name] => decimal
                        [type] => decimal
                        [len] =>
                        [comment] => decimal field to hold decimal numbers max and min decimal specified in that order
                        [default] =>
                    )

                [float] => Array
                    (
                        [name] => float
                        [type] => float
                        [len] =>
                        [comment] => float field to hold float numbers
                        [default] =>
                    )

                [enum] => Array
                    (
                        [name] => enum
                        [type] => enum
                        [len] => 5
                        [comment] => a enum field
                        [default] =>
                    )

                [text] => Array
                    (
                        [name] => text
                        [type] => text
                        [len] => 65535
                        [comment] => text field for large values
                        [default] =>
                    )

                [blob] => Array
                    (
                        [name] => blob
                        [type] => blob
                        [len] => 65535
                        [comment] => blob field for large values
                        [default] =>
                    )

                [modified] => Array
                    (
                        [name] => modified
                        [type] => timestamp
                        [len] =>
                        [comment] => timestamp with current stamp on update set
                        [default] =>
                        [extra] => on update CURRENT_TIMESTAMP
                        [object] => \Tk\Date
                        [save] => format('Y-m-d H:i:s')
                        [create] => create
                    )

                [created] => Array
                    (
                        [name] => created
                        [type] => datetime
                        [len] =>
                        [comment] => date field with default value set
                        [default] => CURRENT_TIMESTAMP
                    )

                [date] => Array
                    (
                        [name] => date
                        [type] => date
                        [len] =>
                        [comment] => date field
                        [default] =>
                    )

                [datetime] => Array
                    (
                        [name] => datetime
                        [type] => datetime
                        [len] =>
                        [comment] => datetime standard field
                        [default] =>
                    )

                [timestamp] => Array
                    (
                        [name] => timestamp
                        [type] => timestamp
                        [len] =>
                        [comment] => timestamp field
                        [default] =>
                        [object] => \Tk\Date
                        [save] => format('Y-m-d H:i:s')
                        [create] => create
                    )

                [timestampUpdate] => Array
                    (
                        [name] => timestampUpdate
                        [type] => timestamp
                        [len] =>
                        [comment] => timestamp with current stamp on update set
                        [default] =>
                        [extra] => on update CURRENT_TIMESTAMP
                        [object] => \Tk\Date
                        [save] => format('Y-m-d H:i:s')
                        [create] => create
                    )

                [datetimeUpdate] => Array
                    (
                        [name] => datetimeUpdate
                        [type] => datetime
                        [len] =>
                        [comment] => date field with default value set
                        [default] => CURRENT_TIMESTAMP
                    )

            )

        [columnObjects:Ext\Db\tableMeta:private] => Array
            (
                [0] => modified
                [1] => timestamp
                [2] => timestampUpdate
            )

        [unique:Ext\Db\tableMeta:private] => 1
        [objects:Ext\Db\tableMeta:private] => 1
    )








            [0] => Array
                (
                    [TABLE_CATALOG] => def
                    [TABLE_SCHEMA] => Dev_Test
                    [TABLE_NAME] => users
                    [COLUMN_NAME] => id
                    [ORDINAL_POSITION] => 1
                    [COLUMN_DEFAULT] =>
                    [IS_NULLABLE] => NO
                    [DATA_TYPE] => int
                    [CHARACTER_MAXIMUM_LENGTH] =>
                    [CHARACTER_OCTET_LENGTH] =>
                    [NUMERIC_PRECISION] => 10
                    [NUMERIC_SCALE] => 0
                    [DATETIME_PRECISION] =>
                    [CHARACTER_SET_NAME] =>
                    [COLLATION_NAME] =>
                    [COLUMN_TYPE] => int(10) unsigned
                    [COLUMN_KEY] => PRI
                    [EXTRA] => auto_increment
                    [PRIVILEGES] => select,insert,update,references
                    [COLUMN_COMMENT] =>
                )

            [1] => Array
                (
                    [TABLE_CATALOG] => def
                    [TABLE_SCHEMA] => Dev_Test
                    [TABLE_NAME] => users
                    [COLUMN_NAME] => email
                    [ORDINAL_POSITION] => 2
                    [COLUMN_DEFAULT] =>
                    [IS_NULLABLE] => NO
                    [DATA_TYPE] => varchar
                    [CHARACTER_MAXIMUM_LENGTH] => 255
                    [CHARACTER_OCTET_LENGTH] => 765
                    [NUMERIC_PRECISION] =>
                    [NUMERIC_SCALE] =>
                    [DATETIME_PRECISION] =>
                    [CHARACTER_SET_NAME] => utf8
                    [COLLATION_NAME] => utf8_unicode_ci
                    [COLUMN_TYPE] => varchar(255)
                    [COLUMN_KEY] => UNI
                    [EXTRA] =>
                    [PRIVILEGES] => select,insert,update,references
                    [COLUMN_COMMENT] =>
                )
             */


        }

        /**
         * doDefault
         */
        public function doDefault()
        {

        }

        /**
         * show
         */
        public function show()
        {
            $template = $this->getTemplate();


            $js = <<<JS
jQuery(function($) {
  
});
JS;
            //$template->appendJs($js);

        }

    }




