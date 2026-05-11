<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolTagsMapping;

class SchoolTagsManager extends AbstractManager
{
    public function getAllTags() : ?array
    {
        $query = $this->db->query("SELECT * FROM school_tags");
        $tags = [];
        while ($row = $query->fetch()) {
            $tags[] = new SchoolTagsMapping($row);
        }
        if(empty($tags)) return null;
        return $tags;
    }
}