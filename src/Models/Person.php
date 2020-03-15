<?php

namespace Tupy\Contacts\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Tupy\Contacts\Traits\HasContacts;

/**
 * Class People.
 * @package Tupy\Contacts\Models
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $additional
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Person extends Model
{
    use HasContacts;

    protected $table = 'people';

    protected $fillable = [
        'name', 'job_role', 'observations', 'additional',
    ];

    protected $with = ['contacts'];

    public function peopleable()
    {
        return $this->morphTo();
    }
}
