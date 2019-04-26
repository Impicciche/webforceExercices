<?php
namespace Model;

class Role
{
    public const ROLE_USER = 'ROLE_USER';

    public const ROLE_ADMIN = 'ROLE_ADMIN';

    private $id;

    protected $label;

    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }
}
