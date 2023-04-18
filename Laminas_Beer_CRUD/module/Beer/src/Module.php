<?php
namespace Beer;

use Beer\Controller\BeerController;
use Beer\Model\Beer;
use Beer\Model\BeerTable;
//use Laminas\Db\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Db\Adapter\Adapter;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                BeerController::class => function ($container) {
                    return new BeerController($container->get(BeerTable::class));
                }
            ]
        ];
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                BeerTable::class => function ($container) {
                    $tableGateway = $container->get(Model\BeerTableGateway::class);
                    return new BeerTable($tableGateway);
                },
                Model\BeerTableGateway::class => function ($container) {
                   // $dbAdapter = $container->get(AdapterInterface::class);
                  /* $dbAdapter = new Adapter(array(
                                                                       'driver'         => 'Mysqli',
                                                                       'database' => 'dblaminas',
                                                                       'username' => 'root',
                                                                       'password' => 'Buildabit2021Hackfest',
                                                                       ),
                                                                   ); */
             /*    $dbAdapter = new Adapter(array(
                                                                     'host' => '127.0.0.1',
                                                                             'dbname' => 'dblaminas',
                                                                             'user' => 'root',
                                                                             'password' => 'Buildabit2021Hackfest',
                                                                             'port' => 3306,
                                                                             'driver' => 'pdo_mysql',
                                                                             'charset' => 'utf8mb4',
                                                                             'collate' => 'utf8mb4_general_ci'
                                                                     ),
                                                                 );*/
   /*             $dbAdapter = new Adapter(array(
                                                                                      'driver'         => 'Pdo',
                                                                                      'dsn'      => 'mysql:dbname=dblaminas;unix_socket=/tmp/mysql.sock',
                                                                                      'username' => 'root',
                                                                                      'password' => 'Buildabit2021Hackfest',
                                                                                      ),
                                                                                  );
*/

                   $dbAdapter = new Adapter(array(
                                                    'driver'         => 'Pdo',
                                                    'dsn'      => 'mysql:dbname=dblaminas;host=mysql;port=3306;charset=UTF8',
                                                    'username' => 'suyash',
                                                    'password' => 'password',
                                                    ),
                                                );


                  /*  $dpAdapter = new Adapter([

                                     'driver' => 'pdo',
                                     'dsn' => 'mysql:host=localhost;dbname=dblaminas',
                                     'username' => 'root',
                                     'password' => 'Buildabit2021Hackfest',
                                     'port' => '3306'
                                 ]);*/

                   // $dbAdapter = $container->get(mysqlAdapter::class) ;
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Beer());
                    return new TableGateway('Beers', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
}
