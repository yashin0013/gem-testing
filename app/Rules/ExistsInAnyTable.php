<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Gem;
use App\Models\Diamond;
use App\Models\Jewellery;
use App\Models\Rudraksha;

class ExistsInAnyTable implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the ID exists in any of the four tables
        return false;
    }

    public function message()
    {
        return 'Please Enter Valid Report Number.';
    }
}