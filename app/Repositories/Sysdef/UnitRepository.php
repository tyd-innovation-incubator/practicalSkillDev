<?php

namespace App\Repositories\Sysdef;

use App\Repositories\BaseRepository;
use App\Models\Sysdef\Unit;

class UnitRepository extends BaseRepository
{
    /**
     * Associated Repository Models.
     */
    const MODEL = Unit::class;

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