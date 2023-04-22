<?php


class m0008_create_blood_orders_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS blood_orders (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                center_id INT,
                datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                A_pos INT,
                A_neg INT,
                AB_pos INT,
                AB_neg INT,
                B_pos INT,
                B_neg INT,
                O_pos INT,
                O_neg INT,
                status INT,
                FOREIGN KEY(user_id) REFERENCES users(id),
                FOREIGN KEY(center_id) REFERENCES health_centers(id)
            );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS blood_orders;";
        $db->pdo->exec($SQL);
    }
}
