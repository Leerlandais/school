<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolUsersMapping extends AbstractMapping
{
    protected int $user_id;
    protected string $user_name;
    protected string $user_pass;
    protected string $user_role;

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): void
    {
        $this->user_name = $user_name;
    }

    public function getUserPass(): string
    {
        return $this->user_pass;
    }

    public function setUserPass(string $user_pass): void
    {
        $this->user_pass = $user_pass;
    }

    public function getUserRole(): string
    {
        return $this->user_role;
    }

    public function setUserRole(string $user_role): void
    {
        $this->user_role = $user_role;
    }



}