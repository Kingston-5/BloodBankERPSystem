<?php


class m0005_create_blood_clerks_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS blood_clerks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                center_id INT,
                FOREIGN KEY(user_id) REFERENCES users(id),
                FOREIGN KEY(center_id) REFERENCES health_centers(id)
            );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS blood_clerks;";
        $db->pdo->exec($SQL);
    }
}
