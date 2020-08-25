<?php
namespace Infrastructure\Repository;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DBconf
{
    public $entityManager;

    function __construct()
    {
        require_once "vendor/autoload.php";
    }

    public function setUp()
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Entity/Model"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $conn = array(
            'dbname' => env('DB_NAME'),
            'user' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'driver' => env('DB_DRIVER'),
        );

        $this->entityManager = EntityManager::create($conn, $config);
    }
}