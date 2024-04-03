<?php

class DBConn
    {

        /**
         * MySQL DB Connector
         * @return void
         */
        static public function _conn(): void
        {
            try {
                R::setup('mysql:host=localhost;dbname=asdf',
                    'root', '');
            } catch (Exception $exception) {
                die($exception->getMessage());
            }
        }

    }