<?php
namespace App\Validation;

use Datetime;

class DobRules
{
    public function check_dob($str): bool
    {
        $from = new DateTime($str);
        $to = new DateTime('today');
        $age = $from->diff($to)->y;
        if ($age < 18 || $age > 30) {
            return false;
        }

        return true;
    }
}
