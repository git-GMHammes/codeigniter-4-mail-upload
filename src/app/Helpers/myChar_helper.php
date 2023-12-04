<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter myChar Helpers

if (!function_exists('myChar')) {
    /**
     * Exibe um print e para o código
     */
    function myChar($string = NULL, $category = 1)
    {
        $remove_accent = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
        if ($category == 1) {
            # Remove caracter especial e retorna sem espaço
            $remove_character = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '@', '#', '$', '%', '¨', '&', '*', '(', ')', '_', '-', '+', '=', '{', '}', '[', ']', '^', '~', '/', '?', ':', ',', '.', '|', ' '), '', $remove_accent);
        }
        if ($category == 2) {
            # Remove caracter especial e retorna com espaço
            $remove_character = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '@', '#', '$', '%', '¨', '&', '*', '(', ')', '_', '-', '+', '=', '{', '}', '[', ']', '^', '~', '/', '?', ':', ',', '.', '|', ' '), ' ', $remove_accent);
        }
        if ($category == 3) {
            # Remove caracter especial e retorna uderline
            $remove_character1 = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '@', '#', '$', '%', '¨', '&', '*', '(', ')', '_',  '-', '+', '=', '{', '}', '[', ']', '^', '~', '/', '?', ':', ',', '.', '|', ' '), '_', $remove_accent);
            $remove_character = strtolower(str_replace(array('__'), '', $remove_character1));
        }
        if ($category == 4) {
            # Remove caracter especial e retorna com espaço
            $remove_character1 = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '@', '#', '$', '%', '¨', '&', '*', '(', ')', '_',  '-', '+', '=', '{', '}', '[', ']', '^', '~', '/', '?', ':', ',', '.', '|', ' '), '_', $remove_accent);
            $remove_character = strtolower(str_replace(array('__'), '_', $remove_character1));
        }
        return $remove_character;
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency dB Helpers

if (!function_exists('currency_db')) {
    /**
     * Exibe um print e para o código
     */
    function currency_db($paramenter = NULL)
    {
        $valor1 = str_replace('.', '', $paramenter);
        $valor2 = str_replace(',', '.', $valor1);
        return ($valor2);
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency formats Helpers

if (!function_exists('currency_formats')) {
    /**
     * Exibe um print e para o código
     */
    function currency_formats($paramenter = NULL)
    {
        $result = number_format($paramenter, 2, ',', '.');
        return $result;
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency formats Helpers

if (!function_exists('format_substr')) {
    /**
     * Encurta escritas
     */
    function format_substr($paramenter = NULL)
    {
        $qtd_paramenter = strlen($paramenter);
        $slice = round($qtd_paramenter / 2);
        $result = substr($paramenter, 0, -$slice);
        return $result;
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency formats Helpers

if (!function_exists('format_zero')) {
    /**
     * Encurta escritas
     */
    function format_zero_left($paramenter = NULL)
    {
        return str_pad($paramenter, 11, "0", STR_PAD_LEFT);
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency formats Helpers

if (!function_exists('format_cellphone')) {
    /**
     * Encurta escritas
     */
    function format_cellphone($paramenter = NULL)
    {
        if ($paramenter !== NULL) {
            $remove_accent = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $paramenter);
            $remove_character = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '@', '#', '$', '%', '¨', '&', '*', '(', ')', '_', '-', '+', '=', '{', '}', '[', ']', '^', '~', '/', '?', ':', ',', '.', '|', ' '), '', $remove_accent);
            $var = (int)$remove_character;
            if (strlen((string) $var) < 11 && strlen((string) $var) > 9) {
                $var_9 = substr_replace($var, '9', 2, 0);
                return $var_9;
            } elseif (strlen((string) $var) == 11) {
                return ($paramenter);
            }
        } else {
            return NULL;
        }
        return NULL;
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency formats Helpers

if (!function_exists('format_cellphone_55')) {
    /**
     * Encurta escritas
     */
    function format_cellphone_55($paramenter = NULL)
    {
        if ($paramenter !== NULL) {
            $remove_accent = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $paramenter);
            $remove_character = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '@', '#', '$', '%', '¨', '&', '*', '(', ')', '_', '-', '+', '=', '{', '}', '[', ']', '^', '~', '/', '?', ':', ',', '.', '|', ' '), '', $remove_accent);
            $var = (int)$remove_character;
            if (strlen((string) $var) < 11 && strlen((string) $var) > 9) {
                $var_9 = substr_replace($var, '9', 2, 0);
                return $var_9;
            } elseif (strlen((string) $var) == 11) {
                return ($paramenter);
            }
        } else {
            return NULL;
        }
        return NULL;
    }
}

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// CodeIgniter currency formats Helpers

if (!function_exists('format_frase_get')) {
    /**
     * Encurta escritas
     */
    function format_frase_get($paramenter = NULL)
    {
        if ($paramenter !== NULL) {
            // Substituir espaços por "+"
            $frase = str_replace(' ', '+', $paramenter);
            // Remover acentos
            $acentos = array('á', 'à', 'â', 'ã', 'ä', 'é', 'è', 'ê', 'ë', 'í', 'ì', 'î', 'ï', 'ó', 'ò', 'ô', 'õ', 'ö', 'ú', 'ù', 'û', 'ü', 'ç', 'Á', 'À', 'Â', 'Ã', 'Ä', 'É', 'È', 'Ê', 'Ë', 'Í', 'Ì', 'Î', 'Ï', 'Ó', 'Ò', 'Ô', 'Õ', 'Ö', 'Ú', 'Ù', 'Û', 'Ü', 'Ç');
            $semAcentos = array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'c', 'A', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'C');
            $frase = strtr($frase, array_combine($acentos, $semAcentos));
            return $frase;
        } else {
            return NULL;
        }
        return NULL;
    }
}

if (!function_exists('apply_mask')) {
    function apply_mask($val)
    {
        // Remove todos os caracteres que não são dígitos
        $val = preg_replace('/\D/', '', $val);

        $length = strlen($val);

        switch ($length) {
            case 11:
                $mask = '###.###.###-##';
                break;
            case 14:
                $mask = '##.###.###/####-##';
                break;
            default:
                // Se o número não tiver 11 ou 14 dígitos, retorna a string original
                // Você pode decidir fazer algo diferente aqui
                return $val;
        }

        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
}
