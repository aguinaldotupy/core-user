<?php

namespace Tupy\Contacts;

use Illuminate\Support\Facades\Facade;

/**
 * Class ContactsFacade.
 * @package Tupy\Contacts
 */
class ContactsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'contacts';
    }
}
