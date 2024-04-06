<?php
// Created by Manfred MOUKATE on 4/3/24, 2:14 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:14 PM

use RedBeanPHP\OODBBean;
use RedBeanPHP\RedException\SQL;

abstract class ContactDBA extends DBA
{
    protected const TABLE = 'contact';
    protected const CTOKEN  = 'token';
    protected const FSTNAME = 'firstname';
    protected const LSTNAME = 'lastname';
    protected const MOBILE = 'mobile';
    protected const GENDER = 'gender';
    protected const CITY = 'city';
    protected const WHTSPP = 'whatsapp';
    protected const OFFICE = 'office';



    static protected function _toBean(?Contact $contact): ?Contact
    {
        if (!$contact instanceof Contact)
            return null;

        if (!$contact->getCity() instanceof City)
            return null;
        


        $bean = ($update = (int)$contact->getId() > 0)
            ? R::loadForUpdate(self::TABLE, $contact->getId())
            : R::dispense(self::TABLE);


        if (!$bean instanceof OODBBean)
            return null;

        if (!$update){
            $bean->{self::CTOKEN} = (int)self::_shortToken(self::TABLE);
        }
        $bean->{self::FSTNAME} = QString::_set(QString::_latin($contact->getFirstname()));
        $bean->{self::LSTNAME} = QString::_set(QString::_latin($contact->getLastname()));
        $bean->{self::MOBILE} = (int)($contact->getMobile());
        $bean->{self::GENDER} = QString::_set(QString::_latin($contact->getGender()));
        $bean->{self::CITY} = (int)$contact->getCity()->getId();
        $bean->{self::WHTSPP} = QString::_set(QString::_latin($contact->getWhatsapp()));
        $bean->{self::OFFICE} = QString::_set(QString::_latin($contact->getOffice()));




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
        $vars[self::GENDER],
        $vars[self::FSTNAME],
        $vars[self::LSTNAME],
        City::_get(Criteria::ID, (int)$vars[self::CITY]), 
        $vars[self::MOBILE],    
        $vars[self::WHTSPP],
        $vars[self::OFFICE],
          );
}


   
}
