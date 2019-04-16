<?php
namespace App\Repositories\Stakeholder;


use App\Exceptions\GeneralException;
use App\Imports\Stakeholder\AssociationMemberImport;
use App\Models\Stakeholder\Association;
use App\Models\Stakeholder\AssociationMember;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Services\Stakeholder\UserForCreatedAssoiationNotification;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use PhpParser\Node\Expr\AssignOp\Mod;
use Webpatser\Uuid\Uuid;


class AssociationMemberRepository extends BaseRepository
{
    use FileHandler, AttachmentHandler;

    const MODEL = AssociationMember::class;

    protected $base = null;



    /**
     * AssociationRepository constructor.
     * @throws \App\Exceptions\GeneralException
     */
    public function __construct()
    {

    }


    public function create($association_id)
    {
        DB::transaction(function () use ($association_id) {
            /*Start attach document*/
            $this->query()->create([

            ]);

            /*End upload members from doc to db table*/
        });
    }


    public function update()
    {

    }

}
