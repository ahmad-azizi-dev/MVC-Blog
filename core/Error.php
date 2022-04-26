<?php

namespace App\Core;


class Error
{
    /**
     *  Convert all errors to Exceptions.
     */
    public static function errorHandler(int $level, string $message, string $file, int $line): void
    {
        throw new \ErrorException($message, 500, $level, $file, $line);
    }


    public static function exceptionHandler(\Throwable $exception)
    {
        $code = $exception->getCode();

        if ($code == 0) {
            $code = 500;  // (general error)
        }

        echo "<h1>Fatal error</h1>";
        echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
        echo "<p>Error Code: '" . $code . "'</p>";
        echo "<p>Message: '" . $exception->getMessage() . "'</p>";
        echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
        echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        die();
    }

}