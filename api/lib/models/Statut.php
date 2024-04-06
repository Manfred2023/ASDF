<?php
// Created by Manfred MOUKATE on 4/4/24, 1:45 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/4/24, 1:45 PM

class Statut extends  StatutDBA
{
    private ?int $id;
    private ?int $token;
    private String $name;
    private String $reference;
    private ?String $color;
    private ?String $abstract;

    /**
     * @param int|null $id
     * @param int|null $token
     * @param string $name
     * @param string $reference
     * @param string|null $color
     * @param string |null $abstract
     */
    public function __construct(?int $id, ?int $token, string $name, string $reference, ?string $color, ?string $abstract)
    {
        $this->id = $id;
        $this->token = $token;
        $this->name = $name;
        $this->reference = $reference;
        $this->color = $color;
        $this->abstract = $abstract;
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

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): void
    {
        $this->abstract = $abstract;
    }

    static public function _get(int $criteria, $value): ?Statut
    {
        return match (true) {
            $criteria == Criteria::ID && (int)$value > 0 => self::_toObject(parent::_getOne(self::TABLE, [parent::CID => (int)$value])),
            $criteria == Criteria::TOKEN && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::CTOKEN => trim($value)])),
            $criteria == Criteria::NAME && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::NAME => trim($value)])),
            default => null,
        };
    }

    private function isOK(): bool
    {
        return true;
    }
    public function save(): ?Statut
    {
        if ($this->isOK())
            return self::_toBean($this);
        return null;
    }
    public function toArray(): ?array
    {
        return [
            TOKEN => ($this->token),
            NAME => QString::_get($this->name),
            REFRNC => QString::_get($this->reference),
            COLOR => QString::_get($this->color),
            ABSTRCT => QString::_get($this->abstract),

        ];
    }

    static public function _list(): ?array
    {
        if (!empty($beans = parent::_getAll(self::TABLE, []))) {
            foreach ($beans as $bean)
                if (($item = self::_toObject($bean)) instanceof self)
                    $statuts[] = $item->toArray();
        }
        return $statuts ?? null;
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

    static public function checkStatut(string $name): ?string
    {
        $bean = R::findOne(self::TABLE, 'name = ?', [$name]);

        if ($bean instanceof RedBeanPHP\OODBBean) {
            $statut = self::_toObject($bean);
            if ($statut instanceof self) {
                Reply::_error("This statut is already in use");
            }
        }
        return false;
    }
}