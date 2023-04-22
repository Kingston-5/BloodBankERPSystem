<?php

class m0002_create_users_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                address VARCHAR(255),
                phone_number INT,
                dob date,
                gender CHAR(2),
                blood_type CHAR(3),
                password VARCHAR(512) NOT NULL,
                joined NOT NULL TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS users;";
        $db->pdo->exec($SQL);
    }
}
