<?php

namespace App\Enums;

enum UserRole: int
{
    case Employee = 1;
    case JobSeeker = 2;

    public function getLabel(): string
    {
        return match ($this) {
            static::Employee => 'Employee',
            static::JobSeeker => 'Job seeker',
        };
    }
}
