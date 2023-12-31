<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter Array Helpers C:\laragon\www\qse-qlik-sense\src\app\Helpers\myArray_helper.php

if (!function_exists('eagarScagaire')) {
    /**
     * Filtrar Array
     */
    function eagarScagaire($parameter = array())
    {
        if (isset($parameter['debug-bar-tab'])) {
            unset($parameter['debug-bar-tab']);
        }
        if (isset($parameter['debug-bar-state'])) {
            unset($parameter['debug-bar-state']);
        }
        if (isset($parameter['pma_lang'])) {
            unset($parameter['pma_lang']);
        }
        if (isset($parameter['ci_session'])) {
            unset($parameter['ci_session']);
        }
        if (isset($parameter['token'])) {
            unset($parameter['token']);
        }
        return $parameter;
    }
}
