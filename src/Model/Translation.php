<?php

namespace App\Model;

class Translation
{

    public int $id;
    public string $english;
    public string $elvish;

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
}