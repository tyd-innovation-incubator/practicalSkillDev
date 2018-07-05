@extends('layouts.dashboard')

@section('content')
      <div class="panel panel-primary">
<div class="panel-heading">Personal Details</div>
<div class="panel-body">
  <div class="row">
    <div class="col-md-5">

                  <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">

                          <div class="col-md-12">
                            <label for="firstname" class="col-md-4 control-label">FirstName</label>

                              <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                              @if ($errors->has('firstname'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('firstname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

  <div class="col-md-12">
    <label for="Lastname" class="col-md-4 control-label">Lastname</label>
      <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

      @if ($errors->has('lastname'))
          <span class="help-block">
              <strong>{{ $errors->first('lastname') }}</strong>
          </span>
      @endif
  </div>
</div>
                      <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">

                          <div class="col-md-12">
                            <label for="middlename" class="col-md-4 control-label">MiddleName</label>

                              <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" required autofocus>

                              @if ($errors->has('middlename'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('middlename') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                          <div class="col-md-12">
                            <label for="password" class="col-md-4 control-label">Gender</label>

                            <select class="form-control">
                              <option value="volvo">Male</option>
                                <option value="saab">Female</option>
                            </select>

                              @if ($errors->has('gender'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-md-12">
                            <label for="nationality" class="col-md-4 control-label">Nationality</label>

                            <select class="form-control">

	<option value="AF">Afghanistan</option>
	<option value="AX">Åland Islands</option>
	<option value="AL">Albania</option>
	<option value="DZ">Algeria</option>
	<option value="AS">American Samoa</option>
	<option value="AD">Andorra</option>
	<option value="AO">Angola</option>
	<option value="AI">Anguilla</option>
	<option value="AQ">Antarctica</option>
	<option value="AG">Antigua and Barbuda</option>
	<option value="AR">Argentina</option>
	<option value="AM">Armenia</option>
	<option value="AW">Aruba</option>
	<option value="AU">Australia</option>
	<option value="AT">Austria</option>
	<option value="AZ">Azerbaijan</option>
	<option value="BS">Bahamas</option>
	<option value="BH">Bahrain</option>
	<option value="BD">Bangladesh</option>
	<option value="BB">Barbados</option>
	<option value="BY">Belarus</option>
	<option value="BE">Belgium</option>
	<option value="BZ">Belize</option>
	<option value="BJ">Benin</option>
	<option value="BM">Bermuda</option>
	<option value="BT">Bhutan</option>
	<option value="BO">Bolivia, Plurinational State of</option>
	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
	<option value="BA">Bosnia and Herzegovina</option>
	<option value="BW">Botswana</option>
	<option value="BV">Bouvet Island</option>
	<option value="BR">Brazil</option>
	<option value="IO">British Indian Ocean Territory</option>
	<option value="BN">Brunei Darussalam</option>
	<option value="BG">Bulgaria</option>
	<option value="BF">Burkina Faso</option>
	<option value="BI">Burundi</option>
	<option value="KH">Cambodia</option>
	<option value="CM">Cameroon</option>
	<option value="CA">Canada</option>
	<option value="CV">Cape Verde</option>
	<option value="KY">Cayman Islands</option>
	<option value="CF">Central African Republic</option>
	<option value="TD">Chad</option>
	<option value="CL">Chile</option>
	<option value="CN">China</option>
	<option value="CX">Christmas Island</option>
	<option value="CC">Cocos (Keeling) Islands</option>
	<option value="CO">Colombia</option>
	<option value="KM">Comoros</option>
	<option value="CG">Congo</option>
	<option value="CD">Congo, the Democratic Republic of the</option>
	<option value="CK">Cook Islands</option>
	<option value="CR">Costa Rica</option>
	<option value="CI">Côte d'Ivoire</option>
	<option value="HR">Croatia</option>
	<option value="CU">Cuba</option>
	<option value="CW">Curaçao</option>
	<option value="CY">Cyprus</option>
	<option value="CZ">Czech Republic</option>
	<option value="DK">Denmark</option>
	<option value="DJ">Djibouti</option>
	<option value="DM">Dominica</option>
	<option value="DO">Dominican Republic</option>
	<option value="EC">Ecuador</option>
	<option value="EG">Egypt</option>
	<option value="SV">El Salvador</option>
	<option value="GQ">Equatorial Guinea</option>
	<option value="ER">Eritrea</option>
	<option value="EE">Estonia</option>
	<option value="ET">Ethiopia</option>
	<option value="FK">Falkland Islands (Malvinas)</option>
	<option value="FO">Faroe Islands</option>
	<option value="FJ">Fiji</option>
	<option value="FI">Finland</option>
	<option value="FR">France</option>
	<option value="GF">French Guiana</option>
	<option value="PF">French Polynesia</option>
	<option value="TF">French Southern Territories</option>
	<option value="GA">Gabon</option>
	<option value="GM">Gambia</option>
	<option value="GE">Georgia</option>
	<option value="DE">Germany</option>
	<option value="GH">Ghana</option>
	<option value="GI">Gibraltar</option>
	<option value="GR">Greece</option>
	<option value="GL">Greenland</option>
	<option value="GD">Grenada</option>
	<option value="GP">Guadeloupe</option>
	<option value="GU">Guam</option>
	<option value="GT">Guatemala</option>
	<option value="GG">Guernsey</option>
	<option value="GN">Guinea</option>
	<option value="GW">Guinea-Bissau</option>
	<option value="GY">Guyana</option>
	<option value="HT">Haiti</option>
	<option value="HM">Heard Island and McDonald Islands</option>
	<option value="VA">Holy See (Vatican City State)</option>
	<option value="HN">Honduras</option>
	<option value="HK">Hong Kong</option>
	<option value="HU">Hungary</option>
	<option value="IS">Iceland</option>
	<option value="IN">India</option>
	<option value="ID">Indonesia</option>
	<option value="IR">Iran, Islamic Republic of</option>
	<option value="IQ">Iraq</option>
	<option value="IE">Ireland</option>
	<option value="IM">Isle of Man</option>
	<option value="IL">Israel</option>
	<option value="IT">Italy</option>
	<option value="JM">Jamaica</option>
	<option value="JP">Japan</option>
	<option value="JE">Jersey</option>
	<option value="JO">Jordan</option>
	<option value="KZ">Kazakhstan</option>
	<option value="KE">Kenya</option>
	<option value="KI">Kiribati</option>
	<option value="KP">Korea, Democratic People's Republic of</option>
	<option value="KR">Korea, Republic of</option>
	<option value="KW">Kuwait</option>
	<option value="KG">Kyrgyzstan</option>
	<option value="LA">Lao People's Democratic Republic</option>
	<option value="LV">Latvia</option>
	<option value="LB">Lebanon</option>
	<option value="LS">Lesotho</option>
	<option value="LR">Liberia</option>
	<option value="LY">Libya</option>
	<option value="LI">Liechtenstein</option>
	<option value="LT">Lithuania</option>
	<option value="LU">Luxembourg</option>
	<option value="MO">Macao</option>
	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
	<option value="MG">Madagascar</option>
	<option value="MW">Malawi</option>
	<option value="MY">Malaysia</option>
	<option value="MV">Maldives</option>
	<option value="ML">Mali</option>
	<option value="MT">Malta</option>
	<option value="MH">Marshall Islands</option>
	<option value="MQ">Martinique</option>
	<option value="MR">Mauritania</option>
	<option value="MU">Mauritius</option>
	<option value="YT">Mayotte</option>
	<option value="MX">Mexico</option>
	<option value="FM">Micronesia, Federated States of</option>
	<option value="MD">Moldova, Republic of</option>
	<option value="MC">Monaco</option>
	<option value="MN">Mongolia</option>
	<option value="ME">Montenegro</option>
	<option value="MS">Montserrat</option>
	<option value="MA">Morocco</option>
	<option value="MZ">Mozambique</option>
	<option value="MM">Myanmar</option>
	<option value="NA">Namibia</option>
	<option value="NR">Nauru</option>
	<option value="NP">Nepal</option>
	<option value="NL">Netherlands</option>
	<option value="NC">New Caledonia</option>
	<option value="NZ">New Zealand</option>
	<option value="NI">Nicaragua</option>
	<option value="NE">Niger</option>
	<option value="NG">Nigeria</option>
	<option value="NU">Niue</option>
	<option value="NF">Norfolk Island</option>
	<option value="MP">Northern Mariana Islands</option>
	<option value="NO">Norway</option>
	<option value="OM">Oman</option>
	<option value="PK">Pakistan</option>
	<option value="PW">Palau</option>
	<option value="PS">Palestinian Territory, Occupied</option>
	<option value="PA">Panama</option>
	<option value="PG">Papua New Guinea</option>
	<option value="PY">Paraguay</option>
	<option value="PE">Peru</option>
	<option value="PH">Philippines</option>
	<option value="PN">Pitcairn</option>
	<option value="PL">Poland</option>
	<option value="PT">Portugal</option>
	<option value="PR">Puerto Rico</option>
	<option value="QA">Qatar</option>
	<option value="RE">Réunion</option>
	<option value="RO">Romania</option>
	<option value="RU">Russian Federation</option>
	<option value="RW">Rwanda</option>
	<option value="BL">Saint Barthélemy</option>
	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KN">Saint Kitts and Nevis</option>
	<option value="LC">Saint Lucia</option>
	<option value="MF">Saint Martin (French part)</option>
	<option value="PM">Saint Pierre and Miquelon</option>
	<option value="VC">Saint Vincent and the Grenadines</option>
	<option value="WS">Samoa</option>
	<option value="SM">San Marino</option>
	<option value="ST">Sao Tome and Principe</option>
	<option value="SA">Saudi Arabia</option>
	<option value="SN">Senegal</option>
	<option value="RS">Serbia</option>
	<option value="SC">Seychelles</option>
	<option value="SL">Sierra Leone</option>
	<option value="SG">Singapore</option>
	<option value="SX">Sint Maarten (Dutch part)</option>
	<option value="SK">Slovakia</option>
	<option value="SI">Slovenia</option>
	<option value="SB">Solomon Islands</option>
	<option value="SO">Somalia</option>
	<option value="ZA">South Africa</option>
	<option value="GS">South Georgia and the South Sandwich Islands</option>
	<option value="SS">South Sudan</option>
	<option value="ES">Spain</option>
	<option value="LK">Sri Lanka</option>
	<option value="SD">Sudan</option>
	<option value="SR">Suriname</option>
	<option value="SJ">Svalbard and Jan Mayen</option>
	<option value="SZ">Swaziland</option>
	<option value="SE">Sweden</option>
	<option value="CH">Switzerland</option>
	<option value="SY">Syrian Arab Republic</option>
	<option value="TW">Taiwan, Province of China</option>
	<option value="TJ">Tajikistan</option>
	<option value="TZ" class="active">Tanzania, United Republic of</option>
	<option value="TH">Thailand</option>
	<option value="TL">Timor-Leste</option>
	<option value="TG">Togo</option>
	<option value="TK">Tokelau</option>
	<option value="TO">Tonga</option>
	<option value="TT">Trinidad and Tobago</option>
	<option value="TN">Tunisia</option>
	<option value="TR">Turkey</option>
	<option value="TM">Turkmenistan</option>
	<option value="TC">Turks and Caicos Islands</option>
	<option value="TV">Tuvalu</option>
	<option value="UG">Uganda</option>
	<option value="UA">Ukraine</option>
	<option value="AE">United Arab Emirates</option>
	<option value="GB">United Kingdom</option>
	<option value="US">United States</option>
	<option value="UM">United States Minor Outlying Islands</option>
	<option value="UY">Uruguay</option>
	<option value="UZ">Uzbekistan</option>
	<option value="VU">Vanuatu</option>
	<option value="VE">Venezuela, Bolivarian Republic of</option>
	<option value="VN">Viet Nam</option>
	<option value="VG">Virgin Islands, British</option>
	<option value="VI">Virgin Islands, U.S.</option>
	<option value="WF">Wallis and Futuna</option>
	<option value="EH">Western Sahara</option>
	<option value="YE">Yemen</option>
	<option value="ZM">Zambia</option>
	<option value="ZW">Zimbabwe</option>

                            </select>
                              </div>
                      </div>


                  </form>
    </div>
    <div class="col-md-5">

                          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                              {{ csrf_field() }}

                              <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">

                                  <div class="col-md-12">
                                    <label for="date_of_birth" class="col-md-6 control-label">Date of Birth</label>

                                      <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

                                      @if ($errors->has('date_of_birth'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('date_of_birth') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

        <div class="form-group{{ $errors->has('region_of_birth') ? ' has-error' : '' }}">

          <div class="col-md-12">
            <label for="region_of_birth" class="col-md-6 control-label">Region of Birth</label>
            <select name="region_of_birth" class="form-control applicant-input" id="region">
            <option value="">---Select---</option>
            <option value="23">Arusha</option>
            <option value="24">Dar es Salaam</option>
            <option value="1">Dodoma</option>
            <option value="11">Geita</option>
            <option value="2" selected="selected">Iringa</option>
            <option value="3">Kagera</option>
            <option value="12">Katavi</option>
            <option value="4">Kigoma</option>
            <option value="5">Kilimanjaro</option>
            <option value="6">Lindi</option>
            <option value="7">Manyara</option>
            <option value="8">Mara</option>
            <option value="9">Mbeya</option>
            <option value="14">Morogoro</option>
            <option value="15">Mtwara</option>
            <option value="16">Mwanza</option>
            <option value="10">Njombe</option>
            <option value="26">Pemba Kaskazini</option>
            <option value="27">Pemba Kusini</option>
            <option value="17">Pwani</option>
            <option value="18">Rukwa</option>
            <option value="25">Ruvuma</option>
            <option value="19">Shinyanga</option>
            <option value="13">Simiyu</option>
            <option value="20">Singida</option>
            <option value="31">Songwe</option>
            <option value="21">Tabora</option>
            <option value="22">Tanga</option>
            <option value="28">Zanzibar Kati/Kusini </option>
            <option value="29">Zanzibar Mjini Kaskazini</option>
            <option value="30">Zanzibar Mjini Magharibi</option>
            </select>
              @if ($errors->has('region_of_birth'))
                  <span class="help-block">
                      <strong>{{ $errors->first('region_of_birth') }}</strong>
                  </span>
              @endif
          </div>
        </div>
        <div id="districtOption">
<label>District of Birth</label>
<select name="district_of_birth" class="form-control applicant-input" id="district" required="">
<option value="">---Select---</option>
<option value="1">Chemba</option>
<option value="2">Dodoma</option>
<option value="3">Mpwapwa</option>
<option value="4">Bahi</option>
<option value="5">Kondoa</option>
<option value="6">Chamwino</option>
<option value="7">Kongwa</option>
<option value="8">Kilolo</option>
<option value="9">Iringa </option>
<option value="10" selected="selected">Mufindi</option>
<option value="11">Biharamulo</option>
<option value="12">Kyerwa</option>
<option value="13">Bukoba</option>
<option value="14">Misenyi</option>
<option value="15">Muleba</option>
<option value="16">Karagwe</option>
<option value="17">Ngara</option>
<option value="18">Kasulu</option>
<option value="19">Kigoma</option>
<option value="20">Kibondo</option>
<option value="21">Hai</option>
<option value="22">Moshi</option>
<option value="23">Rombo</option>
<option value="24">Mwanga</option>
<option value="25">Same</option>
<option value="26">Siha</option>
<option value="27">Lindi</option>
<option value="28">Liwale</option>
<option value="29">Kilwa</option>
<option value="30">Nachingwea</option>
<option value="31">Ruangwa</option>
<option value="32">Babati</option>
<option value="33">Hanang</option>
<option value="34">Kiteto</option>
<option value="35">Simanjiro</option>
<option value="36">Mbulu</option>
<option value="37">Bunda</option>
<option value="38">Butiama</option>
<option value="39">Musoma</option>
<option value="41">Rorya</option>
<option value="42">Serengeti</option>
<option value="43">Tarime</option>
<option value="44">Mbeya</option>
<option value="45">Mbarali</option>
<option value="46">Busokelo</option>
<option value="47">Rungwe</option>
<option value="48">Tunduma</option>
<option value="49">Kyela</option>
<option value="50">Chunya</option>
<option value="51">Makete</option>
<option value="52">Njombe</option>
<option value="53">Ludewa</option>
<option value="54">Wanging'ombe</option>
<option value="55">Bukombe</option>
<option value="56">Chato</option>
<option value="57">Geita</option>
<option value="58">Mbongwe</option>
<option value="59">Nyang'hwale</option>
<option value="60">Mlele</option>
<option value="61">Mpanda</option>
<option value="62">Bariadi</option>
<option value="63">Busega</option>
<option value="64">Maswa</option>
<option value="65">Meatu</option>
<option value="66">Itilima</option>
<option value="67">Mvomero</option>
<option value="68">Morogoro</option>
<option value="69">Mtwara</option>
<option value="70">Masasi</option>
<option value="71">Nanyumbu</option>
<option value="72">Newala</option>
<option value="73">Tandahimba</option>
<option value="74">Nyamagana</option>
<option value="75">Ilemela</option>
<option value="76">Kwimba</option>
<option value="77">Magu</option>
<option value="78">Misungwi</option>
<option value="79">Ukerewe</option>
<option value="80">Sengerema</option>
<option value="81">Kibaha</option>
<option value="82">Bagamoyo</option>
<option value="83">Kisarawe</option>
<option value="84">Mkuranga</option>
<option value="85">Rufiji</option>
<option value="86">Mafia</option>
<option value="87">Sumbawanga</option>
<option value="88">Nkasi</option>
<option value="89">Kalambo</option>
<option value="90">Kahama</option>
<option value="91">Kishapu</option>
<option value="93">Shinyanga</option>
<option value="95">Singida</option>
<option value="96">Iramba</option>
<option value="97">Ikungi</option>
<option value="98">Mkalama</option>
<option value="99">Manyoni</option>
<option value="100">Urambo</option>
<option value="101">Nzega</option>
<option value="102">Igunga</option>
<option value="103">Uyui</option>
<option value="104">Tabora</option>
<option value="105">Sikonge</option>
<option value="106">Tanga</option>
<option value="107">Muheza</option>
<option value="108">Kilindi</option>
<option value="109">Korogwe</option>
<option value="110">Lushoto</option>
<option value="111">Handeni</option>
<option value="112">Pangani</option>
<option value="113">Mkinga</option>
<option value="114">Longido</option>
<option value="115">Monduli</option>
<option value="116">Arusha</option>
<option value="117">Ilala</option>
<option value="118">Kinondoni</option>
<option value="119">Temeke</option>
<option value="120">Mbinga</option>
<option value="121">Songea</option>
<option value="123">Tunduru</option>
<option value="124">Namtumbo</option>
<option value="125">Nyasa</option>
<option value="126">Wete</option>
<option value="127">Micheweni</option>
<option value="128">Chakechake</option>
<option value="129">Mkoani</option>
<option value="130">Kati</option>
<option value="131">Kusini</option>
<option value="132">Magharibi "A"</option>
<option value="133">Kaskazini "B"</option>
<option value="134">Mjini</option>
<option value="135">Magharibi</option>
<option value="136">Karatu</option>
<option value="137">Meru</option>
<option value="138">Ngorongoro</option>
<option value="139">Ubungo</option>
<option value="140">Kigamboni</option>
<option value="141">Tanganyika</option>
<option value="142">Nsimbo</option>
<option value="143">Buhigwe</option>
<option value="144">Uvinza</option>
<option value="145">Kakonko</option>
<option value="146">Gairo</option>
<option value="147">Kilombero</option>
<option value="148">Kilosa</option>
<option value="149">Ulanga</option>
<option value="150">Malinyi</option>
<option value="151">Nanyamba</option>
<option value="152">Makambako</option>
<option value="153">Kaliua</option>
<option value="154">Mbozi</option>
<option value="155">Momba</option>
<option value="156">Songwe</option>
<option value="157">Ileje</option>
</select>
  </div>

                              <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}  " style="margin-top:30px;">

                                  <div class="col-md-12">
                                    <label for="marital_status" class="col-md-6 control-label">Marital Status</label>

                                    <select name="marital_status" class="form-control applicant-input">
                               <option value="0" selected="selected">Single</option>
                               <option value="1">Married</option>
                               <option value="2">Other</option>
                               </select>
                                      @if ($errors->has('marital_status'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('marital_status') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group" style="margin-top:50px;">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary">
                                          Save
                                      </button>
                                  </div>
                              </div>
                          </form>
    </div>
  </div>

</div>
      </div>


@endsection
