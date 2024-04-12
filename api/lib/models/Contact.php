<?php
// Created by Manfred MOUKATE on 4/3/24, 2:14 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:14 PM

/* use RedBeanPHP\RedException\SQL; */

use RedBeanPHP\OODBBean;

class Contact extends ContactDBA
{
    private ?int $id;
    private ?int $token;
    private string $gender;
    private ?string $firstname;
    private string $lastname; 
    private City $city; 
    private string $mobile; 
    private ?string $whatsapp; 
    private ?string $office;
    private ?array $authorization;

    /**
     * @param int|null $id
     * @param int|null $token
     * @param string $gender
     * @param string|null $firstname
     * @param string $lastname
     * @param City $city
     * @param string $mobile
     * @param string|null $whatsapp
     * @param string|null $office

     */
    public function __construct(?int $id, ?int $token, string $gender, ?string $firstname, string $lastname, City $city, string $mobile, ?string $whatsapp, ?string $office,  )
    {
        $this->id = $id;
        $this->token = $token;
        $this->gender = $gender;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->city = $city;
        $this->mobile = $mobile;
        $this->whatsapp = $whatsapp;
        $this->office = $office;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?int
    {
        return $this->token;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }
    public function getWhatsapp(): ?string
    {
        return $this->whatsapp;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getCity(): ?City
    {
        return $this->city;
    } 
    public function getOffice(): string
    {
        return $this->office;
    } 


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setToken(int $token): void
    {
        $this->token = $token;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setMobile(int $mobile): void
    {
        $this->mobile = $mobile;
    }

    public function setwhatsapp(int $whatsapp): void
    {
        $this->whatsapp = $whatsapp;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function setCity(?City $city): void
    {
        $this->city = $city;
    } 
    public function setoffice(?string $office): void
    {
        $this->office = $office;
    } 
   
    private function isOK(): bool
    {
        if (!$this->city instanceof City)
            throw new Exception("Enter city name ");
 
        return true;
    }
    public function save(): ?Contact
    {
        if ($this->isOK())
            return self::_toBean($this);
        return null;
    }
    public function toArray(): ?array
    {
        return [
            TOKEN => ($this->token),
            FSTNAME => QString::_get($this->firstname),
            LSTNAME => QString::_get($this->lastname),
            GENDER => QString::_get($this->gender),
            CITY => $this->city instanceof City ? $this->city->toArray() : null, 
            MOBILE => QString::_get($this->mobile),
            WHTSPP => QString::_get($this->whatsapp),
            OFFICE => QString::_get($this-> office),
        ];
    }
    static public function _get(int $criteria, $value): ?Contact
    {
        return match (true) {
            $criteria == Criteria::ID && (int)$value > 0 => self::_toObject(parent::_getOne(self::TABLE, [parent::CID => (int)$value])),
            $criteria == Criteria::TOKEN && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::CTOKEN => trim($value)])),
            $criteria == Criteria::MOBILE && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::MOBILE => trim($value)])),
            default => null,
        };
    }
    static public function _list(): ?array
    {
        if (!empty($beans = parent::_getAll(self::TABLE, []))) {
            foreach ($beans as $bean)
                if (($item = self::_toObject($bean)) instanceof self)
                    $contacts[] = $item;
        }
        return $contacts ?? null;
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
    static public function getContactByToken(string $token): ?array
    {
        $bean = R::findOne(self::TABLE, 'token = ?', [$token]);

        if ($bean instanceof RedBeanPHP\OODBBean) {
            $contact = self::_toObject($bean);
            if ($contact instanceof self) {
                return $contact->toArray();
            }
        }
        return false;
    }
    function isEmailFormatValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    public function getContacts()
    {
        $contacts = R::findAll('contact');
        return $contacts;
    }

    static public function checkNumber(string $mobile): ?string
    {
        $bean = R::findOne(self::TABLE, 'mobile = ?', [$mobile]);

        if ($bean instanceof RedBeanPHP\OODBBean) {
            $contact = self::_toObject($bean);
            if ($contact instanceof self) {
                Reply::_error("This number is already in use");
            }
        }
        return false;
    }
   
    
}