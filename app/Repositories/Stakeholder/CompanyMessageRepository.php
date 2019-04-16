<?php
namespace app\Repositories\Stakeholder;


use App\Models\Stakeholder\CompanyMessage;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CompanyMessageRepository extends BaseRepository
{
    const MODEL = CompanyMessage::class;

    public function __construct()
    {

    }

    public function store($input, $uuid){
        return DB::transaction(function () use ($input, $uuid) {
            $messages = $this->query()->create([
                'company_id' => $uuid->id,
                'user_id' => access()->id(),
                'message' => $input['message'],
                'status' => 0,
            ]);
            return $messages;
        });
    }

    public function getMessagesForProfileDatatable($company_id){
        return $this->query()->where('company_id', $company_id);
    }

    public function destroy($id){
        DB::transaction(function () use ($id) {
            $query = $this->find($id);
            $query->delete();
        });
    }
}