<?php
// Created by Manfred MOUKATE on 4/4/24, 1:13 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/4/24, 1:13 PM

class Project extends ProjectDBA
{
    private ?int $id;
    private ?int $token;
    private string $title;
    private string $objective;
    private ?string $comment;
    private array $participant;
    private datetime $launch;
    private City $city;
    private Statut $statut;

    /**
     * @param int|null $id
     * @param int|null $token
     * @param string $title
     * @param string $objective
     * @param string|null $comment
     * @param array $participant
     * @param datetime $launch
     * @param City $city
     * @param Statut $statut
     */
    public function __construct(?int $id, ?int $token, string $title, string $objective, ?string $comment, array $participant, datetime $launch, City $city, Statut $statut)
    {
        $this->id = $id;
        $this->token = $token;
        $this->title = $title;
        $this->objective = $objective;
        $this->comment = $comment;
        $this->participant = $participant;
        $this->launch = $launch;
        $this->city = $city;
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

    public function getToken(): ?int
    {
        return $this->token;
    }

    public function setToken(?int $token): void
    {
        $this->token = $token;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getObjective(): string
    {
        return $this->objective;
    }

    public function setObjective(string $objective): void
    {
        $this->objective = $objective;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function getParticipant(): array
    {
        return $this->participant;
    }

    public function setParticipant(array $participant): void
    {
        $this->participant = $participant;
    }

    public function getLaunch(): datetime
    {
        return $this->launch;
    }

    public function setLaunch(datetime $launch): void
    {
        $this->launch = $launch;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    public function getStatut(): Statut
    {
        return $this->statut;
    }

    public function setStatut(Statut $statut): void
    {
        $this->statut = $statut;
    }


    private function isOK(): bool
    {
        if (!$this->city instanceof City)
            throw new Exception("Enter city name ");

        return true;
    }
    public function save(): ?Project
    {
        if ($this->isOK())
            return self::_toBean($this);
        return null;
    }
    public function toArray(): ?array
    {
        return [
            self::TOKEN => ($this->token),
            self::TITLE => QString::_get($this->title),
            self::COMMENT => QString::_get($this->comment),
            self::OBJCTV => QString::_get($this->objective),
            self::PARTCPNT =>  $this->participant,
            self::DATETIME => $this->launch,
            self::CITY => $this->city instanceof City ? $this->city->toArray() : null,
            self::STATUT => $this->statut instanceof Statut ? $this->city->toArray() : null,

        ];
    }
    static public function _get(int $criteria, $value): ?Project
    {
        return match (true) {
            $criteria == Criteria::ID && (int)$value > 0 => self::_toObject(parent::_getOne(self::TABLE, [parent::CID => (int)$value])),
            $criteria == Criteria::TOKEN && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::CTOKEN => trim($value)])),
            $criteria == Criteria::TITLE && !QString::_isNull($value) => self::_toObject(parent::_getOne(self::TABLE, [parent::TITLE => trim($value)])),
            default => null,
        };
    }
    static public function _list(): ?array
    {
        if (!empty($beans = parent::_getAll(self::TABLE, []))) {
            foreach ($beans as $bean)
                if (($item = self::_toObject($bean)) instanceof self)
                    $projects[] = $item->toArray();
        }
        return $projects ?? null;
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