<?php
// Created by Manfred MOUKATE on 4/4/24, 1:12 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/4/24, 1:12 PM

use RedBeanPHP\OODBBean;

class ProjectDBA extends DBA
{
    protected const TABLE = 'project';
    protected const TOKEN  = 'token';
    protected const DATETIME = 'date';
    protected const TITLE = 'title';
    protected const OBJCTV = 'objective';
    protected const PARTCPNT = 'participant';
    protected const COMMENT = 'comment';
    protected const STATUT = 'statut';
    protected const CITY = 'city';

    static protected function _toBean(?Project $project): ?Project
    {
        if (!$project instanceof Project)
            return null;
        if (!$project->getCity() instanceof City)
            return null;
        if (!$project->getStatut() instanceof Statut)
            return null;

        $bean = ($update = (int)$project->getId() > 0)
            ? R::loadForUpdate(self::TABLE, $project->getId())
            : R::dispense(self::TABLE);

        if (!$bean instanceof OODBBean)
            return null;
        if (!$update){
            $bean->{self::CTOKEN} = (int)self::_shortToken(self::TABLE);
        }
        $bean->{self::DATETIME} =  $project->getLaunch() ;
        $bean->{self::TITLE} = QString::_set(QString::_latin($project->getTitle()));
        $bean->{self::OBJCTV} = (int)($project->getObjective());
        $bean->{self::PARTCPNT} = User::getContactToken($project->getParticipant());
        $bean->{self::CITY} = $project->getCity()->getId();
        $bean->{self::COMMENT} = QString::_set(QString::_latin($project->getComment()));
        $bean->{self::STATUT} = $project->getStatut()->getId();

        if (($lastID = (int)R::store($bean)) > 0)
            return self::_toObject(R::load(self::TABLE, $lastID));

        return null;
    }

    static protected function _toObject(?OODBBean $bean): ?Project
    {
        if (!$bean instanceof OODBBean || $bean->isEmpty())
            return null;

        $vars = $bean->export();

        return new Project(
            $vars[self::CID],
            $vars[self::CTOKEN],
            $vars[self::TITLE],
            $vars[self::OBJCTV],
            $vars[self::COMMENT],
            User::parseContactsToken($vars[self::PARTCPNT]),
            $vars[self::DATETIME],
            City::_get(Criteria::ID, (int)$vars[self::CITY]),
            Statut::_get(Criteria::ID, (int)$vars[self::STATUT])
        ,
        );
    }
}