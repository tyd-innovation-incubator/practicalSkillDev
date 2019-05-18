@extends('layouts.main')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <!-- Search start -->
    @include('includes.search')
    <!-- Search End -->



    <!-- How it Works start -->
    @include('includes.how_its_works')
    <!-- How it Works Ends -->

    <!-- Featured Jobs start -->
    @include('includes.features_job')
    <!-- Featured Jobs ends -->

    <!-- Popular Searches start -->
    @include('includes.popular_search')
    <!-- Popular Searches ends -->

    <!-- Top Employers start -->
    @include('includes.employer')

@endsection

@section('footer_scripts')
@endsection
