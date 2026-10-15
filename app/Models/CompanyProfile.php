<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'rfc',
        'industry',
        'employee_range',
        'phone',
        'address',
        'city',
        'state',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
