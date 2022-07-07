<?php

declare(strict_types=1);

namespace App\Kernel\Eloquent\Models;

use App\Kernel\Eloquent\Models\Concerns\HasOverrites;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class User extends Authenticatable
{
    use HasOverrites;
    use HasFactory;
}
