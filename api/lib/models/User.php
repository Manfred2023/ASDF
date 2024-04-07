<?php
// Created by Manfred MOUKATE on 4/3/24, 2:15 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:15 PM

class User extends UserDBA
{
    private ?int $id;
    private ?string $token;
    private string $email;
    private string $password; 
    private ?Contact $contact;
    private ?Profile $profile;
    private bool $statut; 

    /**
     * @param int|null $id
     * @param string|null $token
     * @param string $email
     * @param string $password
     * @param Contact|null $contact
     * @param Profile|null $profile
     * @param bool $statut 
     */
    public function __construct(?int $id, ?string $token, string $email, string $password, ?Contact $contact, ?Profile $profile, bool $statut )
    {
        $this->id = $id;
        $this->token = $token;
        $this->email = $email;
        $this->password = $password;
        $this->contact = $contact;
        $this->profile = $profile;
        $this->statut = $statut; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): void
    {
        $this->profile = $profile;
    }

    public function isStatut(): bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): void
    {
        $this->statut = $statut;
    }

    

    private function isObligatory(): bool
    {
        if (QString::_isNull($this->email))
            throw new Exception('email_is_required');

        if (QString::_isNull($this->password))
            throw new Exception('password_is_required');

        return true;
    }

    // public function save(): ?User
    // {
    //     if ($this->isObligatory())
    //         return self::_toBean($this);
    //     return null;
    // }

    public function save()
    {
        return UserDBA::_toBean($this);
    }

    public function delete(): bool
    {
        if ($this->isObligatory()) {
            parent::_toTrash(self::TABLE, $this->id);
            return true;
        }
        return false;
    }

    public function toArray(): array
    {
        $userArray = [
            self::TOKEN => (int)$this->token,
            self::EMAIL => QString::_get($this->email), 
            self::STATUT => QString::_get($this->statut),
        ];
        if ($this->contact instanceof Contact) {
            $userArray[self::CONTACT] = $this->contact->toArray();
        } 
        if ($this->profile instanceof Profile) {
            $userArray[self::PROFIL] = $this->profile->toArray();
        } 

        return $userArray;
    }



    static public function _get(int $criteria, $value): ?User
    {
        return match (true) {
            $criteria == Criteria::ID && (int)$value > 0 => self::_toObject(parent::_getOne(self::TABLE, [parent::CID => (int)$value])),
            $criteria == Criteria::TOKEN && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::CTOKEN => trim($value)])),
            $criteria == Criteria::EMAIL && !QString::_isNull($value) => self::_toObject(self::_findByEmail(trim($value))),
            default => null
        };
    }

    static public function _getByToken(int $token): ?User
    {
        $user = R::findOne('users', 'token = ?', [$token]);

        if ($user instanceof RedBeanPHP\OODBBean) {
            $item = self::_toObject($user);

            if ($item instanceof self) {
                return $item;
            }
        }

        return null;
    }
    // to bean
    static public function getUserToken($contactView): array    
    {
        $contactlist = [];  
    
        foreach ($contactView as $contact) {
            $user = User::_get(Criteria::TOKEN, (int)$contact);
            if ($user) {
                $contactlist[] = $user->toArray();
            }
        }
    
        return $contactlist;
    }
    

    static public function splitArrayToString($array) {
        return implode(',', $array);
    }
    static public function setUserToken(array $contactView): string    
    {
        return $contactlist = User::splitArrayToString($contactView);
    }
    static public function unsplitArrayToString($string) {
        return explode(',', $string);
    }
    static public function parseContactsToken($contactTokenString): array
    {
        $contactIds = explode(',', $contactTokenString);
        $contacts = [];
    
        foreach ($contactIds as $contactId) {
            $user = User::_get(Criteria::TOKEN, $contactId);
            if ($user) {
                $contacts[] = $user->toArray();
            }
        }
    
        return $contacts;
    }
    

    /**
     * @return User[]
     */
    static public function _list(): ?array
    {
        if (!empty($beans = parent::_getAll(self::TABLE, []))) {
            foreach ($beans as $bean)
                if (($item = self::_toObject($bean)) instanceof self)
                    $user[] = $item;
        }
        return $user ?? null;
    }

    static public function isEmailFormatValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }



    static public function _getByID(int $id): ?self
    {
        $user = R::findOne('users', 'contact = ?', [$id]);

        if ($user instanceof RedBeanPHP\OODBBean) {
            $item = self::_toObject($user);

            if ($item instanceof self) {
                return $item;
            }
        }

        return null;
    }

    static public function checkEmail(string $email): ?string
    {
        $bean = R::findOne(self::TABLE, 'email = ?', [trim($email)]);

        if ($bean instanceof RedBeanPHP\OODBBean) {
            $user = self::_toObject($bean);
            if ($user instanceof self) {
                Reply::_error("This email is already in use");
            }
        }
        return false;
    }
    
}
