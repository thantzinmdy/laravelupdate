<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Table;
use Modules\Client\Enums\TMTypes;

class Client extends Model
{
    use SoftDeletes;
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::CLIENT;

    protected $fillable = [
        'main_code',
        'sub_code',
        'filling_date',
        'trademark_name',
        'owner_name',
        'tm_types',
        'class',
        'application_number',
        'owner_address',
        'owner_phone',
        'agent_name',
        'local_mark',
        'foreign_mark',
        'remark',
    ];

    protected $casts = [
        'filling_date' => 'date',
    ];

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
    	if(auth()->user()->can('view client')){
        	return '<a href="'.route('admin.client.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
        }
       	return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
    	if(auth()->user()->can('edit client')){
        	return '<a href="'.route('admin.client.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
       	return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('delete client')) {
            return '<a href="'.route('admin.client.destroy', $this).'" data-method="delete" data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-button-confirm="'.__('buttons.general.crud.delete').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger"><i class="fas fa-trash"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getShowButtonAttribute().$this->getEditButtonAttribute().$this->getDeleteButtonAttribute();
    }

    /**
     * Get TM Types label
     *
     * @return string
     */
    public function getTmTypesLabelAttribute()
    {
        return TMTypes::getLabel($this->tm_types);
    }
}
