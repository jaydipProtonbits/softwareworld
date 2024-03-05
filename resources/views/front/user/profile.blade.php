@extends('layouts/layoutMaster')
@section('title', 'Profile')

@section('page-style')
  <style>
    .upload-btn {
      font-family: var(--para-font) !important;
      font-size: 14px !important;
      font-weight: 500 !important;
      line-height: 18px !important;
      letter-spacing: 0.43px !important;
      text-align: left !important;
    }
    .reset-btn {
      font-family: var(--para-font) !important;
      font-size: 14px;
      font-weight: 500;
      line-height: 18px;
      letter-spacing: 0.43px;
      text-align: left;
    }
  </style>
@endsection

@section('page-script')
  <script>
    $(function () {
      console.log('hey');
    });
    // File input change event
    $('#upload').change(function () {
      readURL(this);
    });

    // Reset button click event
    $('#resetImage').click(function () {
      $('#upload').val('');
      $('#uploadedAvatar').attr('src', '{{ auth()->user()->profile_url }}');
    });

    // Function to read the file and display the preview
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#uploadedAvatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <h3 class="m_page_title">Profile</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      {{--<h5 class="card-header">Profile Details</h5>--}}
        <!-- Account -->
        <div class="card-body">
          <div class="mb-3">
            @if(session('success'))
              <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
              </div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger">
                <strong>{{ session('error') }}</strong>
              </div>
            @endif
          </div>

          <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="{{ auth()->user()->profile_url }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
                  <span class="d-none d-sm-block upload-btn">Upload new photo</span>
                  <i class="ti ti-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" name="profile_pic" class="account-file-input" hidden="">
                </label>
                <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect" id="resetImage">
                  <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                  <span class="d-none d-sm-block reset-btn">Reset</span>
                </button>
                @error('profile_pic')
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
              </div>
            </div>
            <div class="row">
                <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                  <label for="name" class="form-label">Full Name</label>
                  <input class="form-control" type="text" id="name" name="name" autofocus="" placeholder="Doe" value="{{ auth()->user()->name }}">
                  @error('name')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                  <label for="company_name" class="form-label">Company Name</label>
                  <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Enter Company name" value="{{ auth()->user()->user_details->company_name ?? '' }}">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="job_title" class="form-label">Job Title</label>
                  <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter Job Title" value="{{ auth()->user()->user_details->job_title ?? '' }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="company_site" class="form-label">Company Website</label>
                  <input type="url" class="form-control" id="company_site" name="company_site" placeholder="Enter Company Website" value="{{ auth()->user()->user_details->company_site ?? '' }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input class="form-control" type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                         placeholder="Enter Email Address" readonly>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="linkedin_url" class="form-label">LinkedIn Profile URL</label>
                  <input class="form-control" type="url" id="linkedin_url" name="linkedin_url" placeholder="Enter LinkedIn Profile URL" value="{{ auth()->user()->user_details->linkedin_url ?? '' }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="country_id">Country</label>
                  <div class="position-relative">
                    <select id="country_id" name="country_id" class="select2 form-select select2-hidden-accessible" data-select2-id="country_id" tabindex="-1" aria-hidden="true">
                      <option value="" data-select2-id="0">Choose Country</option>
                      @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ auth()->user()->user_details->country_id ?? 0 == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2 waves-effect waves-light upload-btn">Save changes</button>
                <button type="reset" class="btn btn-label-default waves-effect">Cancel</button>
              </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>
@endsection
