<?php
// Created by Manfred MOUKATE on 4/3/24, 2:18 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:18 PM

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