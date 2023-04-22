<?php


class m0006_create_appointments_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS appointments (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                center_id INT,
                datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                status smallint,
                FOREIGN KEY(user_id) REFERENCES users(id),
                FOREIGN KEY(center_id) REFERENCES health_centers(id)
            );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS appointments;";
        $db->pdo->exec($SQL);
    }
}
