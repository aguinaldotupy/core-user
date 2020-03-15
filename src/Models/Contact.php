<?php

namespace Tupy\Contacts\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Contact.
 * @package Tupy\Contacts\Models
 * @property int $id
 * @property string $value
 * @property string|null $note
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'contactable_type', 'contactable_id', 'value', 'note', 'type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function conctatable() :MorphTo
    {
        return $this->morphTo();
    }
}
