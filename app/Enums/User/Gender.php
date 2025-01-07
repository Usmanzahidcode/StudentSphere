<?php

namespace App\Enums\User;

enum Gender: string
{
    case MALE = "male";
    case FEMALE = "female";
    case RATHER_NOT_SAY = "rather_not_say";
}
