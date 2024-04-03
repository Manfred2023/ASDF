<?php
// Created by Manfred MOUKATE on 4/3/24, 2:45 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:45 PM

class Authorization extends AuthorizationDBA
{
    private ?int $id;
    private ?int $token;
    private string $name;
    private ?string $resume;

    /**
     * @param int|null $id
     * @param int|null $token
     * @param string $name
     * @param string|null $resume
     */
    public function __construct(?int $id, ?int $token, string $name, ?string $resume)
    {
        $this->id = $id;
        $this->token = $token;
        $this->name = $name;
        $this->resume = $resume;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getToken(): ?int
    {
        return $this->token;
    }

    public function setToken(?int $token): void
    {
        $this->token = $token;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): void
    {
        $this->resume = $resume;
    }

    private function isOK(): bool
    {
        return true;
    }
    public function save(): ?Authorization
    {
        if ($this->isOK())
            return self::_toBean($this);
        return null;
    }
    public function toArray(): ?array
    {
        return [
            TOKEN => ($this->token),
            self::NAME=> QString::_get($this->name),
            self::RESUME => QString::_get($this->resume),
        ];
    }
    static public function _get(int $criteria, $value): ?Authorization
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
                    $authorization[] = $item->toArray();
        }
        return $authorization ?? null;
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
}