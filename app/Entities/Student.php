<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Class Dungeon
 *
 * This class represents a single row in the
 * `dungeons` database.
 *
 * @package App\Entities
 */

class Student extends Entity
{
    /**
     * Entities are the perfect place for
     * convenience methods made to describe
     * a single instance.
     *
     * @return string
     */
    public function name()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
