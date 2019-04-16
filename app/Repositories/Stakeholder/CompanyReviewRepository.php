<?php
namespace App\Repositories\Stakeholder;

use App\Jobs\Stakeholder\setCompanyRateAverage;
use App\Models\Business\TenderApplication;
use App\Models\Stakeholder\CompanyReview;
use App\Repositories\BaseRepository;
use App\Repositories\Business\TenderRepository;
use App\Services\Access\Facades\Access;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyReviewRepository extends BaseRepository
{
    const MODEL = CompanyReview::class;

    protected $companies;

    /**
     * CompanyReviewRepository constructor.
     * @throws \App\Exceptions\GeneralException
     */
    public function __construct()
    {
        $this->companies = new CompanyRepository();
        $this->tender_applications = new TenderApplication();
    }

    /**
     * @param $company_id
     * @return mixed
     */
    public function getAllPaginate($company_id){
        $query = $this->query()->where('company_id', $company_id)->orderBy('created_at','desc')->paginate(sysdef()->name('pagination_high'));
        return $query;
    }

    public function isReviewed($company_id, $user_id){
        $query = $this->query()->select('company_id', 'user_id')
            ->where('company_id', $company_id)
            ->where('user_id', $user_id)
            ->count();
        if($query > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getByCompanyIdLimit($company_id, $limit){
        $query = $this->query()
            ->where('company_id', $company_id)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
        return $query;
    }


    public function reviewStore(array  $input,Model $model,Model $reviewed_company){

        $total =code_value()->getAllByCode(50)->count();
        $sum = 0;
        $rate = ($sum/$total)*5;

        DB::transaction(function () use ($input,$model,$reviewed_company,$rate, $sum) {
            foreach(code_value()->getAllByCode(50) as $cv) {
                if($input['rating_parameter'.$cv->id] == 1){
                    //$model->id, $cv->id, $input['rating_parameter'.$cv->id]
                    $model->ratingParameters()->attach([
                        'rating_parameter_cv_id' => $input['rating_parameter'.$cv->id],
                        'tender_id' => $model->id,
                        'rating'=>$rate,
                    ]);

                    $sum++;
                }
            }

            $company_review =  $this->query()->create([
               'user_id' => access()->id(),
               'company_id' => $reviewed_company->id,
               'resource_id'=>$model->id,
               'comments' => $input['comments'],
               'rating'=> $this->ratingParameter($input),
               'resource_type'=>$model->id,
               'isrecommended'=>array_key_exists('isrecommended', $input) ? 1 : 0 ,
            ]);

            dispatch(new setCompanyRateAverage($reviewed_company));

            $model->companyReview()->save($company_review);

            return $company_review;
        });
    }

    /**
     * @param array $input
     * @return float|int
     * for calculate rate using rating parameters
     */
    public  function  ratingParameter(array $input)
    {
        $total = code_value()->getAllByCode(50)->count();
        $sum = 0;
        foreach (code_value()->getAllByCode(50) as $cv) {
            if ($input['rating_parameter' . $cv->id] == 1) {
                $sum++;
            }
            $rate = ($sum / $total) * 5;
        }

        return $rate;

    }

    public function getForProfileDatatable($company_id){
        return $this->query()->where('company_id', $company_id);
    }

    public function destroy($id){
        DB::transaction(function () use ($id) {
            $query = $this->find($id);
            $query->delete();
        });
    }

    public function setCompanyRateAverage($company_id){
        $rate = $this->query()->select('rating')->where('company_id', $company_id)->avg('rating');
        if(count($rate) > 0){
            return $rating = $this->companies->setRating($company_id, floor($rate));
        }else{
            return 0;
        }
    }
}
