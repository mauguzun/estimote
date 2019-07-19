<?php

/**
 * @param int $length
 * @return string
 * @throws Exception
 */
function generateTokenKey(int $length = 16) {
    return bin2hex(random_bytes($length));
}