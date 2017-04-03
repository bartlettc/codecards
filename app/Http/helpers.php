<?php

/**
 * Removes the @ symbol in a twitter username if it has one
 *
 * @param string $handle
 * @return string
 */
function removeAtSymbol(string $handle): string
{
    if (!$handle[0] === '@') {
        return $handle;
    }

    return substr($handle, 1);
}