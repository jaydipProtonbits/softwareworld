@extends('layouts/layoutMaster')
@section('title', 'Settings')
@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <style>
    /* Password Strength Bar Styles */
    progress {
      width: 150px;
      height: 10px;
      margin-top: 26px;
    }

    progress[value="1"]::-webkit-progress-value { background-color: #d24242; }
    progress[value="2"]::-webkit-progress-value { background-color: #afaf40; }
    progress[value="3"]::-webkit-progress-value { background-color: #308930; }
  </style>
@endsection
@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script>
    $(document).ready(function () {
      // Handle step triggers click event
      $(".step-trigger").on("click", function () {
        // Get the target ID from the data-target attribute
        var targetId = $(this).parent().data("target");
        // Hide all steps
        $(".bs-stepper-content > div").hide();

        // Show the selected step
        $(targetId).show();
        $(targetId).addClass('active');

        // Update the active class on step triggers
        $(".step").removeClass("active");
        $(this).parent().addClass("active");
      });
    });

    $('#new_password').on('input', function() {
      var password = $(this).val();
      var strength = checkPasswordStrength(password);
      updatePasswordStrengthUI(strength);
    });

    function checkPasswordStrength(password) {
      var minLength = 8;
      var hasUppercase = /[A-Z]/.test(password);
      var hasLowercase = /[a-z]/.test(password);
      var hasNumber = /\d/.test(password);

      var strength = 0;

      if (password.length >= minLength) {
        strength++;
      }

      if (hasUppercase) {
        strength++;
      }

      if (hasLowercase) {
        strength++;
      }

      if (hasNumber) {
        strength++;
      }

      return strength;
    }

    function updatePasswordStrengthUI(strength) {
      var progressBar = $('#password-strength-bar');
      var strengthLabel = $('#password-strength-label');

      progressBar.attr('value', strength);

      // Change color and label based on strength
      if (strength === 0) {
        progressBar.css('background-color', '#d24242');
        strengthLabel.text('Weak');
      } else if (strength < 3) {
        progressBar.css('background-color', '#afaf40');
        strengthLabel.text('Moderate');
      } else {
        progressBar.css('background-color', '#308930');
        strengthLabel.text('Strong');
        strengthLabel.text('Good');
      }
    }
  </script>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <h3 class="m_page_title">Settings</h3>
    </div>
  </div>
  <div class="bs-stepper wizard-vertical vertical mt-2 settings_page">
    <div class="bs-stepper-header">
      <div class="step {{ !session('active_tab') ? 'active' : '' }}" data-target="#account-details-1">
        <button type="button" class="step-trigger" aria-selected="true">
          <span class="bs-stepper-circle">
            <i class="ti ti-mail"></i>
          </span>
          <span class="bs-stepper-label">
                <span class="bs-stepper-title">Change Email Address</span>
                <span class="bs-stepper-subtitle"><i class="ti ti-circle-check"></i> Verified</span>
              </span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step {{ session('active_tab') ? 'active' : '' }}" data-target="#personal-info-1">
        <button type="button" class="step-trigger" aria-selected="false">
          <span class="bs-stepper-circle"><i class="ti ti-edit-circle"></i></span>
          <span class="bs-stepper-label">
                <span class="bs-stepper-title">Changes Password</span>
                <span class="bs-stepper-subtitle">Changing Your Password</span>
              </span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#social-links-1">
        <button type="button" class="step-trigger" aria-selected="false">
          <span class="bs-stepper-circle"><i class="ti ti-headset"></i></span>
          <span class="bs-stepper-label">
                <span class="bs-stepper-title">Help Center</span>
                <span class="bs-stepper-subtitle">Contact Us</span>
              </span>
        </button>
      </div>
    </div>

    <div class="bs-stepper-content">
      <!-- Email Details -->
        @if(session('success'))
        <div class="mb-3">
          <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
          </div>
          </div>
        @endif

        @if(session('error'))
        <div class="mb-3">
          <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
          </div>
          </div>
        @endif

      <div id="account-details-1" class="content {{ !session('active_tab') ? 'active' : '' }} dstepper-block">
        <div class="content-header mb-3">
          <h6 class="mb-0 setting_heading">Change Email Address</h6>
          <span>If you change this, an email will be sent to your new address to confirm it. The new address will not become active until confirmed.</span>
        </div>
        <form method="post" action="{{ route('save_settings', ['type' => 'email_details']) }}"
              enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="user_id" value="{{ auth()->id() }}">
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="form-label required-label" for="company_name">Company</label>
              <input type="text" id="company_name" name="company_name" class="form-control"
                     placeholder="Enter Company Name">
              @error('company_name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-sm-6">
              <label class="form-label required-label" for="company_site">Website</label>
              <input type="url" id="company_site" name="company_site" class="form-control"
                     placeholder="Enter Company Website">
              @error('company_site')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="col-sm-6">
              <label class="form-label required-label" for="old_email">Old Email Address</label>
              <input type="email" id="old_email" name="old_email" class="form-control" placeholder="Enter Old Email">
              @error('old_email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="col-sm-6">
              <label class="form-label required-label" for="new_email">New Email Address</label>
              <input type="email" id="new_email" name="new_email" class="form-control" placeholder="Enter New Email">
              @error('new_email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label class="form-label required-label" for="reson">Describe your reason for changing the login
                email</label>
              <textarea id="reason" name="reason" rows="6" class="form-control"></textarea>
              @error('reason')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            @if( (auth()->user()->email_change()->count() ?? 0) && auth()->user()->email_change->status == 0 )
              <div class="col-md-12 mt-3 mb-3">
                <span class="text-danger">
                  There is a pending change of the vendor email to <b class="text-black-50">{{ auth()->user()->email_change->new_email }}</b>
                </span>
              </div>
            @endif
            <div class="col-12 text-end mt-3">
              <button class="btn btn-primary btn-next waves-effect waves-light">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Personal Info -->
      <div id="personal-info-1" class="content {{ session('active_tab') ? 'active' : '' }}">
        <div class="content-header mb-3">
          <h6 class="mb-0 setting_heading">Change Password</h6>
        </div>
        <form method="post" action="{{ route('save_settings', ['type' => 'change_password']) }}"
              enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-sm-6 form-password-toggle">
              <label class="form-label required-label" for="current_password">Current Password</label>
              <input type="password" id="current_password" name="current_password" class="form-control"
                     placeholder="********">
              @error('current_password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-sm-6 form-password-toggle">
              <label class="form-label"></label>
              <progress id="password-strength-bar" max="4" value="0"></progress>
              <br>
              <span id="password-strength-label"></span>
            </div>
            <div class="col-sm-6 form-password-toggle">
              <label class="form-label required-label" for="new_password">New Password</label>
              <input type="password" id="new_password" name="new_password" class="form-control" placeholder="********">
              @error('new_password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-sm-6 form-password-toggle">
              <label class="form-label required-label" for="confirm_password">Confirm Password</label>
              <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                     placeholder="********">
              @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 text-end">
              <button class="btn btn-primary btn-next waves-effect waves-light">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Social Links -->
      <div id="social-links-1" class="content">
        <div class="content-header mb-3">
          <h6 class="mb-0 setting_heading">Help Center</h6>
        </div>
        <div class="row g-3">
          <div class="col-sm-6">
            <p>Please contact admin</p>
            <p>Contact Email : <a href="mailto:admin@example.com">admin@example.com</a></p>
            <p>Contact Number : <a href="tel:+88-1234567890">+88-1234567890</a></p>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
