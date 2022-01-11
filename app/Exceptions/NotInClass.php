<?php

namespace App\Exceptions;

use Exception;

class NotInClass extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('User id is not in this class');
    }

    public function render($request)
    {
        return response()->view('errors.notInClass');
    }
}
