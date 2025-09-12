<?php

namespace Modules\Agent\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Table;

class Agent extends Model
{
    use SoftDeletes;
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::AGENT;

    protected $fillable = ["name", "description"];

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
    	if(auth()->user()->can('view agent')){
        	return '<a href="'.route('admin.agent.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
        }
       	return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
    	if(auth()->user()->can('edit agent')){
        	return '<a href="'.route('admin.agent.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
       	return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('delete agent')) {
            return '<a href="'.route('admin.agent.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger"><i class="fas fa-trash"></i></a> ';
        }

        return '';
    }

    /**
     * Get the clients for the agent.
     */
    public function clients()
    {
        return $this->hasMany(\Modules\Client\Entities\Client::class);
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getShowButtonAttribute().$this->getEditButtonAttribute().$this->getDeleteButtonAttribute();
    }
}
