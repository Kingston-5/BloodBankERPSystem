<?php


class m0009_insert_default_user_into_users_table {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "INSERT INTO users (
        	email,
        	firstname,
        	lastname,
        	password
        	) VALUES (
        	'superadmin@email.com',
        	'Super',
        	'Admin',
        	'$2y$10$.hc/zFcAMkecKAuuhUC6JOhLDzpgo/UEfflDCS.2YvXdH0qmiwMKe'
        	);";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DELETE FROM users where id = 1;";
        $db->pdo->exec($SQL);
    }
}
