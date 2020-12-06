<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{


    /**
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'title', 'email', 'phone'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('app\Models\Company');
    }

}
