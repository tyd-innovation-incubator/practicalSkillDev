@extends('layouts.main', ['title' => __("label.home"), 'header' => __("label.home")])

@push('after-styles')
{{ Html::style(url('vendor/select2/css/select2.min.css')) }}
{{ Html::style(url('vendor/owl.carousel/assets/owl.carousel.css')) }}
{{ Html::style(url('vendor/owl.carousel/assets/owl.theme.default.css')) }}
<style>
    #image_box
    {
        max-width:150px;
    }
</style>
@endpush

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
    <!-- Top Employers ends -->
    <!-- Video start -->
    {{--<div class="videowraper section">--}}

        {{--<div class="container">--}}

            {{--<!-- title start -->--}}

            {{--<div class="titleTop">--}}

                {{--<div class="subtitle">Here You Can See</div>--}}

                {{--<h3>Watch Our <span>Video</span></h3>--}}

            {{--</div>--}}

            {{--<!-- title end -->--}}



            {{--<p>Our partners make Milestone products more dynamic and integrations push the limits of what is possible. XProtect® software protects animals from known poachers and protects the city of Minneapolis.</p>--}}

            {{--<a href="https://youtu.be/EU7PRmCpx-0" target="_blank"><i class="fa fa-play-circle-o" aria-hidden="true"></i></a> </div>--}}

    {{--</div>--}}
    <!-- Video end -->





@endsection

@push('after-scripts')
{!! Html::script(url('vendor/select2/js/select2.min.js')) !!}
{!! Html::script(url('vendor/owl.carousel/owl.carousel.js')) !!}
<script>

</script>
@endpush
