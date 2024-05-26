<?php

class Main
{

    public static function limpiar_cadena($cadena)
    {
        // Lista de palabras reservadas de SQL
        $palabras_reservadas = array(
            'SELECT', 'INSERT', 'UPDATE', 'DELETE', 'FROM', 'WHERE', 'AND', 'OR', 'NOT', 'ORDER BY',
            'GROUP BY', 'HAVING', 'AS', 'JOIN', 'INNER JOIN', 'LEFT JOIN', 'RIGHT JOIN', 'OUTER JOIN',
            'ON', 'LIMIT', 'OFFSET', 'DESC', 'ASC', 'VALUES', 'SET', 'INTO', 'CREATE', 'TABLE', 'ALTER',
            'DROP', 'INDEX', 'UNION', 'ALL', 'UNIQUE', 'PRIMARY', 'FOREIGN', 'KEY', 'REFERENCES', 'DISTINCT',
            'TRUNCATE', 'CASCADE', 'RESTRICT', 'DEFAULT', 'NULL', 'TRUE', 'FALSE', 'AUTO_INCREMENT', 'DATABASE'
            // Agrega más palabras reservadas según sea necesario
        );

        // Eliminar espacios en blanco al principio y al final
        $cadena = trim($cadena);
        // Eliminar barras invertidas
        $cadena = stripslashes($cadena);
        // Convertir caracteres especiales en entidades HTML
        $cadena = htmlspecialchars($cadena);
        
        // Utilizar expresiones regulares para eliminar palabras reservadas de SQL
        $patron = '/\b(?:' . implode('|', array_map('preg_quote', $palabras_reservadas)) . ')\b/i';
        $cadena = preg_replace($patron, '', $cadena);

        return $cadena;
    }

    static function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
    }

    static function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);

        return $output;
    }

    static function generate_string($strength = 16)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
