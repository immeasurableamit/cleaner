@extends('layouts.app')

@section('content')
<section class="authentication-sec light-banner signup-page" style="background-image: url('assets/images/white-pattern.png')">
  <div class="container signup_all_container">
    <div class="signup-selection-wrapper">
      <div class="selection-wrap d-flex justify-content-spacebw">
        <div class="select-inner-box position-relative customer">
          <div class="select-signup-img">
            <img src="assets/images/customer.png">
          </div>
          <div class="select-signup-cntnt">
            <p>I’m a Customer</p>
          </div>
          <a href="{{route('signup-customers')}}" class="link-overlay"></a>
        </div>
        <div class="select-inner-box position-relative cleaner active">
          <div class="select-signup-img">
            <img src="assets/images/cleaner.png">
          </div>
          <div class="select-signup-cntnt">
            <p>I’m a Cleaner</p>
          </div>
          <a href="{{route('signup-cleaner')}}" class="link-overlay"></a>
        </div>
      </div>
    </div>
    <div class="authentication-form-wrapper">
      <form class="form-design" method="post" action="{{route('register')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_type" value="cleaner">
        <div class="row no-mrg">
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 no-padd">
            <div class="blue-bg-wrapper"  >
              <div class="avatar-upload">
                <div class="avatar-edit">
                  <input type='file' name="image" id="upload" class= "file" accept="image/*" />
                  <label for="upload">Upload a profile pic</label>
          
                </div>



                <div class="lawyer_profile-img mb-3">
                    <div class="circle" id="uploaded">
                        <img class="profile-pic" src="">
                    </div>
                    <div class="p-image">
                        <!-- <span class="pencil_icon"><i class="fa-solid fa-pencil upload-button"></i></span> -->
                        <!-- <input class="file-upload" id="upload" type="file" accept="image/*" /> -->
                        <input type="hidden" name="image" id="upload-img" />
                    </div>
                </div>


                <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url(assets/images/thumbnail.png);">
                    <!-- <button class="delete-btn"><img src="assets/images/icons/delete.svg"></button> -->
                  </div>
                </div>
              </div>

              <div class="form-grouph textarea-single-design">
                <label>About yourself (Optional)</label>
                <textarea name="about">Efficiently promote best-of-breed customer service after magnetic niche markets.</textarea>
                @error('about')<span class="alert ">{{ $message }}</span>@enderror
              </div>
              <div class="folow-us">
                <ul class="list-unstyled d-flex justify-content-center">
                  <li><span>Follow Us</span></li>
                  <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
              <div class="blue-logo-block text-center">
                <a href="#"><img src="assets/images/logo/logo.svg"></a>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 no-padd">
            <div class="singup_auth-design">
              <div class="account-header-heading text-center">
                <h4><img src="assets/images/icons/white-circle-user.svg"> Cleaner Info</h4>
              </div>
              <div class="form-heading-h4 text-center">
                <h4>Please enter the following information to create your account</h4>
              </div>
              <div class="signup-form-grouph">
                <div class="form-flex two-column">
                  <div class="form-left-block">
                    <!-- <input type="hidden" name="role" value="cleaner"> -->
                    <div class="form-grouph input-design mb-30{!! ($errors->has('first_name') ? ' has-error' : '') !!}">
                      <input type="text" placeholder="First name" name="first_name" class="($errors->has('first_name') ? ' is-invalid' : '')" value="{{old('first_name')}}">
                      {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="text" placeholder="Last Name" name="last_name" value="{{old('last_name')}}">
                      @error('last_name')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="email" name="email" placeholder="Email (this will be your login)" value="{{old('email')}}">
                      @error('email')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="text" name="address" placeholder="Address" value="{{old('address')}}">
                      @error('address')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph mb-30 input-select-abs">
                      <div class="inputs-box">
                        <input type="text" name="city" placeholder="City" value="{{old('city')}}">
                        @error('city')<span class="alert ">{{ $message }}</span>@enderror
                      </div>
                      <div class="selecti-box">
                        <select class="select-custom-design" name="state">
                          <option>Select State</option>
                          @foreach ($states as $state)
                          <option value="{{ $state->id }}">{{ $state->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-grouph mb-30">
                      <label>Birth Day</label>
                      <div class="select-three-pair d-flex">
                        <div class="select-box-design-first">
                          <select class="select-custom-design" name="month" value="{{old('month')}}">
                            <option value="" disabled selected>Month</option>
                            @for($i = 1; $i <=12; $i++) <option value="{{old('month') ?? $i<=9 ? '0'.$i : $i }}">{{ date('F', mktime(0,0,0,$i)) }}</option>
                              @endfor
                          </select>
                          @error('month')<span class="alert ">{{ $message }}</span>@enderror
                        </div>
                        <div class="select-box-design-first">
                          <select class="select-custom-design" name="day" value="{{old('day')}}">
                            <option value="" disabled selected>Day</option>
                            @foreach(range(1, 31) as $d)
                            <option value="{{old('day') ?? $d}}">{{$d}}</option>
                            @endforeach
                          </select>
                          @error('day')<span class="alert ">{{ $message }}</span>@enderror
                        </div>
                        <div class="select-box-design-first">
                          <select class="select-custom-design" name="year">
                            <option value="" disabled selected>Year</option>
                            @foreach(range(date('Y')-16, date('Y')-70) as $y)
                            <option value="{{old('year') ?? $y }}">{{$y}}</option>
                            @endforeach
                          </select>
                          @error('year')<span class="alert ">{{ $message }}</span>@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="ssn_or_tax" value="{{old('ssn_or_tax')}}" placeholder="9 Digit SSN or Tax ID">
                      @error('ssn_or_tax')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="form-right-block">
                    <div class="form-grouph input-design mb-30">
                      <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
                      @error('password')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
                      @error('password_confirmation')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="contact_number" placeholder="Phone Number" value="{{old('contact_number')}}">
                      @error('contact_number')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="apt_or_unit" placeholder="Apt # or Unit #" value="{{old('apt_or_unit')}}">
                      @error('apt_or_unit')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="zip_code" placeholder="Zip" value="{{old('apt_or_unit')}}">
                      @error('zip_code')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-grouph select-design mb-30">
                      <label>Payment Method</label>
                      <select class="select-custom-design" name="payment_method" value="{{old('payment_method')}}">
                        <option disabled>Payment Method</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Direct Deposit">Direct Deposit</option>
                      </select>
                      @error('payment_method')<span class="alert ">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <input type="checkbox" name="term">
                @error('term')<span class="alert ">{{ $message }}</span>@enderror
                <div class="form-flex two-column">
                  <div class="form-left-block">
                    <div class="terms-text">
                      <p>By clicking “Create My Account”, you agree with all Canary Clean’s <a href="#" class="link-design-2">terms and conditions</a> and <a href="#" class="link-design-2">privacy policy</a></p>
                    </div>
                  </div>
                  <div class="form-right-block">
                    <div class="form-grouph submit-design mb-30">
                      <input type="submit" placeholder="Create My Account" class="subit-btn-2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection

@section('script')

@include('layouts.common.cropper')

@endsection
