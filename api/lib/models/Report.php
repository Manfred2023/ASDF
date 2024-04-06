<?php
// Created by Manfred MOUKATE on 4/5/24, 4:46 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/5/24, 4:46 PM

class Report extends ReportDBA
{
    private ?int $id;
    private ?int $token;
    private string $title;
    private $file;
    private User $user;
    private Project $project;

    /**
     * @param int|null $id
     * @param int|null $token
     * @param string $title
     * @param $file
     * @param User $user
     * @param Project $project
     */
    public function __construct(?int $id, ?int $token, string $title, $file, User $user, Project $project)
    {
        $this->id = $id;
        $this->token = $token;
        $this->title = $title;
        $this->file = $file;
        $this->user = $user;
        $this->project = $project;
    }

    /**
     * @param int|null $id
     * @param int|null $token
     * @param string $title
     * @param $file
     * @param User $user
     * @param Project $project
     */


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): void
    {
        $this->project = $project;
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

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    private function isOK(): bool
    {
        if (!$this->user instanceof User)
            throw new Exception("Enter user name ");
        if (!$this->project instanceof Project)
            throw new Exception("Enter project name ");

        return true;
    }
    public function save(): ?Report
    {
        if ($this->isOK())
            return self::_toBean($this);
        return null;
    }
    public function toArray(): ?array
    {
        return [
            TOKEN => ($this->token),
            TITLE => QString::_get($this->firstname),

            GENDER => QString::_get($this->gender),
            CITY => $this->city instanceof City ? $this->city->toArray() : null,
            MOBILE => QString::_get($this->mobile),
            WHTSPP => QString::_get($this->whatsapp),
            OFFICE => QString::_get($this-> office),
        ];
    }
    static public function _get(int $criteria, $value): ?Report
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
                    $reports[] = $item->toArray();
        }
        return $reports ?? null;
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