<?php

class Array2Form {
    public static function generate($array) {
        foreach($array as $key => $item) {
            echo '<div class="'.$key.'">';
            foreach($item as $input) {
                if(in_array($input['type'], array("text", "password", "email", "checkbox", "radio"))) {
                    if($input['type'] != "checkbox" && $input['type'] != "radio") echo '<label for="'.$input['id'].'">'.$input['libelle'].'</label>';
                    echo '<input class="'.$input['classes'].'" name="'.$input['name'].'" id="'.$input['id'].'" type="'.$input['type'].'" placeholder="'.$input['placeholder'].'" value="'.$input['value'].'" required="'.$input['required'].'">';
                    if($input['type'] == "checkbox" || $input['type'] == "radio") echo '<label for="'.$input['id'].'">'.$input['libelle'].'</label>';
                }
                else if($input['type'] == "select") {
                    if(isset($input['libelle'])) echo '<label for="'.$input['id'].'">'.$input['libelle'].'</label>';
                    echo '<select name="'.$input['name'].'" id="'.$input['id'].'" class="'.$input['class'].'" required="'.$input['required'].'">';
                    foreach($input['options'] as $k => $option) {
                        if($input['selected'] != $k) {
                            echo '<option value="'.$k.'">'.$option.'</option>';
                        }
                        else {
                            echo '<option value="'.$k.'" selected="selected">'.$option.'</option>';
                        }
                    }
                    echo "</select>";
                }
                else if($input['type'] == "textarea") {
                    if(isset($input['libelle'])) echo '<label for="'.$input['id'].'">'.$input['libelle'].'</label>';
                    echo '<textarea class="'.$input['class'].'" name="'.$input['name'].'" id="'.$input['id'].'" placeholder="'.$input['placeholder'].'" required="'.$input['required'].'">' . $input['value'] . "</textarea>";
                }
                else if($input['type'] == "label") {
                    echo '<label for="'.$input['id'].'">'.$input['value'].'</label>';
                }
            }
            echo "</div>";
        }
    }
}