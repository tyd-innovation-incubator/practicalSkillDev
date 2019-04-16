<?php

namespace App\Repositories\Sysdef;

use App\Repositories\BaseRepository;
use App\Models\Sysdef\Designation;

class DesignationRepository extends BaseRepository
{
    /**
     * Associated Repository Models.
     */
    const MODEL = Designation::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'name', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }

}