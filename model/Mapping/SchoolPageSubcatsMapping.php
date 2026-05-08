<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPageSubcatsMapping extends AbstractMapping
{
    public int $subcat_id;
    public int $subcat_parent;
    public string $subcat_name;
    public bool $subcat_active;

    public function getSubcatId(): int
    {
        return $this->subcat_id;
    }

    public function setSubcatId(int $subcat_id): void
    {
        $this->subcat_id = $subcat_id;
    }

    public function getSubcatParent(): int
    {
        return $this->subcat_parent;
    }

    public function setSubcatParent(int $subcat_parent): void
    {
        $this->subcat_parent = $subcat_parent;
    }

    public function getSubcatName(): string
    {
        return $this->subcat_name;
    }

    public function setSubcatName(string $subcat_name): void
    {
        $this->subcat_name = $subcat_name;
    }

    public function isSubcatActive(): bool
    {
        return $this->subcat_active;
    }

    public function setSubcatActive(bool $subcat_active): void
    {
        $this->subcat_active = $subcat_active;
    }


}