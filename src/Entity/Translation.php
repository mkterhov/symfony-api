<?php

namespace App\Entity;

class Translation
{
    protected int $id;
    protected string $english;
    protected string $elvish;

    public function __construct(int $id, string $elvish, string $english)
    {
        $this->id = $id;
        $this->english = $english;
        $this->elvish = $elvish;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEnglish(): string
    {
        return $this->english;
    }

    public function setEnglish(string $english): void
    {
        $this->english = $english;
    }

    public function getElvish(): string
    {
        return $this->elvish;
    }

    public function setElvish(string $elvish): void
    {
        $this->elvish = $elvish;
    }
}
