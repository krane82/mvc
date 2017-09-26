<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 24.09.2017
 * Time: 22:17
 */
class DB
{
    private $connection;
    private $db_config;
    public function __destruct() {
        $this->disconnect();
    }
    public function connect() {
        $db_config =App::getInstance()->getConfig();
        $this->connection = new PDO($db_config['dsn'],$db_config['dbuser'],$db_config['dbpassword']);
        return $this->connection;
    }
    public function disconnect() {
        $this->connection = null;
    }
}