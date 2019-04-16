<?php

namespace App\Models\Sysdef;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    /**
     * @return array|string|null
     */
    public function getSystemDefinedAttribute()
    {
        if ($this->systemDefined()){
            return __('label.yes');
        }else {
            return  __('label.no');
        }

    }

    //Flags
    public function systemDefined() {
        return $this->is_system_defined == 1;
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        if (!$this->systemDefined()) {
            return '<a href="' . route('code.values', $this->id) . '"  class="btn btn-xs btn-primary" ><i class="icon fa fa-edit" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i>'.' '. trans('buttons.general.crud.edit').'</a> ';
        }
    }

}
