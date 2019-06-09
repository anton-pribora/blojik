<?php

class PostRepository
{
    // Количество найденных постов
    static public $totalFound = null;

    static function findMany(array $where = [], $offset = 0, $limit = 20)
    {
        $res = my_query('
            SELECT SQL_CALC_FOUND_ROWS 
                *
            
            FROM 
                `posts` 
            
            WHERE 
                ' . join(' AND ', $where ?: ['1']) . '
            
            ORDER BY 
                `creation_time` DESC 
            
            LIMIT 
                ' . intval($offset) . ', ' . intval($limit), [
        ]);

        self::$totalFound = my_query('SELECT FOUND_ROWS()')->fetch()[0];

        return $res;
    }
}