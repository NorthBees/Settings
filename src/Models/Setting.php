<?php

namespace NorthBees\Settings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected static $factory = \Database\Factories\SettingFactory::class;

    protected $fillable
        = [
            'key',
            'value'
        ];
}
