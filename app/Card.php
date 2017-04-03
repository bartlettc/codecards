<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Card extends Moloquent
{

    public function getUserWithAtSymbolAttribute() {
        return '@'.$this->attributes['meta']['creator'];
    }


}
