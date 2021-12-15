<?php

use ti2018b\phpmvc\Application;

class m0003_data
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE data_user(
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                nim VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE data_user;";
        $db->pdo->exec($SQL);
    }
}
