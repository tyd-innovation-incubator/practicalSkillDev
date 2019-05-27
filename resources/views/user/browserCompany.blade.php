@extends('layouts.app')


@section('content')

<!-- Breadcrumb Bar -->
<div class="section breadcrumb-bar solid-blue-bg">
  <div class="inner">
    <div class="container">
      <p class="breadcrumb-menu">
        <a href="#0"><i class="ion-ios-home"></i></a>
        <i class="ion-ios-arrow-right arrow-right"></i>
        <a href="#0">Candidates</a>
        <i class="ion-ios-arrow-right arrow-right"></i>
        <a href="#0">Browse companies</a>
      </p> <!-- end .breabdcrumb-menu -->
      <h2 class="breadcrumb-title">Showing all companies</h2>
    </div> <!-- end .container -->
  </div> <!-- end .inner -->
</div> <!-- end .section -->

<!-- Companies List Section -->
<div class="section companies-list-section">
  <div class="inner">
    <div class="container">
      <ul class="companies-list-menu flex space-around items-center no-column no-wrap list-unstyled">
        <li class="active"><a href="#company-list-A">A</a></li>
        <li><a href="#company-list-B">B</a></li>
        <li><a href="#0">C</a></li>
        <li><a href="#0">D</a></li>
        <li><a href="#">E</a></li>
        <li><a href="#">F</a></li>
        <li><a href="#">G</a></li>
        <li><a href="#">H</a></li>
        <li><a href="#">I</a></li>
        <li><a href="#">J</a></li>
        <li><a href="#">K</a></li>
        <li><a href="#">L</a></li>
        <li><a href="#">M</a></li>
        <li><a href="#">N</a></li>
        <li><a href="#">O</a></li>
        <li><a href="#">P</a></li>
        <li><a href="#">Q</a></li>
        <li><a href="#">R</a></li>
        <li><a href="#">S</a></li>
        <li><a href="#">T</a></li>
        <li><a href="#">U</a></li>
        <li><a href="#">V</a></li>
        <li><a href="#">W</a></li>
        <li><a href="#">X</a></li>
        <li><a href="#">Y</a></li>
        <li><a href="#">Z</a></li>
      </ul> <!-- end .companies-list-menu -->

      <div class="companies-list-row flex space-between no-column">
        <div id="company-list-A" class="companies-list">
          <h4 class="dark">A<span>(5 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Accenture</a></li>
            <li><a href="#0">Adecco</a></li>
            <li><a href="#0">Adidas</a></li>
            <li><a href="#0">Amiga Corportation</a></li>
            <li><a href="#0">Apple</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div id="company-list-B" class="companies-list">
          <h4 class="dark">B<span>(4 Companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Balty</a></li>
            <li><a href="#0">Bayer</a></li>
            <li><a href="#0">Beko</a></li>
            <li><a href="#0">Berkshire Hathway</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">C<span>(6 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Cadillac</a></li>
            <li><a href="#0">Canon</a></li>
            <li><a href="#0">Cathay Pacific airways limited</a></li>
            <li><a href="#0">Camex</a></li>
            <li><a href="#0">Chevrolet</a></li>
            <li><a href="#0">Cisco</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">D<span>(5 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Daewoo</a></li>
            <li><a href="#0">Daihatsu</a></li>
            <li><a href="#0">Dell</a></li>
            <li><a href="#0">Digg</a></li>
            <li><a href="#0">Dixons</a></li>
          </ul>
        </div> <!-- end .companies-list -->
      </div> <!-- end .companies-list-row -->

      <div class="companies-list-row flex space-between no-column">
        <div class="companies-list">
          <h4 class="dark">E<span>(3 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Eidos</a></li>
            <li><a href="#0">Espon</a></li>
            <li><a href="#0">Ericsson</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">F<span>(5 Companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Facebook</a></li>
            <li><a href="#0">Ferrari</a></li>
            <li><a href="#0">Flat</a></li>
            <li><a href="#0">Ford Motor company</a></li>
            <li><a href="#0">Fujitsu</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">G<span>(4 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Gieco</a></li>
            <li><a href="#0">Google</a></li>
            <li><a href="#0">Groupon</a></li>
            <li><a href="#0">Gucci</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">H<span>(4 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Harvey Norman</a></li>
            <li><a href="#0">Hitachi</a></li>
            <li><a href="#0">Honda</a></li>
            <li><a href="#0">Hudson's bay company</a></li>
          </ul>
        </div> <!-- end .companies-list -->
      </div> <!-- end .companies-list-row -->

      <div class="companies-list-row flex space-between no-column">
        <div class="companies-list">
          <h4 class="dark">E<span>(3 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Eidos</a></li>
            <li><a href="#0">Espon</a></li>
            <li><a href="#0">Ericsson</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">F<span>(5 Companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Facebook</a></li>
            <li><a href="#0">Ferrari</a></li>
            <li><a href="#0">Flat</a></li>
            <li><a href="#0">Ford Motor company</a></li>
            <li><a href="#0">Fujitsu</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">G<span>(4 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Gieco</a></li>
            <li><a href="#0">Google</a></li>
            <li><a href="#0">Groupon</a></li>
            <li><a href="#0">Gucci</a></li>
          </ul>
        </div> <!-- end .companies-list -->
        <div class="companies-list">
          <h4 class="dark">H<span>(4 companies)</span></h4>
          <ul class="list-unstyled">
            <li><a href="#0">Harvey Norman</a></li>
            <li><a href="#0">Hitachi</a></li>
            <li><a href="#0">Honda</a></li>
            <li><a href="#0">Hudson's bay company</a></li>
          </ul>
        </div> <!-- end .companies-list -->
      </div> <!-- end .companies-list-row -->

    </div> <!-- end .container -->
  </div> <!-- end .inner -->
</div> <!-- end .section -->




<script>
$(document).ready(function() {
  $('#Carousel').carousel({
      interval: 3000
  })
});
</script>

@endsection
