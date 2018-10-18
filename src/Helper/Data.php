<?php

namespace Careem\Helper;

class Data
{

    public static function merge(array $files, ?string $savePath = null) : array
    {
        $data = [];


        foreach ($files as $file)
        {
            if (!file_exists($file)) {
                throw new \FileNotFoundException($file);
            }


            $data = array_merge(
                $data,
                json_decode(
                    file_get_contents($file),
                    true
                )['data']
            );
        }

        if (!is_null($savePath)) {
            file_put_contents(
                $savePath,
                json_encode($data)
            );
        }

        return $data;
    }
}