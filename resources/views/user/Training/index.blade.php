@extends('layouts.app')


@section('content')

<section id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
              <img src="image/slider-bg33l.jpg" alt="..." style="width:100%; height:70px;">
                <div class="carousel-caption">
                  <div class="swiper-slide-caption">
                    <div class="shell">
                      <div class="range range-lg-center">

                      </div>
                    </div>
                  </div>
                </div>
            </div>
    </section




	<main class="page-content">
		<section class="section-50 bg-primary">
			<div class="shell">
				<form  action = "http://www.powerjob.in/find-job" method = "post" id="registrationForm" data-toggle="validator" role="form" class="range offset-top-10 offset-sm-top-30">
					<input type = "hidden" name = "_token" value = "adV2vjXIggMeqgkAPknX4JCa9Y6BIudCpHEgXUQF">
					<div class="cell-lg-10">
						<div class="group-sm group-top">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 group-item">
								<div class="form-group">
									<select name="job_title" class="form-control" value="" data-constraints="@Required" >

										<option value="" selected disabled>Looking For</option>


											<option value="104">.NET Developer</option>


											<option value="200">Academic Advisor</option>


											<option value="142">Account Manager</option>


											<option value="429">Account Manager</option>


											<option value="584">Account Manager</option>


											<option value="585">Account Representative</option>


											<option value="490">Accounting Assistant</option>


											<option value="491">Accounting Clerk</option>


											<option value="521">Activities Assistant</option>


											<option value="522">Activities Coordinator</option>


											<option value="523">Activities Director</option>


											<option value="291">Activity Director</option>


											<option value="231">Adjunct Faculty</option>


											<option value="232">Adjunct Instructor</option>


											<option value="233">Adjunct Professor</option>


											<option value="492">Administrative Assistant</option>


											<option value="201">Admissions Advisor</option>


											<option value="202">Admissions Counselor</option>


											<option value="203">Admissions Representative</option>


											<option value="114">Aerospace Engineer</option>


											<option value="398">Analytical Scientist</option>


											<option value="365">Android Developer</option>


											<option value="91">Application analyst</option>


											<option value="92">Application Developer</option>


											<option value="93">Application Support Analyst</option>


											<option value="94">Applications Engineer</option>


											<option value="586">Appointment Setter</option>


											<option value="115">Architect</option>


											<option value="552">Armed Officer</option>


											<option value="553">Armed Security Officer</option>


											<option value="143">Art Director</option>


											<option value="554">Asset Protection Manager</option>


											<option value="322">Assistant Construction</option>


											<option value="587">Assistant Store Manager</option>


											<option value="95">Associate Developer</option>


											<option value="171">Auditor</option>


											<option value="555">Background Investigator</option>


											<option value="261">Baker</option>


											<option value="493">Bank Teller</option>


											<option value="262">Banquet Manager</option>


											<option value="263">Banquet Server</option>


											<option value="264">Bar Manager</option>


											<option value="265">Barista</option>


											<option value="266">Bartender</option>


											<option value="204">Behavior Specialist</option>


											<option value="399">Biochemist</option>


											<option value="400">Biological Scientist</option>


											<option value="401">Biologist</option>


											<option value="116">Biomedical Engineer</option>


											<option value="588">Brand Ambassador</option>


											<option value="172">Budget Analyst</option>


											<option value="323">Building Inspector</option>


											<option value="613">Bus Driver</option>


											<option value="173">Business Analyst</option>


											<option value="589">Business Development Manager</option>


											<option value="267">Busser</option>


											<option value="430">Call Center Manager</option>


											<option value="494">Call Center Supervisor</option>


											<option value="205">Career Counselor</option>


											<option value="524">Caregiver</option>


											<option value="525">Caretaker</option>


											<option value="324">Carpenter</option>


											<option value="590">Cashier</option>


											<option value="268">Catering Manager</option>


											<option value="207">Chaplain</option>


											<option value="9">Chartered Accountant</option>


											<option value="614">Chauffeur</option>


											<option value="269">Chef</option>


											<option value="270">Chef Manager</option>


											<option value="117">Chemical Engineer</option>


											<option value="459">Chemical Operator</option>


											<option value="402">Chemical Technician</option>


											<option value="403">Chemist</option>


											<option value="97">Chief Information Officer</option>


											<option value="96">Chief Technology Officer</option>


											<option value="20">Civil Engineer</option>


											<option value="174">Claims Adjuster</option>


											<option value="495">Clerk</option>


											<option value="404">Clinical Laboratory Scientist</option>


											<option value="405">Clinical Research Associate</option>


											<option value="208">Clinical Social Worker</option>


											<option value="209">Clinician</option>


											<option value="460">CNC Machinist</option>


											<option value="461">CNC Operator</option>


											<option value="462">CNC Programmer</option>


											<option value="271">Cocktail Server</option>


											<option value="496">Collector</option>


											<option value="144">Communications Manager</option>


											<option value="145">Communications Specialist</option>


											<option value="175">Compensation Analyst</option>


											<option value="98">Computer Systems Manager</option>


											<option value="526">Concierge</option>


											<option value="325">Concrete Finisher</option>


											<option value="326">Concrete Foreman</option>


											<option value="327">Concrete Superintendent</option>


											<option value="29">Construction Engineer</option>


											<option value="176">Construction Estimator</option>


											<option value="328">Construction Foreman</option>


											<option value="329">Construction Laborer</option>


											<option value="431">Construction Manager</option>


											<option value="432">Construction Superintendent</option>


											<option value="330">Construction Supervisor</option>


											<option value="177">Consultant</option>


											<option value="146">Content Writer</option>


											<option value="368">Contract Attorney</option>


											<option value="433">Controller</option>


											<option value="118">Controls Engineer</option>


											<option value="272">Cook</option>


											<option value="369">Corporate Attorney</option>


											<option value="370">Corporate Counsel</option>


											<option value="371">Corporate Paralegal</option>


											<option value="178">Corporate Trainer</option>


											<option value="556">Correctional Officer</option>


											<option value="527">Cosmetologist</option>


											<option value="234">Cosmetology Instructor</option>


											<option value="179">Cost Accountant</option>


											<option value="210">Counselor</option>


											<option value="615">Courier</option>


											<option value="616">Crane Operator</option>


											<option value="147">Creative Director</option>


											<option value="180">Credit Analyst</option>


											<option value="235">Criminal Justice Instructor</option>


											<option value="497">Customer Service Manager</option>


											<option value="498">Customer Service Representative</option>


											<option value="499">Customer Service Supervisor</option>


											<option value="99">Customer Support Administrator</option>


											<option value="181">Data Analyst</option>


											<option value="500">Data Entry Clerk</option>


											<option value="100">Data Quality Manager</option>


											<option value="101">Database Administrator</option>


											<option value="617">Delivery Driver</option>


											<option value="293">Dental Hygienist</option>


											<option value="294">Dentist</option>


											<option value="119">Design Engineer</option>


											<option value="557">Detention Officer</option>


											<option value="273">Dietary Cook</option>


											<option value="295">Dietitian</option>


											<option value="211">Direct Support Professional</option>


											<option value="236">Director of Education</option>


											<option value="296">Director of Nursing</option>


											<option value="434">Director of Operations</option>


											<option value="274">Dishwasher</option>


											<option value="501">Dispatcher</option>


											<option value="435">Distribution Manager</option>


											<option value="463">Distribution Supervisor</option>


											<option value="618">Distribution Supervisor</option>


											<option value="436">District Manager</option>


											<option value="619">Dock Worker</option>


											<option value="25">Doctor</option>


											<option value="528">Doorman</option>


											<option value="120">Drafter</option>


											<option value="331">Driller</option>


											<option value="620">Driver Helper</option>


											<option value="406">Economist</option>


											<option value="148">Editor</option>


											<option value="149">Editorial Assistant</option>


											<option value="332">Electrical Apprentice</option>


											<option value="121">Electrical Engineer</option>


											<option value="333">Electrical Helper</option>


											<option value="334">Electrical Superintendent</option>


											<option value="335">Electrician</option>


											<option value="336">Electrician Apprentice</option>


											<option value="337">Electrician Helper</option>


											<option value="464">Electronic Assembler</option>


											<option value="122">Electronics Technician</option>


											<option value="237">Elementary School Teacher</option>


											<option value="529">Embalmer</option>


											<option value="123">Engineering Technician</option>


											<option value="238">English Instructor</option>


											<option value="239">English Teacher</option>


											<option value="124">Entry Level Electrical Engineer</option>


											<option value="125">Environmental Engineer</option>


											<option value="407">Environmental Scientist</option>


											<option value="408">Environmental Specialist</option>


											<option value="409">Environmental Technician</option>


											<option value="338">Equipment Operator</option>


											<option value="621">Equipment Operator</option>


											<option value="652">ERP Implementater</option>


											<option value="530">Esthetician</option>


											<option value="182">Estimator</option>


											<option value="357">ETL Developer</option>


											<option value="183">Event Coordinator</option>


											<option value="502">Executive Administrative Assistant</option>


											<option value="503">Executive Assistant</option>


											<option value="275">Executive Chef</option>


											<option value="437">Executive Director</option>


											<option value="559">Facility Security Officer</option>


											<option value="126">Field Engineer</option>


											<option value="591">Field Representative</option>


											<option value="410">Field Technician</option>


											<option value="504">File Clerk</option>


											<option value="438">Finance Manager</option>


											<option value="184">Financial Advisor</option>


											<option value="185">Financial Analyst</option>


											<option value="560">Fire Chief</option>


											<option value="561">Fire Fighter</option>


											<option value="562">Fire Inspector</option>


											<option value="531">Fitness Instructor</option>


											<option value="532">Fitness Manager</option>


											<option value="533">Fitness Specialist</option>


											<option value="534">Fitness Trainer</option>


											<option value="19">Flight Attendant</option>


											<option value="28">Flight Crew</option>


											<option value="411">Food Scientist</option>


											<option value="276">Food Server</option>


											<option value="277">Food Service Manager</option>


											<option value="278">Food Service Supervisor</option>


											<option value="279">Food Service Worker</option>


											<option value="412">Food Technologist</option>


											<option value="372">Foreclosure Paralegal</option>


											<option value="339">Foreman</option>


											<option value="622">Forklift Driver</option>


											<option value="623">Forklift Operator</option>


											<option value="413">Formulation Chemist</option>


											<option value="563">Fraud Investigator</option>


											<option value="102">Front End Developer</option>


											<option value="373">General Counsel</option>


											<option value="340">General Laborer</option>


											<option value="465">General Laborer</option>


											<option value="439">General Manager</option>


											<option value="414">Geologist</option>


											<option value="150">Graphic Artist</option>


											<option value="151">Graphic Designer</option>


											<option value="27">Graphics Designer</option>


											<option value="280">Greeter</option>


											<option value="535">Groomer</option>


											<option value="536">Hair Stylist</option>


											<option value="212">Health Educator</option>


											<option value="374">Healthcare Attorney</option>


											<option value="292">Healthcare Case Manager</option>


											<option value="254">Hindi Teacher</option>


											<option value="297">Home Health Nurse</option>


											<option value="505">Human Resources Assistant</option>


											<option value="440">Human Resources Manager</option>


											<option value="152">Illustrator</option>


											<option value="375">Immigration Attorney</option>


											<option value="376">Immigration Paralegal</option>


											<option value="341">Industrial Electrician</option>


											<option value="127">Industrial Engineer</option>


											<option value="592">Inside Sales Representative</option>


											<option value="240">Instructional Designer</option>


											<option value="241">Instructor</option>


											<option value="186">Insurance Adjuster</option>


											<option value="593">Insurance Sales Agent</option>


											<option value="378">Intellectual Property Attorney</option>


											<option value="564">Intelligence Analyst</option>


											<option value="153">Interior Designer</option>


											<option value="154">Interpreter</option>


											<option value="187">Investment Analyst</option>


											<option value="366">Iphone Developer</option>


											<option value="103">Java Developer</option>


											<option value="213">Job Coach</option>


											<option value="155">Journalist</option>


											<option value="342">Journeyman Electrician</option>


											<option value="242">Kindergarten Teacher</option>


											<option value="281">Kitchen Manager</option>


											<option value="282">Kitchen Supervisor</option>


											<option value="466">Lab Technician</option>


											<option value="415">Laboratory Assistant</option>


											<option value="416">Laboratory Supervisor</option>


											<option value="298">Laboratory Technician</option>


											<option value="417">Laboratory Technician</option>


											<option value="624">Laborer</option>


											<option value="379">Law Clerk</option>


											<option value="565">Law Enforcement Officer</option>


											<option value="380">Lawyer</option>


											<option value="594">Leasing Agent</option>


											<option value="595">Leasing Consultant</option>


											<option value="381">Legal Analyst</option>


											<option value="382">Legal Assistant</option>


											<option value="506">Legal Assistant</option>


											<option value="383">Legal Clerk</option>


											<option value="384">Legal Counsel</option>


											<option value="507">Legal Secretary</option>


											<option value="243">Librarian</option>


											<option value="299">Licensed Practical Nurse</option>


											<option value="566">Lifeguard</option>


											<option value="283">Line Cook</option>


											<option value="385">Litigation Attorney</option>


											<option value="386">Litigation Paralegal</option>


											<option value="625">Loader</option>


											<option value="188">Loan Officer</option>


											<option value="508">Loan Processor</option>


											<option value="189">Logistics Manager</option>


											<option value="567">Loss Prevention Associate</option>


											<option value="568">Loss Prevention Manager</option>


											<option value="467">Machine Operator</option>


											<option value="626">Machine Operator</option>


											<option value="468">Machinist</option>


											<option value="509">Mail Clerk</option>


											<option value="351">Mainframe Developer</option>


											<option value="343">Maintenance Electrician</option>


											<option value="469">Maintenance Supervisor</option>


											<option value="470">Manual Machinist</option>


											<option value="128">Manufacturing Engineer</option>


											<option value="441">Manufacturing Manager</option>


											<option value="471">Manufacturing Manager</option>


											<option value="472">Manufacturing Supervisor</option>


											<option value="156">Marketing Assistant</option>


											<option value="157">Marketing Coordinator</option>


											<option value="647">Marketing Executive</option>


											<option value="442">Marketing Manager</option>


											<option value="158">Marketing Specialist</option>


											<option value="344">Master Electrician</option>


											<option value="627">Material Handler</option>


											<option value="129">Materials Engineer</option>


											<option value="418">Materials Scientist</option>


											<option value="473">Mechanical Assembler</option>


											<option value="130">Mechanical Engineer</option>


											<option value="244">Medical Assistant Instructor</option>


											<option value="510">Medical Biller</option>


											<option value="300">Medical Coder</option>


											<option value="511">Medical Receptionist</option>


											<option value="301">Medical Records Clerk</option>


											<option value="596">Medical Sales Representative</option>


											<option value="419">Medical Science Liaison</option>


											<option value="214">Medical Social Worker</option>


											<option value="5">Medical Surgeons</option>


											<option value="302">Medical Technologist</option>


											<option value="159">Medical Writer</option>


											<option value="215">Mental Health Clinician</option>


											<option value="216">Mental Health Counselor</option>


											<option value="217">Mental Health Professional</option>


											<option value="218">Mental Health Technician</option>


											<option value="219">Mental Health Therapist</option>


											<option value="220">Mental Health Worker</option>


											<option value="160">Merchandiser</option>


											<option value="420">Microbiologist</option>


											<option value="190">Mortgage Underwriter</option>


											<option value="537">Nanny</option>


											<option value="105">Network Architect</option>


											<option value="352">Network Engineer</option>


											<option value="353">Network Technician</option>


											<option value="245">Nurse Educator</option>


											<option value="303">Nurse Educator</option>


											<option value="304">Nurse Manager</option>


											<option value="305">Nurse Practitioner</option>


											<option value="443">Nursing Home Administrator</option>


											<option value="246">Nursing Instructor</option>


											<option value="306">Occupational Therapist</option>


											<option value="512">Office Assistant</option>


											<option value="444">Office Manager</option>


											<option value="513">Office Manager</option>


											<option value="445">Operations Manager</option>


											<option value="474">Operations Supervisor</option>


											<option value="354">Oracle Developer</option>


											<option value="628">Package Handler</option>


											<option value="131">Packaging Engineer</option>


											<option value="629">Packer</option>


											<option value="475">Painter</option>


											<option value="345">Painter</option>


											<option value="387">Paralegal</option>


											<option value="307">Paramedic</option>


											<option value="247">Paraprofessional</option>


											<option value="597">Parts Manager</option>


											<option value="284">Pastry Chef</option>


											<option value="388">Patent Attorney</option>


											<option value="308">Patient Care Technician</option>


											<option value="569">Patrol Officer</option>


											<option value="355">PC Technician</option>


											<option value="514">Personal Assistant</option>


											<option value="538">Personal Assistant</option>


											<option value="598">Personal Banker</option>


											<option value="539">Personal Care Aide</option>


											<option value="540">Personal Care Assistant</option>


											<option value="389">Personal Injury Paralegal</option>


											<option value="541">Personal Trainer</option>


											<option value="542">Pet Groomer</option>


											<option value="309">Pharmacist</option>


											<option value="310">Pharmacy Technician</option>


											<option value="161">Photographer</option>


											<option value="648">PHP Developer</option>


											<option value="248">Physical Education Teacher</option>


											<option value="311">Physical Therapist</option>


											<option value="312">Physician Assistant</option>


											<option value="346">Pipe Fitter</option>


											<option value="191">Plant Controller</option>


											<option value="446">Plant Manager</option>


											<option value="476">Plant Operator</option>


											<option value="347">Plumber</option>


											<option value="570">Police Chief</option>


											<option value="571">Police Officer</option>


											<option value="285">Prep Cook</option>


											<option value="249">Preschool Teacher</option>


											<option value="477">Press Operator</option>


											<option value="221">Probation Officer</option>


											<option value="132">Process Engineer</option>


											<option value="478">Process Operator</option>


											<option value="162">Producer</option>


											<option value="133">Product Engineer</option>


											<option value="356">Product Manager</option>


											<option value="447">Product Manager</option>


											<option value="163">Production Artist</option>


											<option value="479">Production Manager</option>


											<option value="480">Production Operator</option>


											<option value="481">Production Supervisor</option>


											<option value="482">Production Worker</option>


											<option value="250">Professor</option>


											<option value="448">Program Manager</option>


											<option value="106">Programmer</option>


											<option value="107">Programmer Analyst</option>


											<option value="192">Project Analyst</option>


											<option value="449">Project Coordinator</option>


											<option value="134">Project Engineer</option>


											<option value="135">Project Manager</option>


											<option value="450">Project Manager</option>


											<option value="164">Proofreader</option>


											<option value="193">Property Accountant</option>


											<option value="451">Property Manager</option>


											<option value="222">Psychologist</option>


											<option value="421">Psychologist</option>


											<option value="251">Psychology Instructor</option>


											<option value="572">Public Safety Officer</option>


											<option value="452">Purchasing Manager</option>


											<option value="422">Quality Assurance Analyst</option>


											<option value="483">Quality Control Inspector</option>


											<option value="136">Quality Engineer</option>


											<option value="484">Quality Inspector</option>


											<option value="485">Quality Supervisor</option>


											<option value="486">Quality Technician</option>


											<option value="599">Real Estate Agent</option>


											<option value="390">Real Estate Attorney</option>


											<option value="391">Real Estate Paralegal</option>


											<option value="515">Receptionist</option>
											<option value="543">Recreation Assistant</option>
											<option value="544">Recreation Director</option>
											<option value="545">Recreation Specialist</option>
											<option value="194">Recruiter</option>
											<option value="313">Registered Nurse</option>
											<option value="314">Remote Medical Coder</option>
											<option value="423">Research Analyst</option>
											<option value="424">Research Assistant</option>
											<option value="425">Research Associate</option>
											<option value="426">Research Scientist</option>
											<option value="427">Research Technician</option>
											<option value="546">Resident Assistant</option>
											<option value="223">Residential Counselor</option>
											<option value="315">Respiratory Therapist</option>
											<option value="286">Restaurant Manager</option>
											<option value="453">Restaurant Manager</option>
											<option value="287">Restaurant Supervisor</option>
											<option value="165">Retail Merchandiser</option>
											<option value="600">Retail Sales Associate</option>
											<option value="348">Roofer</option>
											<option value="349">Roustabout</option>
											<option value="630">Route Sales Driver</option>
											<option value="137">Safety Manager</option>
											<option value="601">Sales Associate</option>
											<option value="602">Sales Consultant</option>
											<option value="603">Sales Coordinator</option>
											<option value="604">Sales Director</option>
											<option value="605">Sales Executive</option>
											<option value="606">Sales Manager</option>
											<option value="607">Sales Representative</option>
											<option value="547">Salon Manager</option>
											<option value="316">School Nurse</option>
											<option value="252">Science Teacher</option>
										<option value="358">Scrum Master</option>
											<option value="516">Secretary</option>
											<option value="573">Security Director</option>
											<option value="574">Security Guard</option>
											<option value="575">Security Investigator</option>
											<option value="576">Security Manager</option>
											<option value="577">Security Officer</option>
											<option value="578">Security Specialist</option>
											<option value="579">Security Supervisor</option>
											<option value="288">Server</option>
											<option value="359">SharePoint Developer</option>
											<option value="580">Sheriff</option>
											<option value="289">Shift Manager</option>
											<option value="631">Shipping Manager</option>
											<option value="632">Shipping Supervisor</option>
											<option value="633">Shuttle Driver</option>
											<option value="253">Social Studies Teacher</option>
											<option value="224">Social Work Case Manager</option>
											<option value="225">Social Worker</option>
											<option value="360">Software Engineer</option>
											<option value="290">Sous Chef</option>
											<option value="317">Speech Language Pathologist</option>
											<option value="361">SQL Developer</option>
											<option value="195">Staff Accountant</option>
											<option value="392">Staff Attorney</option>
											<option value="196">Staffing Coordinator</option>
											<option value="455">Store Manager</option>
											<option value="608">Store Manager</option>
											<option value="138">Structural Engineer</option>
											<option value="548">Stylist</option>
											<option value="226">Substance Abuse Counselor</option>
											<option value="255">Substitute Teacher</option>
											<option value="350">Superintendent</option>
											<option value="318">Surgical Technician</option>
											<option value="319">Surgical Technologist</option>
											<option value="362">Systems Engineer</option>
											<option value="197">Tax Accountant</option>
											<option value="393">Tax Attorney</option>
											<option value="256">Teacher</option>
											<option value="257">Teacher Aide</option>
											<option value="258">Teacher Assistant</option>
											<option value="259">Teaching Assistant</option>
											<option value="166">Technical Writer</option>
											<option value="517">Teller</option>
											<option value="609">Teller</option>
											<option value="634">Terminal Manager</option>
											<option value="227">Therapeutic Staff Support</option>
											<option value="228">Therapist</option>
											<option value="394">Title Closer</option>
											<option value="395">Title Examiner</option>
											<option value="396">Title Processor</option>
											<option value="397">Trademark Attorney</option>
											<option value="610">Trader</option>
											<option value="198">Training Manager</option>
											<option value="167">Translator</option>
											<option value="456">Transportation Manager</option>
											<option value="635">Transportation Manager</option>
											<option value="581">Transportation Security Officer</option>
											<option value="636">Transportation Supervisor</option>
											<option value="611">Travel Agent</option>
											<option value="612">Travel Consultant</option>
											<option value="637">Truck Driver</option>
											<option value="260">Tutor</option>
											<option value="320">Utilization Review Nurse</option>
											<option value="549">Valet</option>
											<option value="139">Validation Engineer</option>
											<option value="457">Vice President</option>
											<option value="168">Videographer</option>
											<option value="169">Visual Merchandiser</option>
											<option value="518">Warehouse Associate</option>
											<option value="638">Warehouse Driver</option>
											<option value="639">Warehouse Lead</option>
											<option value="458">Warehouse Manager</option>
											<option value="640">Warehouse Manager</option>
											<option value="641">Warehouse Supervisor</option>
											<option value="519">Warehouse Worker</option>
											<option value="642">Warehouse Worker</option>
											<option value="108">Web Administrator</option>
											<option value="363">Website Designer</option>
											<option value="2">Website Developer</option>
											<option value="26">Website Tester</option>
											<option value="487">Welder</option>
											<option value="140">Welding Engineer</option>
											<option value="488">Welding Supervisor</option>
											<option value="550">Wellness Coordinator</option>
											<option value="364">Windows Administrator</option>
											<option value="170">Writer</option>
											<option value="229">Youth Counselor</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 group-item">
								<div class="form-group">
									<select id="form-filter-location" name="job_employment" class="form-control" value="" data-constraints="@Required" >
										<option value="" selected disabled>Select Location</option>
										<option value="Dar Es salaam">Dar Es salaam</option>
										<option value="Arusha">Arusha</option>
										<option value="Mwanza">Mwanza</option>
										<option value="Kigoma">Kigoma</option>
										<option value="Tanga">Tanga</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 group-item">
								<div class="form-group">
									<select id="form-filter-location" name="job_employment" class="form-control" value="" data-constraints="@Required" >
										<option value="" selected disabled>Select Employment Type</option>
										<option value="Freelance">Practical Training</option>
										<option value="Freelance">Freelance</option>
										<option value="Full Time">Full Time</option>
										<option value="Internship">Internship</option>
										<option value="Part Time">Part Time</option>
										<option value="Temporary">Temporary</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="cell-lg-2">
						<div class="reveal-block reveal-lg-inline-block">
							<button type="submit" style="max-width: 170px; min-width: 170px; min-height: 50px;" class="btn btn-warning element-fullwidth">Find Job</button>
						</div>
					</div>
				</form>
			</div>
		</section>

<section class="section-top-50 section-bottom-124">
  <div class="shell">
          <div class="table-responsive clearfix">
      <table class="table table-striped table-responsive">
        <tr>
          <th></th>
          <th>Date</th>
          <th>Company</th>
          <th>Post Title</th>
          <th>Category</th>
          <th>Subcategory</th>
          <th>City</th>
          <th>Salary</th>
          <th>Employment</th>
          <th>Action</th>
        </tr>
<tbody>
  @foreach($training as $train)
  <tr>

    <td>
      <i class="fa fa-inr text-primary" aria-hidden="true"></i>
    </td>
    <td>{{$train->created_at}}</td>
    <td>
      <a href="{{route('vacancies.show',$train->id)}}">
{{$train->company_name}}
      </a>
    </td>
    <td class="text-bold text-primary p"><a href="{{route('vacancies.show',$train->id)}}">{{$train->Title}}</a></td>
    <td>{{$train->subtitle}}</td>
    <td>Staff Accountant</td>
    <td>{{$train->location}}</td>
    <td>{{$train->salary}}</td>
    <td>{{$train->Employment_type}}</td>
    <td><a href="viewer/login.html" class="btn btn-primary" style="padding:0 10px;" target="_blank">Apply</a></td>
  </tr>
  @endforeach

</tbody>


      </table>
    </div>
  </div>
</section>


	</main>

	<div class="row" style="margin-bottom:30px; margin-top:70px;">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	                <div id="Carousel" class="carousel slide">

	                <ol class="carousel-indicators">
	                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
	                    <li data-target="#Carousel" data-slide-to="1"></li>
	                    <li data-target="#Carousel" data-slide-to="2"></li>
	                </ol>

	                <!-- Carousel items -->
	                <div class="carousel-inner">

	                <div class="item active">
	                 <div class="row">
	                   <div class="col-md-2 col-xs-4"><a href="http://reg.thonburi-u.ac.th/registrar/home.asp" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/1.jpg" alt="Image" style="height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.spu.ac.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/2.jpg" alt="Image" style="height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.spu.ac.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/3.png" alt="Image" style="height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="https://www.mahidol.ac.th/th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/4.jpg" alt="Image" style="height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.kkopenzoo.com/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/5.jpg" alt="Image" style="height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.songkhlazoo.com/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/6.jpg" alt="Image" style="height:80px;"></a></div>
	                 </div><!--.row-->
	                </div><!--.item-->

	                <div class="item">
	                 <div class="row">
	                   <div class="col-md-2 col-xs-4"><a href="http://www.zoothailand.org/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/7.jpg" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.diw.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/17.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.dss.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/9.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.dip.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/10.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.dpim.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/11.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.nstda.or.th/index.php" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/12.jpg" alt="Image" style="max-height:80px;"></a></div>
	                 </div><!--.row-->
	                </div><!--.item-->

	                <div class="item">
	                 <div class="row">
	                   <div class="col-md-2 col-xs-4"><a href="http://www.oaep.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/13.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.ops.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/14.jpg" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="/www.tisi.go.th" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/15.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="/www.oie.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/16.png" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://reg.thonburi-u.ac.th/registrar/home.asp" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/1.jpg" alt="Image" style="max-height:80px;"></a></div>
	                   <div class="col-md-2 col-xs-4"><a href="http://www.spu.ac.th" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/2.jpg" alt="Image" style="height:80px;"></a></div>
	                 </div>
	                </div>



	  </div>
	 </div>
	</div>
</div>

<script>
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 3000
    })
});
</script>




@endsection
