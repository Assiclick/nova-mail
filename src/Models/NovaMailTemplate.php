<?php

namespace KirschbaumDevelopment\NovaMail\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NovaMailTemplate extends Model implements HasMedia
{
    use InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('mail-templates')
             ->useDisk('mailTemplatesDocuments');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(300)
            ->optimize()
            ->nonQueued();
    }
}
