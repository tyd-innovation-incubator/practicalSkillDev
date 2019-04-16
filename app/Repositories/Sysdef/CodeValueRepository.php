<?php

namespace App\Repositories\Sysdef;

use App\Models\Sysdef\CodeValue;
use App\Repositories\BaseRepository;
use App\Repositories\Stakeholder\AssociationsRepository;
use App\Repositories\Sysdef\CountryRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use Spatie\TranslationLoader\LanguageLine;

/**
 * Class CodeValueRepository
 * @package App\Repositories\Sysdef
 * @description Use this class with care, could break the system.
 * Controls all the data dictionaries of the system.
 * @author Erick M. Chrysostom <e.chrysostom@nextbyte.co.tz>
 */
class CodeValueRepository extends BaseRepository
{
    const MODEL = CodeValue::class;

    protected $code_repo;
    protected $language_lines;

    /*
     * CodeValueRepository Constructor
     */
    public function __construct(){
        $this->code_repo = new CodeRepository();
        $this->language_lines = new LanguageLineRepository();
    }

    /*
     * Translate CodeValues Entries using lang>code_value
     */
    public function mapIdsForLang($query)
    {
        $return = $query->map(function ($item, $key) {
                        return ['id' => $item['id'], 'name' => __("code_value." . $item['id'])];
        });
        return $return;
    }

    /**
     * Get code value name for translation
     * @param $id
     * @return array|null|string
     */
    public function name($id)
    {
        return __('code_value.'. $id);
    }
    /*
     *
     */
    public function getUserLogTypeLogIn()
    {
        $return = $this->query()->select(['id'])->where("code_id", 3)->where("reference", "ULLGI")->first();
        return $return->id;
    }

    /*
     *
     */
    public function getUserLogTypeLogOut()
    {
        $return = $this->query()->select(['id'])->where("code_id", 3)->where("reference", "ULLGO")->first();
        return $return->id;
    }

    /*
     *
     */
    public function getUserLogTypeFailedLogin()
    {
        $return = $this->query()->select(['id'])->where("code_id", 3)->where("reference", "ULFLI")->first();
        return $return->id;
    }

    /*
     *
     */
    public function getUserLogTypePasswordReset()
    {
        $return = $this->query()->select(['id'])->where("code_id", 3)->where("reference", "ULPRS")->first();
        return $return->id;
    }

    /*
     *
     */
    public function getUserLogTypeUserLockout()
    {
        $return = $this->query()->select(['id'])->where("code_id", 3)->where("reference", "ULULC")->first();
        return $return->id;
    }

    /*
     *
     */
    public function getPortalUserForSelect()
    {
        $query = $this->query()->select(['id'])->where("code_id", 1)->whereIn("id", [2, 3, 4])->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }

    public function getInvitationUserForSelect()
    {
        $query = $this->query()->select(['id'])->where("code_id", 1)->whereIn("id", [2, 3, 6])->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }

    /*
     *
     */
    public function getCodeForSelectFiltered($code_id, array $filter)
    {
        $query = $this->query()->select(['id'])->where("code_id", $code_id)->whereIn("id", $filter)->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }

    /*
     * Get all code values by code_id
     * For initiating chained selects
     */
    public function getAllByCode($code_id)
    {
        return $this->query()->select(['id', 'name', 'code_id', 'reference'])->where("code_id", $code_id)->get();
    }

    /*
     *
     */
    public function getCodeForSelect($code_id)
    {
        $query = $this->query()->select(['id'])
            ->where("code_id", $code_id)
            ->orderBy('id', 'asc')
            ->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }


    /*
     *
     */
    public function getCodeValuesByReferenceForSelect($id)
    {
        $query = $this->query()->select(['name', 'reference', 'id'])->where("code_id", $id)->get();
        $return = $query->pluck("name", "reference");
//        $return = $this->mapIdsForLang($query)->pluck('name', 'reference');
        return $return;
    }


    /**
     * Get CV by reference
     * @param $reference
     * @return mixed
     */
    public function getCodeValueByReference($reference){
        return $return = $this->query()->select(['id'])->where("reference", $reference)->first();
    }

    /*
     *
     */
    public function getCodeValues($code_id)
    {
        return $this->query()->where("code_id", $code_id)->get();
    }

    /*
     * Get instances of all logistic services for tendering - Business center
     */
    public function getCodeValuesNotIn($code_id, array $id)
    {
        return $this->query()->where("code_id", $code_id)->whereNotIn('id', $id)->get();
    }

    /*
     *
     */
    public function getCodeValuesPaginate($code_id, $count = 10)
    {
        return $this->query()->where("code_id", $code_id)->paginate(sysdef()->name('pagination_low'));
    }

    /*
     *
     */
    public function getCurrencyForSelect(){
        $repo = new CurrencyRepository();
        $query = $repo->query()->select(['id', 'code'])->get();
        $return = $query->pluck("code", "id");
        return $return;
    }

    /*
     *
     */
    public function getCountryForSelect()
    {
        $repo = new CountryRepository();
        $query = $repo->query()->select(['code', 'name'])->get();
        $return = $query->pluck("name", "code");
        return $return;
    }

    /*
     *
     */
    public function getCountryIdsForSelect()
    {
        $repo = new CountryRepository();
        $query = $repo->query()->select(['id', 'name'])->get();
        $return = $query->pluck("name", "id");
        return $return;
    }

    /*
     *
     */
    public function getRegionForSelect()
    {
        $repo = new RegionRepository();
        $query = $repo->query()->select(['id', 'name'])->get();
        $return = $query->pluck("name", "id");
        return $return;
    }


    /**
     * @return mixed
     * Get Designations for select
     */
    public function getDesignationsForSelect()
    {
        $repo = new DesignationRepository();
        $query = $repo->query()->select(['id', 'name'])->get();
        $return = $query->pluck("name", "id");
        return $return;
    }


    /**
     * @return mixed
     * Get Designations for select
     */
    public function getUnitsForSelect()
    {
        $repo = new UnitRepository();
        $query = $repo->query()->select(['id', 'name'])->get();
        $return = $query->pluck("name", "id");
        return $return;
    }


    /*
     * Get Code instance from code_id
     */
    public function getCodeInstanceById($code_id)
    {
        return $this->code_repo->find($code_id);
    }

    /*
     * Get code values by code for data table
     */
    public function getCodeValuesByCodeForDataTable($code_id){
        return $this->query()->where('code_id', $code_id);
    }

    //--Tenders
    /*Get instances of all logistic services for tendering - Business center------*/
    public function queryLogisticServicesForTender(){
        return $this->query()->where("code_id", 2)->whereNotIn('id', [8,12,13,14,15,16,83]);
    }
    public function getLogisticServiceForTender()
    {
        return $this->queryLogisticServicesForTender()->select(['id', 'name', 'reference'])->orderBy("id", "asc")->get();
    }

    /*Get Logistic service for tenders for select*/
    public function getLogisticServiceForTenderForSelect()
    {
        $query =   $this->queryLogisticServicesForTender()->select(['id'])->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }

    /*Get Logistic service for tenders for select*/
    public function getLogisticServiceForTenderWithCountForSelect()
    {
        $query =   $this->queryLogisticServicesForTender()->select(['id'])->get();
        $return = $query->pluck('name_with_tenders_pending_count', 'id');
        return $return;
    }

    //end --tender

    //Offers -----
    /*Get instances of all logistic services for offers - Business center------*/
    public function queryLogisticServicesForOffer(){
        return $this->query()->where("code_id", 2)->whereNotIn('id', [8,10,11,12,13,14,15,16,83]);
    }



    public function getLogisticServiceForOffer()
    {
        return $this->queryLogisticServicesForOffer()->select(['id', 'name', 'reference'])->orderBy("id", "asc")->get();
    }

    /*Get Logistic service for offers for select*/
    public function getLogisticServiceForOfferForSelect()
    {
        $query =   $this->queryLogisticServicesForOffer()->select(['id'])->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }
    /*Get Logistic service for offers for select*/
    public function getLogisticServiceForOfferWithCountForSelect()
    {
        $query =   $this->queryLogisticServicesForOffer()->select(['id'])->get();
        $return = $query->pluck('name_with_offers_pending_count', 'id');
        return $return;
    }
    //--end offer--

    /*start  services for directory*/
    public function queryLogisticServicesForDirectory(){
        return $this->query()->where("code_id", 2)->whereNotIn('id', [83]);
    }

    /*Get Logistic service for directory for select*/
    public function getLogisticServiceForDirectoryForSelect()
    {
        $query =   $this->queryLogisticServicesForDirectory()->select(['id'])->get();
        $return = $this->mapIdsForLang($query)->pluck('name', 'id');
        return $return;
    }

    public function getLogisticServiceForDirectory()
    {
        return $this->queryLogisticServicesForDirectory()->select(['id', 'name', 'reference'])->orderBy("id", "asc")->get();
    }
/* --end directory - logistic service*/
    /*--------end logistic service for tender*/

    /**
     * get the maximum number of sort of a given code value
     * @param $code_id
     * @return mixed
     */
    public function getMaxSort($code_id){
        $code_values = $this->query()->select('sort')
            ->where('code_id', $code_id)
            ->orderBy('sort', 'desc')
            ->first();
        return $code_values->sort;
    }

    /**
     * generate references for CodeValue
     * @param $initials
     * @return string
     */
    public function generateReference($initials){
        do
        {
            $token = randomString();
            $reference = $initials.$token;
            $available = $this->query()
                ->select('reference')
                ->where('reference', $reference)->get();
        }
        while(!$available->isEmpty());
        return $reference;
    }


    /**
     * Get subcategory code of the code value
     * @param $cv_id
     * @return mixed
     */
    public function getCodeCategory($cv_id)
    {
        $code_value = $this->find($cv_id);
        $code_category = $code_value->codes()->where('iscategory', 1)->first();
        return $code_category;
    }

    /**
     * Store Code Value
     * @param array $input
     * @param $code
     */
    public function store(array $input, $code){
        $status = $input['status'];
        $isactive = 0;

        if($status == 'yes'){
            $isactive = 1;
        }

        $sort = $this->getMaxSort($code->id);

        DB::transaction(function () use ($input, $isactive, $sort, $code) {
            $max = $this->query()->select('id')->orderBy('id', 'desc')->limit(1)->first();
            $id = $max->id + 1;
            $query = $this->query()->create([
                'id' => $id,
                'code_id' => $code->id,
                'name' => ucfirst($input['code_name']),
                'description' => $input['description'],
                'reference' => $this->generateReference('FT'),
                'sort' => ++$sort,
                'isactive' => $isactive,
            ]);

            //save language 'key' => 'text'
            LanguageLine::create([
                'group' => 'code_value',
                'key' => $id,
                'text' => ['en' => ucfirst($input['code_name']), 'sw' => ucfirst($input['code_name_sw'])],
            ]);

            return $query;
        });
    }

    /**
     * @param array $input
     * @param $reference
     */
    public function update(array $input, $code_value){
        $status = $input['status'];
        $isactive = 0;

        if($status == 'yes'){
            $isactive = 1;
        }

        DB::transaction(function () use ($input, $isactive, $code_value) {
            $query = $this->find($code_value);
            $query->name = ucfirst($input['code_name']);
            $query->description = $input['description'];
            $query->isactive = $isactive;
            $query->update();

            $lang_query = $this->language_lines->getByKey($query->id);
            $lang_query->text = ['en' => ucfirst($input['code_name']), 'sw' => ucfirst($input['code_name_sw'])];
            $lang_query->update();

            return $query;
        });
    }

    /*Deactivate code values*/
    public function deactivate(Model $code_value)
    {
        $code_value->update([
            'isactive' => 0
        ]);
    }

/*Activate*/
    public function activate(Model $code_value)
    {
        $code_value->update([
            'isactive' => 1
        ]);
    }
    /**
     * a function that relates a code value id with the font-awesome icon
     */
    public function cvIcon($id)
    {
        switch ($id) {
            case 129: {
                //vehicles
                $icon = '<i class=" fas fa-truck"></i>';
            }; break;
            case 130: {
                //containers
                $icon = '<i class="fas fa-archive"></i>';
            }; break;

            case 135: {
                //truck
                $icon = '<i class=" fas fa-truck"></i>';
            }; break;
            case 136: {
                //truck head
                $icon = '<i class="fas fa-truck-moving"></i>';
            }; break;
            case 137: {
                //truck trailer
                $icon = '<i class="fas fa-truck-loading"></i>';
            }; break;
            case 138: {
                //Auto spare parts
                $icon = '<i class="fas fa-cogs"></i>';
            }; break;

            default: {
                //others
                $icon = '<i class="fas fa-searchengin"></i>';
            }
        }

        return $icon;
    }


    /*Get instances of all active payment period in service package subscription------*/
    public  function queryActivePaymentPeriod()
    {
        return $this->query()->select(['id','name'])->where("code_id", 35)->whereNotIn('id',[189,190,191,192,193,194,195,196,197])->get();
    }

}
