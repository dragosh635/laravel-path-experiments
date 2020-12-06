<?php

namespace App;

class InputBox {

    /**
     * Html for the custom blade directive
     *
     * @param string $name
     *
     * @return string
     */
    public static function text( $name ) {
        return "<div class=\"form-group\">
                    <label for=\"title\">{$name}</label>
                    <input type=\"text\" class=\"form-control\" name=\"title\" id=\"title\"/>
                </div>";
    }
}
