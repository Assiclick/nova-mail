<?php

namespace KirschbaumDevelopment\NovaMail\Models;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class NovaMailTemplate extends Model implements HasMedia
{
    use HasMediaTrait;

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

    public function registerMediaCollections()
    {
        $this->addMediaCollection('mail-templates')
             ->useDisk('mailTemplatesDocuments');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('preview')
            ->width(300)
            ->optimize()
            ->nonQueued();
    }
}
