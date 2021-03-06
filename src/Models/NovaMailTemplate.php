<?php

namespace KirschbaumDevelopment\NovaMail\Models;

use Illuminate\Database\Eloquent\Model;

class NovaMailTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subject',
        'content',
    ];

    /**
     * Get the mail template's mails.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mails()
    {
        return $this->hasMany(NovaSentMail::class);
    }
}
