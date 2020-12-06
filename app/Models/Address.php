<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{


    /**
     * @var array
     */
    protected $fillable = [
        'Latitude', 'Longitude'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('app\Models\Company');
    }
}
