@extends('layouts.main')

@section('template_title')
    {{ trans('profile.templateTitle') }}
@endsection

@section('content')
    <div class="container">

        <div class="row" style="margin-top: 50px">
            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel panel-heading">
                        <h4>Education Details</h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => ['profile.education_details.store',$user->uuid],'method'=>'post', 'autocomplete' => 'off',  'id' =>'store', 'class' => 'form-horizontal  needs-validation', 'novalidate','enctype'=>"multipart/form-data"]) !!}

                            <div class="form-group">

                                <div class="col-xs-6">

                                    {!! Form::label('degree_name', __("Degree name"), ['class' => 'required_asterik']) !!}
                                    {!! Form::text('degree_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'name', 'required']) !!}
                                    {!! $errors->first('degree_name', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    {!! Form::label('university_name', __("University name"), ['class' => 'required_asterik']) !!}
                                    {!! Form::text('university_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'name', 'required']) !!}
                                    {!! $errors->first('university_name', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    {!! Form::label('qualification', __("Qualification"), ['class' => 'required_asterik']) !!}
                                    {!! Form::text('qualification', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'name', 'required']) !!}
                                    {!! $errors->first('qualification', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    {!! Form::label('start_date', __("Start Date"), ['class' => 'required_asterik']) !!}
                                    {!! Form::date('start_date', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'name', 'required']) !!}
                                    {!! $errors->first('start_date', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    {!! Form::label('end_date', __("End Date"), ['class' => 'required_asterik']) !!}
                                    {!! Form::date('end_date', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'name', 'required']) !!}
                                    {!! $errors->first('end_date', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

    @include('modals.modal-form')

@endsection

@section('footer_scripts')


@endsection
