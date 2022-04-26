<?php

namespace App\Core;


/**
 *  Template method pattern.
 */
abstract class BaseController
{

    public function action(string $methodName): void
    {
        $this->before();
        call_user_func([$this, $methodName]);
        $this->after();
    }

    /**
     *   Called before an action method.
     */
    protected function before(): void
    {

    }


    protected function after(): void
    {

    }

}