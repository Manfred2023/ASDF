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



}