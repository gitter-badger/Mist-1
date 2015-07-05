<?php

namespace Mist\Helpers;

use Mist\Helpers\Configurations;
use PDO;

/*
 * database Helper - extending PDO to use custom methods
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
 * @date June 18, 2015
 */

class Database extends PDO
{

    /**
     * @var instance of database
     */
    protected static $instance = null;

    /**
     * Static method get
     *
     * @return instance of database
     */
    public static function getInstance() 
    {
        if (!isset(self::$instance)) {
            // database configuration information        
            $type = Configurations::getConf("db")["type"];
            $host = Configurations::getConf("db")["host"];
            $name = Configurations::getConf("db")["name"];
            $user = Configurations::getConf("db")["user"];
            $pass = Configurations::getConf("db")["pass"];
            $port = Configurations::getConf("db")["port"];
            $charset = Configurations::getConf("db")["charset"];

            try {
                $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new Database("{$type}:host={$host};port={$port};dbname={$name};charset={$charset}", $user, $pass, $options);
            } catch (PDOException $e) {
                die("Cannot connect to Database");
            }
        }
        return self::$instance;
    }
}
