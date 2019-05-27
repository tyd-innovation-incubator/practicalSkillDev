@extends('layouts.app')


@section('content')

<!-- Post resume Section -->
<div class="section post-resume-form-section solid-light-grey-bg">
  <div class="inner">
    <div class="container">
      <!-- multistep form -->
      <form action="#" method="post" id="post-resume-form" class="post-resume-form multisteps-form">
          <fieldset>
            <h2 class="form-title text-center dark">Post Resume</h2>
            <h3 class="step-title text-center dark">Step 1: Gernal Information</h2>

          <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
            <li><span>1</span></li>
            <li><span>2</span></li>
            <li><span>3</span></li>
          </ul> <!-- end .steps-progress-bar -->

            <div class="form-inner">
              <h6>Already have an account? <a href="#0">Click here to login</a></h6>

            <div class="divider"></div>

            <div class="form-fields-wrapper">
              <h4 class="form-fields-title dark">Contact info</h4>
              <div class="form-group-wrapper flex space-between items-center">
                <div class="form-group">
                  <p class="label">First name</p>
                  <input type="text" id="candidate-first-name" name="candidate-first-name" placeholder="">
                </div> <!-- end .form-group -->
                <div class="form-group">
                  <p class="label">Last name</p>
                  <input type="text" id="candidate-last-name" name="candidate-last-name" placeholder="">
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

              <div class="form-group-wrapper flex space-between items-center">
                <div class="form-group">
                  <p class="label">Date of birth</p>
                  <input type="text" id="candidate-birthdate" name="candidate-birthdate" placeholder="">
                </div> <!-- end .form-group -->
                <div class="form-group">
                  <p class="label">Address<sup>*</sup></p>
                  <input type="text" id="candidate-address" name="candidate-address" placeholder="">
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

              <div class="form-group-wrapper flex space-between items-center">
                <div class="form-group">
                  <p class="label">Phone number</p>
                  <input type="text" id="candidate-phone-number" name="candidate-phone-number" placeholder="">
                </div> <!-- end .form-group -->
                <div class="form-group">
                  <p class="label">Email</p>
                  <input type="email" id="candidate-email" name="candidate-email" placeholder="">
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

            </div> <!-- end .form-fields-wrapper -->

                    <div class="divider"></div>

            <div class="form-fields-wrapper">
              <h4 class="form-fields-title dark">General info</h4>
              <div class="form-group-wrapper flex space-between items-center">
                <div class="form-group">
                  <p class="label">Position</p>
                  <input type="text" id="candidate-position" name="candidate-position" placeholder="">
                </div> <!-- end .form-group -->
                <div class="form-group">
                  <p class="label">Language</p>
                  <input type="text" id="candidate-language" name="candidate-language" placeholder="">
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

              <div class="form-group-wrapper flex space-between items-center">
                <div class="form-group">
                  <p class="label">Years of experience</p>
                  <input type="text" id="candidate-experience" name="candidate-experience" placeholder="">
                </div> <!-- end .form-group -->
                <div class="form-group">
                  <p class="label">Highest degree level</p>
                  <input type="text" id="candidate-degree" name="candidate-degree" placeholder="">
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

              <div class="form-group-wrapper flex space-between items-center">
                <div class="form-group">
                  <p class="label">Expected job type</p>
                  <input type="text" id="candidate-job-type" name="candidate-job-type" placeholder="">
                </div> <!-- end .form-group -->
                <div class="form-group">
                  <p class="label">Expected job location</p>
                  <input type="text" id="candidate-job-location" name="candidate-job-location" placeholder="">
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

              <div class="form-group-wrapper">
                <div class="form-group">
                  <p class="label">Introduce about yoursell<span>(optional)</span></p>
                  <textarea name="candidate-desc" id="candidate-desc" rows="6"></textarea>
                </div> <!-- end .form-group -->
              </div> <!-- end .form-group-wrapper -->

            </div> <!-- end .form-fields-wrapper -->

              <div class="button-wrapper text-center">
                <button type="button" class="button next">Go to step 2</button>
              </div> <!-- end .button-wrapper -->

            </div> <!-- end .form-inner -->
        </fieldset>

          <fieldset>
            <h2 class="form-title text-center dark">Post Resume</h2>
            <h3 class="step-title text-center dark">Step 2: Resume detail information</h2>

          <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
            <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
            <li class="sub-active"><span>2</span></li>
            <li><span>3</span></li>
          </ul> <!-- end .steps-progress-bar -->

            <div class="form-inner">

            <div class="form-fields-wrapper">
              <h4 class="form-fields-title dark">Education</h4>
              <div id="clonedInput" class="form-fields-inner clonedInput">

                <div class="form-group-wrapper flex space-between items-center">
                  <div class="form-group">
                    <p class="label">School<sup>*</sup></p>
                    <input type="text" id="candidate-school" name="candidate-school" placeholder="">
                  </div> <!-- end .form-group -->

                  <div class="form-group">
                    <p class="label">Field of study</p>
                    <input type="text" id="candidate-study-field" name="candidate-study-field" placeholder="">
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

                <div class="form-group-wrapper has-nested flex space-between items-center">
                  <div class="form-group-wrapper flex space-between items-center no-column no-wrap">
                    <div class="form-group">
                      <p class="label">From</p>
                      <input type="text" id="candidate-degree-from" name="candidate-degree-from" placeholder="">
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                      <p class="label">To</p>
                      <input type="text" id="candidate-degree-to" name="candidate-degree-to" placeholder="">
                    </div> <!-- end .form-group -->
                  </div> <!-- end .form-group-wrapper -->
                  <div class="form-group">
                    <p class="label">Degree</p>
                    <input type="text" id="candidate-edu-degree" name="candidate-edu-degree" placeholder="">
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

                <div class="form-group-wrapper ">
                  <div class="form-group">
                    <p class="label">Activities &amp; societies<span>(Example: Alpha)</span></p>
                    <input type="text" id="candidate-activites" name="candidate-activites" placeholder="">
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

                <div class="form-group-wrapper">
                  <div class="form-group">
                    <p class="label">Description</p>
                    <textarea name="candidate-edu-desc" id="candidate-edu-desc" rows="3" placeholder=""></textarea>
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

              </div><!-- </div> end .form-fields-inner -->

                <div class="button-wrapper dynamic-buttons flex space-between items-center no-column no-wrap">
                    <button class="clone"><span><i class="ion-ios-plus"></i></span>Add new education</button>
                    <button class="remove"><span><i class="ion-ios-trash-outline"></i></span>Delete this</button>
                </div> <!-- end .button-wrapper -->

            </div> <!-- end .form-fields-wrapper -->

            <div class="divider"></div>

            <div class="form-fields-wrapper">
              <h4 class="form-fields-title dark">Experience</h4>
              <div id="clonedInput" class="form-fields-inner clonedInput">

                <div class="form-group-wrapper flex space-between items-center">
                  <div class="form-group">
                    <p class="label">Company name<sup>*</sup></p>
                    <input type="text" id="candidate-prev-company" name="candidate-prev-company" placeholder="">
                  </div> <!-- end .form-group -->

                  <div class="form-group">
                    <p class="label">title</p>
                    <input type="text" id="candidate-prev-job-title" name="candidate-prev-job-title" placeholder="">
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

                <div class="form-group-wrapper">
                  <div class="form-group">
                    <p class="label">Location</p>
                    <input type="text" id="candidate-prev-company-location" name="candidate-prev-company-location" placeholder="">
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

                <div class="form-group-wrapper has-nested flex space-between items-center">
                  <div class="form-group-wrapper flex space-between items-center no-column no-wrap">
                    <div class="form-group">
                      <p class="label">From</p>
                      <input type="number" id="candidate-prev-company-from" name="candidate-prev-company-from" placeholder="">
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                      <p class="label">To</p>
                      <input type="number" id="candidate-prev-company-to" name="candidate-prev-company-to" placeholder="">
                    </div> <!-- end .form-group -->
                  </div> <!-- end .form-group-wrapper -->
                  <div class="form-group checkbox">
                    <input id="candidate-company-checkbox" type="checkbox">
                                <label for="candidate-company-checkbox">I currently work here</label>
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

                <div class="form-group-wrapper">
                  <div class="form-group">
                    <p class="label">Description</p>
                    <textarea name="candidate-exp-desc" id="candidate-exp-desc" rows="3" placeholder=""></textarea>
                  </div> <!-- end .form-group -->
                </div> <!-- end .form-group-wrapper -->

              </div><!-- </div> end .form-fields-inner -->

                <div class="button-wrapper dynamic-buttons flex space-between items-center no-column no-wrap">
                    <button class="clone"><span><i class="ion-ios-plus"></i></span>Add new experience</button>
                    <button class="remove"><span><i class="ion-ios-trash-outline"></i></span>Delete this</button>
                </div> <!-- end .button-wrapper -->

            </div> <!-- end .form-fields-wrapper -->

            <div class="divider"></div>

            <div class="form-fields-wrapper">
              <h4 class="form-fields-title dark">Skills</h4>
              <div id="clonedInput" class="form-fields-inner clonedInput">

                <div class="form-group-wrapper skills-field flex space-between items-center no-column no-wrap">

                  <div class="form-group">
                    <p class="label">Skill name</p>
                    <input type="text" id="candidate-skill" name="candidate-skill" placeholder="">
                  </div> <!-- end .form-group -->

                  <div class="form-group">
                    <p class="label">X<span>(1-100)</span></p>
                    <input type="text" id="candidate-skill-x" name="candidate-skill-x" placeholder="">
                  </div> <!-- end .form-group -->

                </div> <!-- end .form-group-wrapper -->

              </div><!-- </div> end .form-fields-inner -->

                <div class="button-wrapper dynamic-buttons flex space-between items-center no-column no-wrap">
                    <button class="clone"><span><i class="ion-ios-plus"></i></span>Add new skill</button>
                    <button class="remove"><span><i class="ion-ios-trash-outline"></i></span>Delete this</button>
                </div> <!-- end .button-wrapper -->

            </div> <!-- end .form-fields-wrapper -->

            <div class="divider"></div>

              <div class="button-wrapper text-center">
                <button type="button" class="button previous">Back</button>
                <button type="button" class="button next">Go to step 3</button>
              </div> <!-- end .button-wrapper -->

            </div> <!-- end .form-inner -->
        </fieldset>

        <fieldset>
            <h2 class="form-title text-center dark">Post Resume</h2>
            <h3 class="step-title text-center dark">Step 3: Review resume</h2>

          <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
            <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
            <li class="active"><span><i class="ion-ios-checkmark-empty"></i></li>
            <li class="active"><span>3</span></li>
          </ul> <!-- end .steps-progress-bar -->

          <div class="form-inner">
              <div class="profile-badge"><h6>My resume</h6></div>
                <div class="profile-wrapper">

              <div class="profile-info profile-section flex no-column no-wrap">
                <div class="profile-picture">
                  <img src="images/candidate-big01.jpg" alt="candidate-picture" class="img-responsive">
                </div> <!-- end .user-picture -->
                <div class="profile-meta">
                  <h4 class="dark">Mark anderson</h4>
                  <p>UI/UX Designer</p>
                  <div class="profile-contact flex items-center no-wrap no-column">
                    <h6 class="contact-location">Manhattan,<span>NYC, USA</span></h6>
                    <h6 class="contact-phone">(+01)-212-322-5732</h6>
                    <h6 class="contact-email">mark.anderson@gmail.com</h6>
                  </div> <!-- end .profile-contact -->
                  <ul class="list-unstyled social-icons flex no-column">
                    <li><a href="#0"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#0"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#0"><i class="ion-social-instagram"></i></a></li>
                  </ul> <!-- end .social-icons -->
                </div> <!-- end .profile-meta -->
              </div> <!-- end .profile-info -->

              <div class="divider"></div>

              <div class="profile-about profile-section">
                <h3 class="dark profile-title">About me<span><i class="ion-edit"></i></span></h3>
                <p>Nullam semper erat arcu, ac tincidunt sem venenatis vel. Curabitur at dolor ac ligula fermentum euismod ac ullamcorper nulla. Integer blandit ultricies aliquam. Pellentesque quis dui varius, dapibus velit id, iaculis ipsum. Morbi ac eros feugiat, lacinia elit ut, elementum turpis. Curabitur justo sapien, tempus sit amet rutrum eu, commodo eu lacus. Morbi in ligula nibh. Maecenas ut mi at odio hendrerit eleif end tempor vitae augue. Fusce eget arcu et nibh dapibus maximus consectetur in est. Sed iaculis luctus nibh sed venenatis.</p>
              </div> <!-- end .profile-about -->

              <div class="divider"></div>

              <div class="profile-experience-wrapper profile-section">
                <h3 class="dark profile-title">Work experience<span><i class="ion-edit"></i></span></h3>
                <div class="profile-experience flex space-between no-wrap no-column">
                  <div class="profile-experience-left">
                    <h5 class="profile-designation dark">UI/UX designer</h5>
                    <h5 class="profile-company dark">Banana inc.</h5>
                    <p class="small ultra-light">May 2015 - Present (1.5 years)</p>
                    <p>Nulla molestie sed lorem non suscipit. Morbi imperdiet ex sit amet tortor faucibus ultricies. Fusce tincidunt elementum imperdiet.</p>
                    <h6 class="projects-count">4 projects</h6>
                  </div> <!-- end .profile-experience-left -->
                  <div class="profile-experience-right">
                    <img src="images/company-logo-big01.jpg" alt="company-logo" class="img-responsive">
                  </div> <!-- end .profile-experience-right -->
                </div> <!-- end .profile-experience -->
                <div class="spacer-md"></div>
                <div class="profile-experience flex space-between no-wrap no-column">
                  <div class="profile-experience-left">
                    <h5 class="profile-designation dark">UI Designer</h5>
                    <h5 class="profile-company dark">Whale creative</h5>
                    <p class="small ultra-light">May 2013 - May 2015 (over 2 years)</p>
                    <p>Nulla molestie sed lorem non suscipit. Morbi imperdiet ex sit amet tortor faucibus ultricies. Fusce tincidunt elementum imperdiet.</p>
                    <h6 class="projects-count">4 projects</h6>
                  </div> <!-- end .profile-experience-left -->
                  <div class="profile-experience-right">
                    <img src="images/company-logo-big05.jpg" alt="company-logo" class="img-responsive">
                  </div> <!-- end .profile-experience-right -->
                </div> <!-- end .profile-experience -->
              </div> <!-- end .profile-experience-wrapper -->

              <div class="divider"></div>

              <div class="profile-education-wrapper profile-section">
                <h3 class="dark profile-title">Education<span><i class="ion-edit"></i></span></h4>
                <div class="profile-education">
                  <h5 class="dark">Massachusetts Institute of Technology</h5>
                  <p>Bachelor of Computer Science</p>
                  <p class="ultra-light">2010-2014</p>
                </div> <!-- end .profile-education -->
                <div class="spacer-md"></div>
                <div class="profile-education">
                  <h5 class="dark">School of Arts & Sciences of Stanford University</h5>
                  <p>Bachelor of Arts & Sciences</p>
                  <p class="ultra-light">2008-2012</p>
                </div> <!-- end .profile-education -->
              </div> <!-- end .profile-education-wrapper -->

              <div class="divider"></div>

              <div class="profile-skills-wrapper profile-section">
                <h3 class="dark profile-title">Summary skill<span><i class="ion-edit"></i></span></h3>
                <div class="progress-wrapper flex space-between items-center no-wrap">
                  <h6 class="progress-skill">HTML</h6>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                    </div> <!-- end .progress-bar -->
                  </div> <!-- end .progress -->
                  <h6 class="percentage"><span class="countTo" data-from="0" data-to="90">90</span>%</h6>
                </div> <!-- end .progress-wrapper -->
                <div class="spacer-xs"></div>
                <div class="progress-wrapper flex space-between items-center no-wrap">
                  <h6 class="progress-skill">WordPress</h6>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    </div> <!-- end .progress-bar -->
                  </div> <!-- end .progress -->
                  <h6 class="percentage"><span class="countTo" data-from="0" data-to="80">80</span>%</h6>
                </div> <!-- end .progress-wrapper -->
                <div class="spacer-xs"></div>
                <div class="progress-wrapper flex space-between items-center no-wrap">
                  <h6 class="progress-skill">PS</h6>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    </div> <!-- end .progress-bar -->
                  </div> <!-- end .progress -->
                  <h6 class="percentage"><span class="countTo" data-from="0" data-to="60">60</span>%</h6>
                </div> <!-- end .progress-wrapper -->
                <div class="spacer-xs"></div>
                <div class="progress-wrapper flex space-between items-center no-wrap">
                  <h6 class="progress-skill">AI</h6>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                    </div> <!-- end .progress-bar -->
                  </div> <!-- end .progress -->
                  <h6 class="percentage"><span class="countTo" data-from="0" data-to="90">90</span>%</h6>
                </div> <!-- end .progress-wrapper -->
              </div> <!-- end .profile-skills-wrapper -->

                </div> <!-- end .profile-wrapper -->

            <div class="divider"></div>

              <div class="button-wrapper text-center">
                <button type="button" class="button previous">Back</button>
                <button type="button" class="button next">Submit</button>
              </div> <!-- end .button-wrapper -->

          </div> <!-- end .form-inner -->
        </fieldset>

        <fieldset>
            <h2 class="form-title text-center dark">Post resume</h2>
            <h3 class="step-title text-center dark">You've successfully posted your resume</h2>

          <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
            <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
            <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
            <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
          </ul> <!-- end .steps-progress-bar -->

          <div class="form-inner">
            <h2 class="text-center job-post-success">Congratulations!</h2>
            <p class="text-center">You’ve successfully posted your resume. You can use it to apply for a new Training now. Whenever you want to edit your resume, please go to your <a href="#0">Dashboard</a>> <a href="#0">My resume</a>. Thank you for using our job board!</p>
              <div class="button-wrapper text-center">
                <a href="/Traininglist" class="button">Get started now</a>
              </div> <!-- end .button-wrapper -->
            </div> <!-- end .form-inner -->
        </fieldset>

      </form> <!-- end .job-post-form -->

    </div> <!-- end .container -->
  </div> <!-- end .inner -->
</div> <!-- end .section -->


@endsection
