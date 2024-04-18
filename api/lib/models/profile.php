<?php
// Created by Manfred MOUKATE on 4/3/24, 2:15 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:15 PM

/* use RedBeanPHP\RedException\SQL; */

use RedBeanPHP\OODBBean;

class Profile extends ProfileDBA
{
    private ?int $id;
    private ?int $token;
    private string $name;
    private ?string $resume;
    private string $parent;
   
    
    public function __construct(
        ?int $id= null,
        ?int $token = NULL,  
        string $name = NULL, 
        ?string $resume = NULL,
        string $parent = NULL,   )
    {
        $this->id = $id;
        $this->token = $token;
        $this->name = $name;
        $this->resume = $resume;
        $this->parent = $parent;     
     }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?int
    {
        return $this->token;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParent(): string
    {
        return $this->parent;
    }
    

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setToken(int $token): void
    {
        $this->token = $token;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    public function setParent(string $parent): void
    {
        $this->parent = $parent;
    }  
    private function isOK(): bool
    {
        
 
        return true;
    }

    public function save(): ?Profile
    {
        if ($this->isOK())
            return self::_toBean($this);
        return null;
    }

    public function toArray(): ?array
    {
        return [
            TOKEN => ($this->token),
            RESUME => QString::_get($this->resume),
            PARNT => QString::_get($this->parent),
            NAME => QString::_get($this->name), 
        ];
    }

    static public function _get(int $criteria, $value): ?Profile
    {
        return match (true) {
            $criteria == Criteria::ID && (int)$value > 0 => self::_toObject(parent::_getOne(self::TABLE, [parent::CID => (int)$value])),
            $criteria == Criteria::TOKEN && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::CTOKEN => trim($value)])),
            $criteria == Criteria::NAME && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::NAME => trim($value)])),
            default => null,
        };
    }

    
    static public function _list(): ?array
    {
        if (!empty($beans = parent::_getAll(self::TABLE, []))) {
            foreach ($beans as $bean)
                if (($item = self::_toObject($bean)) instanceof self)
                    $profile[] = $item;
        }
        return $profile ?? null;
    }



    private function isGood(): bool
    {
        if (is_null(trim($this->token)))
            throw new Exception('Token is required!');

        return true;
    }

    public function delete(): bool
    {
        if ($this->isGood()) {
            parent::_toTrash(self::TABLE, $this->id);
            return true;
        }
        return false;
    }
    static public function getProfileByToken(string $token): ?array
    {
        $bean = R::findOne(self::TABLE, 'token = ?', [$token]);

        if ($bean instanceof RedBeanPHP\OODBBean) {
            $profile = self::_toObject($bean);
            if ($profile instanceof self) {
                return $profile->toArray();
            }
        }
        return false;
    }
    function isEmailFormatValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    public function getProfile()
    {
        $profile = R::findAll('Profile');
        return $profile;
    }
    static public function checkName(string $name): ?string
    {
        $bean = R::findOne(self::TABLE, 'name = ?', [trim($name)]);

        if ($bean instanceof RedBeanPHP\OODBBean) {
            $profile = self::_toObject($bean);
            if ($profile instanceof self) {
                Reply::_error("This profiles is already create");
            }
        }
        return false;
    }
   
   
   
    
}