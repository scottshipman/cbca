<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dotlogics\Grapesjs\App\Traits\EditableTrait;
use Dotlogics\Grapesjs\App\Contracts\Editable;


/**
 * Class Page
 * @package App\Models
 *
 * Uses GrapeJS Editor from package https://github.com/jd-dotlogics/laravel-grapesjs
 */
class Page extends Model implements Editable
{
    use EditableTrait;


}

