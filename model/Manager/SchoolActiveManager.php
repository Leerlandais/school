<?php

namespace model\Manager;

use model\Abstract\AbstractManager;

class SchoolActiveManager extends AbstractManager
{
    public function checkIfActive() : bool
    {
        $query = $this->db->query("SELECT `school_active_state` FROM school_active");
        $row = $query->fetch();
        return $row["school_active_state"] === 1;
    }

    public function toggleSiteState() : void
    {
        $query = $this->db->prepare("UPDATE school_active SET school_active_state = NOT school_active_state WHERE `school_active_id` = 1");
        $query->execute();
    }
}