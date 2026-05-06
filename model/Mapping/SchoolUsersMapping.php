<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolUsersMapping extends AbstractMapping
{
    protected int $user_id {
        get => $user_id;
        set => $user_id = $value;
    }

    protected string $user_name {
        get => $user_name;
        set => $user_name = $value;
    }

    protected string $user_pass {
        get => $user_pass;
        set => $user_pass = $value;
    }

    protected string $user_role {
        get => $user_role;
        set => $user_role = $value;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function getUserPass(): string
    {
        return $this->user_pass;
    }

    public function getUserRole(): string
    {
        return $this->user_role;
    }


}