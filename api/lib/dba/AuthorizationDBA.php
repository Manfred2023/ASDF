<?php
// Created by Manfred MOUKATE on 4/3/24, 2:23 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:23 PM

class AuthorizationDBA extends DBA
{
    protected const TABLE = 'contact';
    protected const CTOKEN  = 'token';
    protected const NAME = 'name';
    protected const RESUME = 'resume';

    static protected function _toBean(?Authorization $authorization): ?Authorization
    {
        if (!$authorization instanceof Authorization)
            return null;





        $bean = ($update = (int)$authorization->getId() > 0)
            ? R::loadForUpdate(self::TABLE, $authorization->getId())
            : R::dispense(self::TABLE);


        if (!$bean instanceof OODBBean)
            return null;

        if (!$update){
            $bean->{self::CTOKEN} = (int)self::_shortToken(self::TABLE);
        }
        $bean->{self::NAME} = QString::_set(QString::_latin($authorization->getName()));
        $bean->{self::RESUME} = QString::_set(QString::_latin($authorization->getResume()));




        if (($lastID = (int)R::store($bean)) > 0)
            return self::_toObject(R::load(self::TABLE, $lastID));

        return null;
    }

    static protected function _toObject(?OODBBean $bean): ?Contact
    {
        if (!$bean instanceof OODBBean || $bean->isEmpty())
            return null;

        $vars = $bean->export();

        return new Contact(
            $vars[self::CID],
            $vars[self::CTOKEN],
            $vars[self::NAME],
            $vars[self::RESUME],
        );
    }



}