<?php
/**
 * Created by PhpStorm.
 * User: bartl
 * Date: 03/04/2017
 * Time: 10:11
 */

namespace App\Services;


class MetaWhitelistService
{

    const WHITELIST = ['title', 'description', 'creator'];

    /**
     * @param array $meta
     * @param array $whitelist
     * @return array
     */
    public static function filterMetaAgainstWhiteList($meta, array $whitelist = self::WHITELIST): array
    {
        if (empty($meta)) {
            return [];
        }

        return array_filter($meta, function ($key) use ($whitelist) {
            return in_array($key, $whitelist, true);
        }, ARRAY_FILTER_USE_KEY);
    }


}