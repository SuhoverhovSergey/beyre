<?php

if (! function_exists('array_key_map')) {
    /**
     * @param array $array
     * @param array $keyMap
     * @return array
     */
    function array_key_map(array $array, array $keyMap)
    {
        foreach ($keyMap as $oldKey => $newKey) {
            if (isset($array[$oldKey])) {
                $array[$newKey] = $array[$oldKey];
                unset($array[$oldKey]);
            }
        }

        return $array;
    }
}