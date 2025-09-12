<?php

namespace Modules\Client\Repositories;

use Modules\Client\Entities\Client;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientRepository.
 */
class ClientRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable($filters = [])
    {
        $query = $this->model
            ->with(['owner', 'agent'])
            ->leftJoin('owners', 'clients.owner_id', '=', 'owners.id')
            ->leftJoin('agents', 'clients.agent_id', '=', 'agents.id')
            ->select('clients.*');

        // Apply date range filter for filling_date
        if (!empty($filters['start_date'])) {
            $query->whereDate('clients.filling_date', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('clients.filling_date', '<=', $filters['end_date']);
        }

        // Apply trademark name filter
        if (!empty($filters['trademark_name'])) {
            $query->where('clients.trademark_name', 'like', '%' . $filters['trademark_name'] . '%');
        }

        // Apply owner filter
        if (!empty($filters['owner_id'])) {
            $query->where('clients.owner_id', $filters['owner_id']);
        }

        // Apply agent filter
        if (!empty($filters['agent_id'])) {
            $query->where('clients.agent_id', $filters['agent_id']);
        }

        return $query;
    }
}
