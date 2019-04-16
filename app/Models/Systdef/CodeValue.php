<?php

namespace App\Models\Sysdef;

use App\Models\Sysdef\Attribute\CodeValueAttribute;
use App\Models\Sysdef\Relationship\CodeValueRelationship;
use App\Services\Scopes\IsactiveScope;
use Illuminate\Database\Eloquent\Model;

class CodeValue extends Model
{

//    use CodeValueRelationship, CodeValueAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code_id',
        'name',
        'description',
        'reference',
        'sort',
        'isactive',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'reference';
    }


    /*Apply isactive scope*/
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new IsactiveScope());
    }


}
