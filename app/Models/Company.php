<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


    /**
     * @var array
     */
    protected $fillable = [
        'company_name', 'web_site', 'html'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany('app\Models\People');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function address()
    {
        return $this->hasMany('app\Models\Address');
    }
}
