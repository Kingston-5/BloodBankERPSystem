<?php


class m0010_insert_default_admin_into_admins_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "INSERT INTO admins (user_id) VALUES (1);";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DELETE FROM admins where id = 1;";
        $db->pdo->exec($SQL);
    }
}
