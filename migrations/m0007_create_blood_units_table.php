<?php


class m0007_create_blood_units_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS blood_units (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                center_id INT,
                appointment_id INT,
                datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                code varchar(11),
                blood_group char(3),
                FOREIGN KEY(user_id) REFERENCES users(id),
                FOREIGN KEY(center_id) REFERENCES health_centers(id),
                FOREIGN KEY(appointment_id) REFERENCES appointments(id),
            );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS blood_units;";
        $db->pdo->exec($SQL);
    }
}
