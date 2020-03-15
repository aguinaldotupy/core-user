<?php

namespace Tupy\Contacts\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Tupy\Contacts\Models\Contact;

trait HasContacts
{
    /**
     * @return mixed
     */
    public function contacts() :MorphMany
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function contact() :MorphOne
    {
        return $this->morphOne(Contact::class, 'contactable');
    }
}
