<?php

namespace Patterns;


/**
 * Design pattern - Factory
 *
 * @author: Hazrat Ali
 * @mail: iloveyii@yahoo.com
 * Date: 2016-07-30
 */
class ShapeFactory
{
    private static $types = ['Rectangle', 'Square'];

    public static function create($type)
    {
        if( ! in_array($type, self::$types)) {
            die('Invalid type ' . $type . ', valid types are ' . implode(',', self::$types) . EOL);
        }

        if($type == 'Rectangle') {
            return new Rectangle(50, 15);
        }

        if($type == 'Square') {
            return new Square(20);
        }
    }
}

