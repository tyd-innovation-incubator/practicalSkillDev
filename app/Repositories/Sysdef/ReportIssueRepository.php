<?php

namespace App\Repositories\Sysdef;

use App\Jobs\Notifications\SendSms;
use App\Models\Sysdef\ReportIssue;
use App\Notifications\System\ReportAcceptedNotification;
use App\Notifications\System\ReportDeclineNotification;
use App\Repositories\Access\UserRepository;
use App\Repositories\BaseRepository;
use App\Services\Scopes\IsactiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportIssueRepository extends BaseRepository
{
    const MODEL = ReportIssue::class;

    /**
     * get all rows for admin datatable
     * @return mixed
     */
    public function getForAdminDatatable(){
        return $this->query()->withoutGlobalScope(IsactiveScope::class);
    }

    /**
     * get reports by status for admin datatable: 0:pending, 1:accepted, 2:declined
     * @param $status
     * @return mixed
     */
    public function getForAdminByStatusDatatable($status){
        return $this->query()
            ->select([
                DB::raw('report_issues.user_id as reported'),
                DB::raw('report_issues.company_id as reported_company'),
                DB::raw('report_issues.reported_by as reporter_'),
                DB::raw('report_issues.description'),
                DB::raw('report_issues.report_issue_type_cv_id as type'),
                DB::raw('report_issues.status'),
                DB::raw('report_issues.resource_id'),
                DB::raw('report_issues.resource_type'),
                DB::raw('report_issues.created_at'),
                DB::raw('report_issues.uuid'),
                DB::raw('companies.name as company'),
                DB::raw('code_values.name as codevalue'),
                DB::raw("concat_ws(' ', users.name, users.othernames) as reporter_name"),
                DB::raw('users.name as firstname'),
                DB::raw('users.othernames as lastname'),
            ])
            ->join('code_values', 'code_values.id', '=', 'report_issues.report_issue_type_cv_id')
            ->leftJoin('companies', 'companies.id', '=', 'report_issues.company_id')
            ->join('users', 'users.id', '=', 'report_issues.reported_by')
            ->where('status', $status)
            ->withoutGlobalScope(IsactiveScope::class);
    }

    /**
     * get all users with report counts greater than defined one
     * @return mixed
     */
    public function getUsersReportCountDatatable(){
        $users = new UserRepository();
        return $users->query()->withoutGlobalScope(IsactiveScope::class);
    }

    /**
     * @param $status
     * @return mixed
     */
    public function getAllByStatus($status){
        return $this->query()->where('status', $status)->get();
    }

    /**
     * @param Model $model
     * @param $input
     */
    public function store(Model $model, $input) {
        DB::transaction(function () use ($input, $model) {
            switch(class_basename($model)){
                case 'Company': {
                    $query = $this->query()->create([
                        'user_id' => $pivot = $model->users()->where('isregister', 1)->first()->id,
                        'company_id' => $model->id,
                        'reported_by' => access()->id(),
                        'description' => $input['description'],
                        'report_issue_type_cv_id' => $input['type'],
                        'resource_id' => $model->id,
                        'resource_type' => $model->id,
                    ]);
                    $model->reportIssue()->save($query);
                    return $query;
                }
                default : {
                    $query = $this->query()->create([
                        'user_id' => $model->user_id,
                        'company_id' => $model->company_id,
                        'reported_by' => access()->id(),
                        'description' => $input['description'],
                        'report_issue_type_cv_id' => $input['type'],
                        'resource_id' => $model->id,
                        'resource_type' => $model->id,
                    ]);
                    $model->reportIssue()->save($query);
                    return $query;
                }
            }
        });
    }

    /**
     * @param $input
     * @param $report
     */
    public function update($input, $report) {
        DB::transaction(function () use ($input, $report) {

             switch ($input['status']) {
                 case 1 : {
                     //admin accepted
                     $model_name = $report->resource_type;

                     //deactivate content
                     $resource = $model_name::find($report->resource_id)->first();
                     $resource->isactive = 0;
                     $resource->update();

                     //review the report to accepted
                     $report->status = 1;
                     $report->update();

                     //review the remaining similar reports to void status = 3
                     $this->query()
                         ->where('resource_id', $report->resource_id)
                         ->where('resource_type', $report->resource_type)
                         ->where('status', 0)
                         ->update([
                             'status' => '3'
                         ]);

                     //send sms to reported user
                     $count = $this->getStataCountByReportedUser($report->user_id, $report->resource_id, $report->resource_type, 1);
                     if(isset($report->user->phone))
                     SendSms::dispatch($report->user, trans('alert.system.report.sms.report_accepted', ['name' => $report->user->name, 'count' => $count]));
                     //send email to reported user
                     $report->user->notify(new ReportAcceptedNotification());
                 }
                 break;
                 case 2 : {
                     //admin declined
                     //content not deactivated

                     //review the report to declined
                     $report->status = 2;
                     $report->update();

                     //send sms to user
                     $count = $this->getStataCountByReportedUser($report->user_id, $report->resource_id, $report->resource_type, 2);
                     if(isset($report->user->phone))
                     SendSms::dispatch($report->user, trans('alert.system.report.sms.report_declined', ['name' => $report->user->name, 'count' => $count]));
                     //send email to reported user
                     $report->user->notify(new ReportDeclineNotification());
                 }
             }
        });
    }

    /**
     * @param $report_issues
     */
    public function destroy($report_issues){
        DB::transaction(function () use ($report_issues) {
            $report_issues->delete();
        });
    }

    /**
     * @param $user_id
     * @param $status
     * @return mixed
     */
    public function getTotalStataCountByReportedUser($user_id, $status){
        return $this->query()->where('user_id', $user_id)->where('status', $status)->count();
    }

    /**
     * @param $company_id
     * @param $status
     * @return mixed
     */
    public function getTotalStataCountByReportedCompany($company_id, $status){
        return $this->query()->where('company_id', $company_id)->where('status', $status)->count();
    }

    /**
     * @param $user_id
     * @param $resource_id
     * @param $resource_type
     * @param $status
     * @return mixed
     */
    public function getStataCountByReportedUser($user_id, $resource_id, $resource_type, $status){
        return $this->query()
            ->where('user_id', $user_id)
            ->where('status', $status)
            ->where('resource_id', $resource_id)
            ->where('resource_type', $resource_type)
            ->count();
    }

    /**
     * @param $company_id
     * @param $resource_id
     * @param $resource_type
     * @param $status
     * @return mixed
     */
    public function getStataCountByReportedCompany($company_id, $resource_id, $resource_type,$status){
        return $this->query()
            ->where('company_id', $company_id)
            ->where('status', $status)
            ->where('resource_id', $resource_id)
            ->where('resource_type', $resource_type)
            ->count();
    }
}
