<?php


class m0001_initial {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "ALTER DATABASE bloodbank COLLATE = 'utf8mb4_bin';";
        
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP DATABASE IF EXISTS bloodbank;";
        $db->pdo->exec($SQL);
    }
}
