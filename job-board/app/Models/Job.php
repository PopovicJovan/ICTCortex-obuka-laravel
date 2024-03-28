<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['Entry', 'Intermediate', 'Senior'];
    public static array $category = ['IT', 'Marketing', 'Finance', 'Sales'];
}
