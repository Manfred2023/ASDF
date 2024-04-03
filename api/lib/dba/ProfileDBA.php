<?php
// Created by Manfred MOUKATE on 4/3/24, 2:13 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:13 PM

use RedBeanPHP\OODBBean;
use RedBeanPHP\RedException\SQL;

abstract class ProfileDBA extends DBA
{
    protected const TABLE = 'profile';
    protected const TOKEN = 'token';
    protected const NAME = 'name';
    protected const RESUME = 'resume';
    protected const PARNT = 'parent'; 


    static protected function _toBean(?Profile $profile): ?Profile
    {
        if (!$profile instanceof profile)
            return null;
 
        


        $bean = ($update = (int)$profile->getId() > 0)
            ? R::loadForUpdate(self::TABLE, $profile->getId())
            : R::dispense(self::TABLE);


        if (!$bean instanceof OODBBean)
            return null;

        if (!$update){
            $bean->{self::TOKEN} = (int)self::_shortToken(self::TABLE);
        }
        $bean->{self::NAME} = QString::_set(QString::_latin($profile->getName()));
        $bean->{self::RESUME} = QString::_set(QString::_latin($profile->getResume()));
        $bean->{self::PARNT} = QString::_set(QString::_latin($profile->getParent()));




        if (($lastID = (int)R::store($bean)) > 0)
            return self::_toObject(R::load(self::TABLE, $lastID));

        return null;
    }

    static protected function _toObject(?OODBBean $bean): ?Profile
{
    if (!$bean instanceof OODBBean || $bean->isEmpty())
        return null;

    $vars = $bean->export();

    return new Profile(
        $vars[self::CID],
        $vars[self::CTOKEN],
        $vars[self::NAME],
        $vars[self::RESUME],
        $vars[self::PARNT], 
          );
}


   
}
