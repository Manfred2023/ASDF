<?php
// Created by Manfred MOUKATE on 4/4/24, 2:19 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/4/24, 2:19 PM

use RedBeanPHP\OODBBean;

class StatutDBA extends DBA
{
    protected const TABLE = 'statut';
    protected const CTOKEN    = 'token';
    protected const NAME = 'name';
    protected const REFRNC = 'reference';
    protected const COLOR = 'color';
    protected const ABSTRCT = 'abstract';

    static protected function _toBean(?Statut $statut): ?Statut
    {
        if (!$statut instanceof Statut)
            return null;

        $bean = ($update = (int)$statut->getId() > 0)
            ? R::loadForUpdate(self::TABLE, $statut->getId())
            : R::dispense(self::TABLE);

        if (!$bean instanceof OODBBean)
            return null;

        if (!$update){
            $bean->{self::CTOKEN} = (int)self::_shortToken(self::TABLE);
        }
        $bean->{self::NAME} = QString::_set(QString::_latin($statut->getName()));
        $bean->{self::REFRNC} = QString::_set(QString::_latin($statut->getReference()));
        $bean->{self::COLOR} =  $statut->getColor();
        $bean->{self::ABSTRCT} = QString::_set(QString::_latin($statut->getAbstract()));

        if (($lastID = (int)R::store($bean)) > 0)
            return self::_toObject(R::load(self::TABLE, $lastID));

        return null;
    }

    static protected function _toObject(?OODBBean $bean): ?Statut
    {
        if (!$bean instanceof OODBBean || $bean->isEmpty())
            return null;

        $vars = $bean->export();

        return new Statut(
            $vars[self::CID],
            $vars[self::CTOKEN],
            $vars[self::NAME],
            $vars[self::REFRNC],
            $vars[self::COLOR],
            $vars[self::ABSTRCT],

        );
    }
}