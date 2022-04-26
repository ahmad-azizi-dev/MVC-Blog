<?php

namespace Database;


class QueryHandler
{

    public static function run(\PDO $pdoConn, string $directory): void
    {
        try {
            foreach (self::getFiles($directory) as $file) {
                $pdoConn->exec(self::getQuery($directory, $file));
            }
        } catch (\Throwable $e) {
            echo "Failed: " . $e->getMessage();
        }
    }

    /**
     *  Get and sort all the files names in directory.
     */
    private static function getFiles(string $directory): array
    {
        foreach (scandir(__ROOT__ . $directory) as $value) {
            if ($value != '.' && $value != '..')
                $filesNames[substr($value, strpos($value, "_") + 1)] = $value;
        }
        Ksort($filesNames);
        return $filesNames;
    }


    private static function getQuery(string $directory, string $file): string
    {
        $directory = array_map('ucfirst', explode('/', trim($directory, '/')));
        return substr(implode('\\', $directory) . '\\' . $file, 0, -4)::query();
    }

}