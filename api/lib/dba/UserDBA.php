<?php
// Created by Manfred MOUKATE on 4/3/24, 2:13 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:13 PM

use RedBeanPHP\OODBBean;

abstract class UserDBA extends DBA
{
    protected const TABLE = 'users';
    protected const TOKEN = 'token';
    protected const EMAIL = 'email';
    protected const PASSWORD = 'password';
    protected const CONTACT = 'contact'; 
    protected const PROFIL = 'profil';
    protected const STATUT = 'statut';
    protected const AUTHRZTN = 'authorization';

    

static protected function _toBean(?User $user): ?User
    {
        if (!$user instanceof User)
            return null;

        $bean = ($update = (int)$user->getId() > 0)
            ? R::loadForUpdate(self::TABLE, $user->getId())
            : R::dispense(self::TABLE);

        if (!$bean instanceof OODBBean)
            return null;

        if (!$update)
            $bean->{self::TOKEN} = self::_shortToken();
        $bean->{self::EMAIL} = QString::_set($user->getEmail());
        $bean->{self::PASSWORD} = QString::_set($user->getPassword());   
        $bean->{self::CONTACT} = (int)$user->getContact()->getId(); 
        $bean->{self::PROFIL} = (int)$user->getProfile()->getId(); 
        $bean->{self::STATUT} = QString::_set($user->isStatut());
        $bean->{self::AUTHRZTN} = $user->getAuthorization();

        if (R::store($bean) === 0)
            return null;

        $user->setId((int)$bean->id);
        $user->setToken((string)$bean->{self::TOKEN});

        return $user;
    }
    static protected function _toObject(?OODBBean $bean): ?User
    {
        if (!$bean instanceof OODBBean)
            return null;

        $contact = null; 

        if ($bean->{self::CONTACT} !== null)
            $contact = Contact::_get(Criteria::ID, $bean->{self::CONTACT});
        if ($bean->{self::PROFIL} !== null)
            $profil = Profile::_get(Criteria::ID, $bean->{self::PROFIL});

        return new User(
            (int)$bean->id,
            (string)$bean->{self::TOKEN},
            (string)$bean->{self::EMAIL},
            (string)$bean->{self::PASSWORD},
            $contact,
            $profil,
            (bool)$bean->{self::STATUT},
            (array)$bean->{self::AUTHRZTN},
        );
    }
    static protected function _findByEmail(?string $email): ?OODBBean
    {
        if (QString::_isNull($email))
            return null;
        return R::findOne(self::TABLE, " LOWER(`" . self::EMAIL . "`) LIKE '" . strtolower($email) . "%'");
    }

    

}