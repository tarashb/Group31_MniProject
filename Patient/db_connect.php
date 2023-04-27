<?php
    require_once("db_config.php");
    class DB_Connect {

        function connect() {
            return new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        }
    }

?>