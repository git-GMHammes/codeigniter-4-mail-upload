<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter Consumo de APIs

if (!function_exists('myEndPoint')) {
    function myEndPoint($uri = NULL)
    {
        try {
            $uri = base_url() . $uri;
            $APIform = \Config\Services::curlrequest();
            $requestAPIform = $APIform->request('GET', $uri);
            $requestJSONform = json_decode($requestAPIform->getBody(), true); // true para exibir em array
            return $requestJSONform;
        } catch (\Exception $e) {
            $systemReport['danger'] = $e->getMessage();
            myPrint($uri, true);
            myPrint($systemReport, true);
            return $systemReport;
        }
    }
}

// CodeIgniter Libera Sistema

if (!function_exists('releaseAccess')) {
    function releaseAccess($token = FALSE, $getSession = FALSE)
    {
        if ($token == TRUE && $getSession == TRUE) {
            $releaseAccess = TRUE;
        } else {
            $releaseAccess = FALSE;
        }
        return $releaseAccess;
    }
}
