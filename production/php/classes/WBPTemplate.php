<?php

class WBPTemplate {

    function buildBlogTag($target) {
        $explode = $pieces = explode('/', $target);
        $length = count($explode);
        $string = '';

        $string .= '<ul class="tag-list">';
        for ($i = 0; $i < $length; $i++) {
            $string .= '<li>';
            $string .= '    <div class="tag-item tag-grey">';
            $string .= '        <span class="text">' . $explode[$i] . '</span>';
            $string .= '    </div>';
            $string .= '</li>';
        }
        $string .= '</ul>';

        return $string;
    }

}
