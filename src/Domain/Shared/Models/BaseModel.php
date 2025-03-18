<?php

namespace Domain\Shared\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    use HasFactory;

    protected $dateFormat = 'Y-m-d H:i:s';

    public static function newFactory() {
        
        $parts = str(get_called_class())->explode("\\");

        $domain = $parts[1];
        $model = $parts->last();

        return app("Database\\Factories\\{$domain}\\{$model}Factory");

    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat);
    }
}