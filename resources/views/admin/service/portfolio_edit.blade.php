@php
  $configData = Helper::appClasses();
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Portfolio')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/drop/image-uploader.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/service.css')}}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(document).on('click', 'button.delete-image i', function (event) {
        alert(1);
      });
    });
  </script>
  <script src="{{asset('assets/vendor/drop/image-uploader.min.js')}}"></script>

@endsection
@section('page-style')

@endsection


@section('content')

  <!-- Validation Wizard -->
  <div class="col-12 mb-4">
    <div class="row title_row">
        <div class="col-md-4">
            <h4 class="">Listing</h4>
        </div>
        @include('admin.service.status-button')
    </div>
    <div id="" class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      @include('admin.service.top_header')
      <div class="bs-stepper-content">
        @if(count($errors) > 0 )
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <!-- <div class="back mb-3">
          <a href="{{route('portfolioList',[$service->id])}}"><i class="ti ti-arrow-left"></i> Back</a>
        </div> -->
        <h5 class="listing_title">Portfolio <br><small>Setup Portfolio Details</small></h5>
        <form id="portfolio_info" class="needs-validation1" method="post"
              action="{{route('updatePortfolio',[$portfolio->id,$service->id])}}" enctype="multipart/form-data"
              novalidate>
        @csrf
        <!-- Account Details -->
          <div id="account-details-validation" class="content active">
            <div class="row g-3">
              <div class="row g-3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="col-12 pb-2">
                      <label class="form-label required-label mt-0 " for="name">Title</label>
                      <input type="text" id="name" value="{{$portfolio->name??''}}" name="name" class="form-control"
                             placeholder="Enter project title" required/>
                    </div>
                  </div>
                </div>
                <?php
                  $links = $portfolio->links ? json_decode($portfolio->links, true) : null;
                ?>
                <div class="row">
                  <div class="portfolio-link-wrapper col-sm-12">
                    <label class=" form-label required-label">Project Link</label>
                    <div class="col-md-6 mb-2 mt-1">
                      <div class="input-group">
                        <span class="input-group-text">Website</span>
                        <input type="url" class="form-control input-group" placeholder="Website" name="links[Website]" value="{{ $links['Website'] ?? '' }}">
                      </div>
                    </div>
                    <div class="col-md-6 mb-2 mt-1">
                      <div class="input-group">
                        <span class="input-group-text">Android</span>
                        <input type="url" class="form-control" placeholder="Android App Link" name="links[Android]" value="{{ $links['Android'] ?? '' }}">
                      </div>
                    </div>
                    <div class="col-md-6 mb-2 mt-1">
                      <div class="input-group">
                        <span class="input-group-text">iPhone &nbsp;</span>
                        <input type="url" class="form-control" placeholder="iPhone App Link" name="links[iPhone]" value="{{ $links['iPhone'] ?? '' }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label required-label">Timeline</label>
                    <select name="timeline" id="timeline" class="form-control" required>
                      <option value="">Select Week</option>
                      <option {{$portfolio->timeline == 'ongoing' ? 'selected' : ''}} value="ongoing">Ongoing</option>
                      @for ($i=1; $i <= 100; $i++)
                        <option {{$portfolio->timeline == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                      @endfor
                      <option {{$portfolio->timeline == '100+' ? 'selected' : ''}} value="100+">100+</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-label">Project Cost</label>
                    <select name="project_cost" id="project_cost" class="form-control" required>
                      <option value="">Select Cost</option>
                      <option {{$portfolio->project_cost == 'Not Disclosed' ? 'selected' : ''}} value="Not Disclosed">
                        Not Disclosed
                      </option>
                      <option {{$portfolio->project_cost == '$0 to $10000' ? 'selected' : ''}} value="$0 to $10000">$0
                        to $10000
                      </option>
                      <option
                        {{$portfolio->project_cost == '$10001 to $50000' ? 'selected' : ''}} value="$10001 to $50000">
                        $10001 to $50000
                      </option>
                      <option
                        {{$portfolio->project_cost == '$50001 to $100000' ? 'selected' : ''}} value="$50001 to $100000">
                        $50001 to $100000
                      </option>
                      <option
                        {{$portfolio->project_cost == '$100001 to $500000' ? 'selected' : ''}} value="$100001 to $500000">
                        $100001 to $500000
                      </option>
                      <option {{$portfolio->project_cost == '$500000+' ? 'selected' : ''}} value="$500000+">$500000+
                      </option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="form-label required-label">Project Industry</label>
                    <select name="project_industry" id="project_industry" class="form-control" required>
                      <option></option>
                      @foreach ($industries as $value)
                        <option
                          {{$portfolio->project_industry == $value->id ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-12">
                    <div class="form-group clearfix relative portfolio-thumb-wrapper">
                      <label for="portfolioThumbnail" class="form-label required-label d-block">Thumbnail</label>
                      <div class="portfolio-thumb">
                        <div class="input file thumbnail-img required">
                          <input type="file" name="thumbnail" id="portfolioThumbnail" class="form-control required"
                                 autocomplete="off" accept="image/jpg,image/jpeg,image/png" aria-invalid="false">
                          <div class="thumb-preview" id="thumbPreview">
                            @if(!empty($portfolio->thumbnail))
                              <img src="{{asset('assets/service/'.$portfolio->thumbnail)}}" class="img-fluid">
                            @else
                              +
                            @endif
                          </div>
                        </div>
                      </div>
                      <div>
                        <span class="thumb_title">Choose Thumbnail</span>
                        <br>
                        <span class="thumb_sub_title">
                          Image Formats:<b class="blackc"> jpg, jpeg, png</b>
                        </span>
                        <span class="thumb_sub_title"><br>Maximum Image Size: <b class="blackc"> 2 MB</b>
                        </span>
                        <br>
                        <span class="thumb_sub_title"> Recommended Dimension: <b class="blackc"> 240px X 160px</b></span>
                      </div>
                    </div>
                  </div>
                </div>

                {{--<div class="row mt-3">
                  <div class="col-md-8">
                    <label class="form-label required-label">Upload screenshots</label>
                    <div id="multi_upload" style="padding-top: .5rem;"></div>
                  </div>
                </div>--}}

                <div class="row mt-3">
                  <label class="form-label required-label">Upload ScreenShot</label>
                  @for($i = 1; $i <= 5; $i++)
                    <div class="col-md-4">
                      <div id="multi_upload_{{ $i }}" style="padding-top: .5rem;"></div>
                    </div>
                  @endfor
                </div>

                <div class="row">
                  <div class="col-12">
                    <label class="form-label required-label">Project Description</label>
                    <textarea class="form-control ckeditor" id="ckeditor" name="description"
                              required>{{$portfolio->description}}</textarea>
                  </div>
                </div>


                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-primary btn-next"><span class="align-middle d-sm-inline-block me-sm-1">Save</span>
                  </button>
                </div>
              </div>
            </div>

            <div id="preview-template" style="display: none;">
              <div class="uploaded-image dz-preview">
                <img data-dz-thumbnail>
                <button class="delete-image dz-remove" data-dz-remove>
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                    <path fill="#fff" fill-rule="evenodd"
                          d="M19.364 6.636c.39.39.39 1.024 0 1.414L14.414 13l4.95 4.95c.39.391.39 1.024 0 1.415-.39.39-1.024.39-1.414 0L13 14.413l-4.95 4.951c-.39.39-1.023.39-1.414 0-.39-.39-.39-1.024 0-1.414l4.95-4.951-4.95-4.949c-.39-.39-.39-1.023 0-1.414.39-.39 1.024-.39 1.414 0L13 11.584l4.95-4.948c.39-.39 1.023-.39 1.414 0z"></path>
                  </svg>
                </button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Validation Wizard -->
@endsection
@section('page-script')
  <script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
  <script src="{{asset('assets/js/service.js')}}"></script>
  <?php
  echo '<script>';
  echo 'var screenshot = '.json_encode(array_reverse(json_decode($portfolio->screenshots))).';';
  echo '</script>';
  ?>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      var imgUrl = '{{asset("assets/service/")}}/';
      var preloaded = screenshot.map(function (fileName, index) {
        return {
          id: fileName,
          src: imgUrl + fileName
        };
      });

      $(document).on('click', 'button.delete-image', function (event) {
        alert(1);
      });

      for (var i = 1; i <= 5; i++) {
        if(preloaded[i-1])
        {
          $('#multi_upload_'+i).imageUploader({
            label: '',
            preloaded: [preloaded[i-1]],
            imagesInputName: 'screenshots',
            maxSize: 2 * 1024 * 1024,
            extensions: ['.jpg', '.jpeg', '.png'],
            maxFiles: 1
          });
        } else {
          $('#multi_upload_'+i).imageUploader({
            label: '',
            imagesInputName: 'screenshots',
            maxSize: 2 * 1024 * 1024,
            extensions: ['.jpg', '.jpeg', '.png'],
            maxFiles: 1
          });
        }
      }

      // Assuming 'input[type="file"][name="media_screenshots[]"]' is your file input
      $('input[type="file"][name="screenshots[]"]').on('change', function () {
        var selectedFiles = $(this).prop('files');

        if (selectedFiles.length > 0) {
          var firstFile = selectedFiles[0];
          var img = new Image();
          img.src = URL.createObjectURL(firstFile);

          img.onload = function () {
            // Access the dimensions after the image has loaded
            console.log('First file dimensions:', img.width, 'x', img.height);

            if (img.width > 500 || img.height > 250) {
              alert('Image dimensions must be at least 500x250 pixels.');
              return false;
            }
          };
        }
      });

      setTimeout(function () {
        $('input[name="screenshots[]"]').removeAttr('multiple');
      }, 100);

      $("#project_industry").select2({
        placeholder: "Select Industry",
        allowClear: true
      });

      $("#timeline").select2({
        placeholder: "Timeline",
        allowClear: true
      });

      $("#project_cost").select2({
        placeholder: "Select Cost",
        allowClear: true
      });

      $('#portfolioThumbnail').change(function () {
        readAndDisplayImage(this);
      });

      // Function to read the file, check size, resize, and display the preview
      function readAndDisplayImage(input) {
        if (input.files && input.files[0]) {
          var file = input.files[0];

          var reader = new FileReader();

          reader.onload = function (e) {
            var image = new Image();
            image.src = e.target.result;

            image.onload = function () {
              // Check if both height and width are less than or equal to 120 pixels
              if (image.width <= 120 && image.height <= 120) {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');

                // Resize the image to 120x120
                canvas.width = 120;
                canvas.height = 120;
                ctx.drawImage(image, 0, 0, 120, 120);

                $('#thumbPreview').html('').append($('<img />').attr('src', canvas.toDataURL('image/jpeg')).addClass('img-fluid'));
              } else {
                // Handle image dimensions exceeded exception
                alert('Image dimensions exceed the allowed limit (120x120 pixels).');
                return false;
                // You can also display a message or perform other actions as needed.
              }
            };
          };

          reader.readAsDataURL(file);
        }
      }

      $('.btn-add-portfolio-link').on('click', function () {
        var totalLinks = $('.portfolio-link-wrapper .form-group').length;
        if (totalLinks <= 2) {
          var index = 0;
          $('.portfolio-link-wrapper .form-group').each(function () {
            if (index != 0) {
              $(this).find('select').attr({
                id: 'CompanyPortfolioLinklabel' + index,
                name: 'links[linklabel][' + index + ']'
              });
              $(this).find('input').attr({
                id: 'CompanyPortfolioLink' + index,
                name: 'links[link][' + index + ']'
              });
              index = index + 1;
            } else
              index = index + 1;
          });
          var portfolioLinkElement = '<div class="form-group clearfix"><div class="project-link-type-wrapper"><select name="links[linklabel][' + totalLinks + ']" class="form-control required" required="required" id="CompanyPortfolioLinklabel' + totalLinks + '"><option value="Website">Website</option><option value="Android">Android</option><option value="iPhone">iPhone</option></select></div><div class="project-link-text-wrapper"><input name="links[link][' + totalLinks + ']" class="form-control required" placeholder="Add app or website url" required="required" type="text" id="CompanyPortfolioLink' + totalLinks + '"></div><div class="project-link-remove-wrapper pull-right"><a href="javascript:;" class="btn-remove no-padding"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"><path fill="#757982" fill-rule="evenodd" d="M19.364 6.636c.39.39.39 1.024 0 1.414L14.414 13l4.95 4.95c.39.391.39 1.024 0 1.415-.39.39-1.024.39-1.414 0L13 14.413l-4.95 4.951c-.39.39-1.023.39-1.414 0-.39-.39-.39-1.024 0-1.414l4.95-4.951-4.95-4.949c-.39-.39-.39-1.023 0-1.414.39-.39 1.024-.39 1.414 0L13 11.584l4.95-4.948c.39-.39 1.023-.39 1.414 0z"></path></svg></a></div></div>';
          $(portfolioLinkElement).insertAfter('.portfolio-link-wrapper .form-group:last');
          if (totalLinks == 2)
            $(this).addClass('d-none');
        } else
          $(this).addClass('d-none');
      });

      $('.portfolio-link-wrapper').on('click', '.btn-remove', function () {
        $(this).parents('.form-group').remove();
        var index = 0;
        $('.portfolio-link-wrapper .form-group').each(function () {
          if (index != 0) {
            $(this).find('select').attr({
              id: 'CompanyPortfolioLinklabel' + index,
              name: 'links[linklabel][' + index + ']'
            });
            $(this).find('input').attr({
              id: 'CompanyPortfolioLink' + index,
              name: 'links[link][' + index + ']'
            });
            $(this).find('label.error').attr('for', 'link' + index);
            index = index + 1;
          } else
            index = index + 1;
        });
        $('.btn-add-portfolio-link').removeClass('d-none');
      });

    });
  </script>
@endsection
