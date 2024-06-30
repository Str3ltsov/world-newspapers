<?php

namespace App\Enums;

enum CountryTypes: int
{
    const REGION_TYPE = 1;
    const COUNTRY_TYPE = 2;
    const STATE_TYPE = 3;
    const COUNTRY_IN_COUNTRY_TYPE = 4;
}
