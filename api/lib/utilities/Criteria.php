<?php
// Created by Manfred MOUKATE on 4/3/24, 2:18 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:18 PM

class Criteria
    {
        const ID = 0;
        const TOKEN = 1;
        const ALPHA2  = 2;
        const ALPHA3 = 3;
        const CODE = 4;
        const NAMEFR = 5;
        const NAMEEN = 6;
        const OTHER = 7;
        const NAME= 9;
        const EMAIL = 17;
        const MOBILE = 27;

        const TITLE = 28;
        const DATITIME  = 29;
     
        /**
         * @param array|null $fields
         * @param array|null $request
         * @return void
         * @throws Exception
         */
        static public function _formRequiredCheck(?array $fields, ?array $request): void
        {
            if (empty($request))
                throw new Exception("Empty request not accepted here!");

            foreach ($fields as $field)
                if (!array_key_exists($field, $request))
                    throw new Exception("{$field} missing in your request!");

        }

    }