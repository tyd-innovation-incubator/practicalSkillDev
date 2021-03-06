@extends('layouts.app')

@section('content')


  <div class="profile-head">
      <!--col-md-4 col-sm-4 col-xs-12 close-->
      <div class="col-md- col-sm-4 col-xs-12"  style="margin-top:50px;">
          <img src="http://www.newlifefamilychiropractic.net/wp-content/uploads/2014/07/300x300.gif" class="img-responsive"/>
          <h6>{{Auth::user()->name}}</h6>
          <div >
              <span class="btn btn-default uplod-file">
                      Upload Photo <input type="file" />
              </span>
          </div>
      </div>
      <!--col-md-4 col-sm-4 col-xs-12 close-->

      <div class="col-md-5 col-sm-5 col-xs-12" style="margin-top:130px;">
          <h5>{{Auth::user()->name}}</h5>
          <p>Content Designer / Content Engineer </p>
      </div>
  </div>
  <!--profile-head close-->
<!--container close-->


<br/>
<br/>

<div class="container" >
   <div class="col-sm-8" style="margin-top:30px;">
       <div data-spy="scroll" class="tabbable-panel">
           <div class="tabbable-line">
               <ul class="nav nav-tabs ">
                   <li class="active">
                       <a href="#tab_default_1" data-toggle="tab">Personal Info </a>
                   </li>
                   <li>
                       <a href="#tab_default_2" data-toggle="tab">Education</a>
                   </li>
                   <li>
                       <a href="#tab_default_3" data-toggle="tab">Work Experience</a>
                   </li>
                   <li>
                       <a href="#tab_default_4" data-toggle="tab">Contact Details</a>
                   </li>
                   <li>
                       <a href="#tab_default_5" data-toggle="tab">Address Details</a>
                   </li>
                   <li>
                       <a href="#tab_default_6" data-toggle="tab">Resume</a>
                   </li>
               </ul>
               <div class="tab-content">
                   <div class="tab-pane active" id="tab_default_1">
                       <div class="well well-sm">
                           <h4>PERSONAL DATA</h4>
                       </div>
                   <p align="right">
                       <button type="button" class="btn btn-default btn-sm">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>
                   </p>
                   <table class="table bio-table">
                       <tbody>
                           <tr>
                               <td>Firstname</td>
                               <td>: Vijayan</td>
                           </tr>
                           <tr>
                               <td>Lastname</td>
                               <td>: Karuppaiah</td>
                           </tr>
                           <tr>
                               <td>Date of Birthday</td>
                               <td>: 6 March 1980</td>
                           </tr>
                           <tr>
                               <td>Gender</td>
                               <td>: Male</td>
                           </tr>
                           <tr>
                               <td>Spouse </td>
                               <td>: Vijayalakshmi</td>
                           </tr>
                           <tr>
                               <td>Name of Children</td>
                               <td>: Darshan</td>
                           </tr>
                           <tr>
                               <td>Father's Name</td>
                               <td>: Karuppaiah</td>
                           </tr>
                           <tr>
                               <td>Mother's Name</td>
                               <td>: Palani Mayil</td>
                           </tr>
                           <tr>
                               <td>Citizenship</td>
                               <td>: Indian</td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="tab-pane" id="tab_default_2">
                   <div class="well well-sm">
                       <h4>EDUCATIONAL BACKGROUND</h4>
                   </div>
                   <p align="right">
                       <button type="button" class="btn btn-default btn-sm">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>
                   </p>
                   <table class="table bio-table">
                       <tbody>
                           <tr>
                               <td>Elementary School</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>High School</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Under Graduate</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Post Graduate</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Master of Philosophy (MPhil)</td>
                               <td>: </td>
                               <td>Year Graduated </td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Doctor of Philosophy (PhD)</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Bachelor of Engineering (B.Eng)<br/>Bachelor of Technology (B.Tech)</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Master of Engineering (M.Eng)<br/>Master of Technology (M.Tech)</td>
                               <td>: </td>
                               <td>Year Graduated</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="tab-pane" id="tab_default_3">
                   <div class="well well-sm">
                       <h4>EMPLOYMENT RECORD</h4>
                   </div>
                   <p align="right">
                       <button type="button" class="btn btn-default btn-sm">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>
                   </p>
                   <table class="table bio-table">
                       <tbody>
                           <tr>
                               <td>Date</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Position</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Principle Activites</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Employer</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Type of Activites</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>

                   <br/>

                   <table class="table bio-table">
                       <tbody>
                           <tr>
                               <td>Date</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Position</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Principle Activites</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Employer</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Type of Activites</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>

                   <br/>

                   <table class="table bio-table">
                       <tbody>
                           <tr>
                               <td>Date</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Position</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Principle Activites</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Employer</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Type of Activites</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="tab-pane" id="tab_default_4">
                   <div class="well well-sm">
                       <h4>OFFICIAL AND PERSONAL CONTACTS</h4>
                   </div>
                   <p align="right">
                       <button type="button" class="btn btn-default btn-sm">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>
                   </p>
                   <table class="table bio-table">
                       <tbody>
                           <tr>
                               <td>Office Telephone Number</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Office Mobile Phone</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Official Email Address</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Personal Mobile Phone</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Personal Email Address </td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Home Phone</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Facebook Account</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Twitter Account</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>Skype Account</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>LinkedIn Account</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="tab-pane" id="tab_default_5">
                   <div class="well well-sm">
                       <h4>ADDRESS DETAILS</h4>
                   </div>
                   <p align="right">
                       <button type="button" class="btn btn-default btn-sm">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>
                   </p>
                   <table class="table bio-table">
                       <thead>
                           <tr>
                               <th colspan="2">Present Residential Address</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>   Line 1</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   Line 2</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   City</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   State</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   Country</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   Pin code</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>

                   <br/>

                   <table class="table bio-table">
                       <thead>
                           <tr>
                               <th colspan="2">Permanent Residential Address</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>   Plot No / Door No / Part No / Block No</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   Street Name</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   City</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   State</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   Country</td>
                               <td>: </td>
                           </tr>
                           <tr>
                               <td>   Pin code</td>
                               <td>: </td>
                           </tr>
                       </tbody>
                   </table>

               </div>

               <div class="tab-pane" id="tab_default_6">
                   <div class="well well-sm">
                       <h4>ADDRESS DETAILS</h4>
                   </div>
                   <p align="right">
                       <button type="button" class="btn btn-default btn-sm">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>
                   </p>
                   <div class="row">
                       <div class="col-md-4 col-md-offset-4">
                           <form class="form-horizontal" role="form">
                               <fieldset>
                               <!-- Form Name -->
                                   <legend>Address Details</legend>
                                   <!-- Text input-->
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label" for="textinput">Line 1</label>
                                       <div class="col-sm-10">
                                           <input type="text" placeholder="Address Line 1" class="form-control">
                                       </div>
                                   </div>
                                   <!-- Text input-->
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label" for="textinput">Line 2</label>
                                       <div class="col-sm-10">
                                           <input type="text" placeholder="Address Line 2" class="form-control">
                                       </div>
                                   </div>
                                   <!-- Text input-->
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label" for="textinput">City</label>
                                       <div class="col-sm-10">
                                           <input type="text" placeholder="City" class="form-control">
                                       </div>
                                   </div>
                                   <!-- Text input-->
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label" for="textinput">State</label>
                                       <div class="col-sm-4">
                                           <input type="text" placeholder="State" class="form-control">
                                       </div>
                                       <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                                       <div class="col-sm-4">
                                           <input type="text" placeholder="Post Code" class="form-control">
                                       </div>
                                   </div>
                                   <!-- Text input-->
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label" for="textinput">Country</label>
                                       <div class="col-sm-10">
                                           <input type="text" placeholder="Country" class="form-control">
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="col-sm-offset-2 col-sm-10">
                                           <div class="pull-right">
                                               <button type="submit" class="btn btn-default">Cancel</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                           </div>
                                       </div>
                                   </div>

                               </fieldset>
                           </form>
                       </div><!-- /.col-lg-12 -->
                   </div><!-- /.row -->

               </div>

           </div>
       </div>
   </div>
 </div>

 <div class="col-sm-4" style="margin-top:30px;">
   <div class="panel panel-default">
       <div class="menu_title">
           <b>Employee Info</b>
           <p>RSI Content Solutions India Pvt. Ltd</p>
       </div>
       <div class="panel-body">
           <div class="row">
               <div class="col-lg-12">
                 <div class=" clearfix">
		        <h3>Abhinav Bhattacharya </h3>
		        <div class="profile-ratings">
		            <i class="fa fa-star"></i>
		            <i class="fa fa-star"></i>
		            <i class="fa fa-star"></i>
		            <i class="fa fa-star"></i>
		            <i class="fa fa-star"></i>
		        </div>
		        <h4>You are a Free Member</h4>
                 <button type="button" class="btn btn-success btn-md pull-center">Upgrade now</button>
		       <hr>



		    </div>
               </div>
           </div>
       </div>
   </div>
 </div>




@endsection
