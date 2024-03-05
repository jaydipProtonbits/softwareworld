@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Update Media')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/drop/image-uploader.min.css')}}">

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/drop/image-uploader.min.js')}}"></script>
@endsection
@section('page-style')
<style type="text/css">
    body button.step-trigger.activeBTN span.bs-stepper-title,
    body button.step-trigger.activeBTN span.bs-stepper-subtitle {
        color: blue !important;
        font-weight: bold !important;
    }
    .activeBTN span.bs-stepper-circle {
        background: var(--bs-primary) !important;
        color: #FFF !important;
    }
    label.form-label {
        margin-top: 1rem;
    }
    ul.list-group.f-list {
        display: block;
    }
    .f-list li.list-group-item {
        max-width: 50% !important;
        display: inline-block !important;
        min-height: 46px;
        margin-bottom: 15px;
        border-top: var(--bs-list-group-border-width) solid var(--bs-list-group-border-color);
        width: 45%;
    }
    .software-profile-box .clearfix {
        width: 100%;
    }
    .target-screenshot-area {
        border: 2px dotted #e4e8f2;
        border-radius: 4px;
        padding: 11px 15px;
        font-size: 14px;
        position: relative;
        line-height: 1.14;
        cursor: pointer;
    }
    .target-screenshot-area svg {
        margin-right: 10px;
        position: relative;
        top: 3px;
    }
    .screenshot-browse {
        font-size: 12px;
        border-radius: 17px;
        background-color: #3a7af3;
        width: 82px;
        color: #fff;
        height: 22px;
        display: inline-block;
        text-align: center;
        line-height: 20px;
        float: right;
    }
    input.screenshots {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        width: 100%;
        opacity: 0;
        cursor: pointer;
    }
    .uploading-spin {
        position: relative;
        color: transparent;
        height: 22px;
        line-height: 22px;
        width: auto;
        display: inline-block;
        top: 0;
        right: auto;
        left: 0;
        float: right;
        color: #333;
        font-size: 12px;
        padding-left: 20px;
    }
    .screenshot-div-box img {
        max-height: 122px;
        height: auto;
        max-width: 163px;
    }
    .remove-screenshot::before, .remove-screenshot-disabled::before {
        background: #fff;
        height: 3px;
        width: 10px;
        content: "";
        display: inline-block;
        position: relative;
        top: 4px;
        left: 0;
    }
    .remove-screenshot {
        height: 24px;
        width: 24px;
        background: #ff5858;
        border-radius: 24px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        font-size: 0;
        position: relative;
        top: 9px;
        cursor: pointer;
        color: transparent;
        display: block;
    }
    button.step-trigger {
        width: 100% !important;
        justify-content: space-between !important;
    }

    i.iui-close:before {
      content: "\eb41";
    }

    .iui-cloud-upload:before {
      content: "\eb47";
    }

    i.iui-cloud-upload, i.iui-close {
      font-family: "tabler-icons", sans-serif !important;
      speak: none;
      font-style: normal;
      font-weight: normal;
      font-variant: normal;
      text-transform: none;
      line-height: 1;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    img.upload_logo {
      cursor: pointer;
    }
</style>
@endsection


@section('content')
<div class="row title_row">
    <div class="col-md-4">
        <h4 class="">Listing</h4>
    </div>
</div>
<div class="row">
  <!-- Vertical Icons Wizard -->
  <div class="col-12 mb-4">
    <div class="bs-stepper vertical wizard-vertical-icons-example mt-2">
      @include('admin.listing.sidebar')
        <form action="{{route('saveMedia' ,[$type,$listing->id])}}" class="needs-validation1" enctype="multipart/form-data"
              method="POST" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <div class="row g-3">
                <div class="col-12 category-box-description">
                    <h5 class="listing_title">Default Media<br><small>Add Media</small></h5>

                    <div class="col-12 mb-3">
                        <label for="media_video" class="form-label">Video URL</label>
                        <input type="url" name="media_video" class="form-control" id="media_video" value="{{$listing->getMeta('media_video')??''}}">
                        <div class="invalid-feedback">
                          Please enter valid URL.
                        </div>
                    </div>
                    <div class="row mt-3">
                      <label class="form-label required-label">ScreenShot</label>
                      @php
                        $descriptions = $listing->getMeta('screenshots_description')
? json_decode($listing->getMeta('screenshots_description'), true)
: null;
                      @endphp
                      @for($i = 1; $i <= 5; $i++)
                        <div class="col-md-3">
                          <div id="multi_upload_{{ $i }}" style="padding-top: .5rem;"></div>
                        </div>
                        <div class="col-md-3">
                          <label class="form-label">Description</label>
                          <textarea class="form-control" name="screenshots_description[{{ $i }}]" cols="5" rows="5">{{ $descriptions ? ($descriptions[$i] ?? null ) : null }}</textarea>
                        </div>
                      @endfor
                    </div>

                    {{--<div class="col-md-8 screenshot-box-wrapper no-padding" id="df_weapper">
                        <?php if (empty($listing->getMeta('d_media')) || count($listing->getMeta('d_media')) < 5): ?>
                        <label for="screenshots" class="padding-bottom-10">Screenshots</label>
                        <div class="form-group screenshot-upload-box">
                            <div class="form-group-parent clearfix target-screenshot-area">
                                <img src="{{asset('assets/svg/icons/upload.svg')}}"> Drop your files here or click here to select files from computer
                                <span class="screenshot-browse">Browse</span>
                                <input type="file" data-cat_id="" class="screenshots" name="screenshots" accept="image/jpg,image/jpeg,image/png" aria-invalid="false">
                                <span class="uploading-spin d-none">Uploading</span>
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="screenshot-box-lists">
                            <table class="screenshot-table table table-hover ui-sortable">
                                <tbody>
                                    @if (!empty($listing->getMeta('d_media')))
                                        <?php foreach ($listing->getMeta('d_media') as $key => $value): ?>
                                            <tr>
                                                <td style="width: 23px;text-align: center;padding:0">
                                                    <span class="remove-screenshot" data-cat_id="" id="{{$key}}">-</span>
                                                </td>
                                                <td style="width:200px;text-align: center;padding:0 20px 0 18px">
                                                    <div class="screenshot-div-box text-center"><img src="{{$value['media']}}"></div>
                                                </td>
                                                <td>
                                                <div class="screenshot-desc">
                                                    <div class="input textarea">
                                                    <label for="">Description</label>
                                                    <textarea name="media[{{$key}}][text]" data-id="{{$key}}" rows="5" placeholder="Enter description" class="form-control screenshot_desc" maxlength="150" cols="30">{{$value['text']}}</textarea></div>
                                                </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>--}}

                    <h5 class="mt-5 mb-3">Category wise media</h5>
                    <div class="accordion mt-3" id="accordionWithIcon">
                      @if(!empty($allCat = getCategory($listing->categories)))
                      @foreach ($allCat as $key => $value)
                          <div class="card accordion-item active">
                                <h2 class="accordion-header">
                                  <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-{{$value->id}}" aria-expanded="true">
                                    {{$value->name}}
                                  </button>
                                </h2>
                                <div id="accordionWithIcon-{{$value->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionWithIcon">
                                  <div class="accordion-body">
                                    <div class="col-md-8 screenshot-box-wrapper no-padding" id="ct_weapper_{{$value->id}}">
                                        <label for="screenshots" class="padding-bottom-10">Screenshots</label>
                                        <div class="form-group screenshot-upload-box">
                                            <div class="form-group-parent clearfix target-screenshot-area">
                                                <img src="{{asset('assets/svg/icons/upload.svg')}}"> Drop your files here or click here to select files from computer
                                                <span class="screenshot-browse">Browse</span>
                                                <input type="file" data-cat_id="{{$value->id}}" class="screenshots" name="screenshots111" accept="image/jpg,image/jpeg,image/png" aria-invalid="false">
                                                <span class="uploading-spin d-none">Uploading</span>
                                            </div>
                                        </div>
                                        <div class="screenshot-box-lists">
                                        <table class="screenshot-table table table-hover ui-sortable">
                                            <tbody>
                                                @if (!empty($listing->getMeta('c_media')))
                                                    @php
                                                    $catmedia = $listing->getMeta('c_media');
                                                    @endphp
                                                    @if (!empty($catmedia[$value->id]))
                                                         @foreach ($catmedia[$value->id] as $k => $val)
                                                            <tr>
                                                                <td style="width: 23px;text-align: center;padding:0">
                                                                    <span class="remove-screenshot" data-cat_id="{{$value->id}}" id="{{$k}}">-</span>
                                                                </td>
                                                                <td style="width:200px;text-align: center;padding:0 20px 0 18px">
                                                                    <div class="screenshot-div-box text-center"><img src="{{$val['media']}}"></div>
                                                                </td>
                                                                <td>
                                                                <div class="screenshot-desc">
                                                                    <div class="input textarea">
                                                                    <label for="">Description</label>
                                                                    <textarea name="c_media[{{$value->id}}][{{$k}}][text]" data-id="{{$key}}" rows="5" placeholder="Enter description" class="form-control screenshot_desc" maxlength="150" cols="30">{{$val['text']}}</textarea></div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>

                                  </div>
                                </div>
                            </div>
                      @endforeach
                      @endif

                    </div>

                </div>

            </div>
          </div>
              <div class="row mt-5">
                <div class="col-6 text-start">
                  <a href="{{ (auth()->user()->is_admin()) ? route('details',['features',$listing->id]) : route('manage_details',['features',$listing->id]) }}" type="reset" class="btn btn-label-default waves-effect">
                    <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Previous
                  </a>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-primary btn-next">
                     <span class="align-middle d-sm-inline-block me-sm-1">
                       Save & Next &nbsp;&nbsp; <i class="fa fa-arrow-right"></i>
                     </span>
                  </button>
                </div>
              </div>
          {{--<div class="mt-4 ms-auto">
            <button class="btn btn-primary btn-submit">Save & Next</button>
          </div>--}}
        </form>
      </div>
    </div>
  </div>
  <!-- /Vertical Icons Wizard -->
</div>
@endsection

@section('page-script')
<script src="{{asset('assets/js/listing.js')}}"></script>

<?php
echo '<script>';
echo 'var screenshot = ' . json_encode($listing->getMeta('screenshots') ?? null) . ';';
echo '</script>';
?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      var preloaded = null;
      if (Array.isArray(screenshot) && screenshot.length > 0 && screenshot.every(filename => typeof filename === 'string' && filename.trim() !== '')) {
        var imgUrl = '{{asset("assets/software/media")}}'+'/';
        preloaded = screenshot.map(function (fileName, index) {
          return {
            id: fileName,
            src: imgUrl + fileName
          };
        });
      }

      // Loop from 1 to 5
      for (let i = 1; i <= 5; i++) {
        if(preloaded != null && preloaded[i-1])
        {
          $('#multi_upload_'+i).imageUploader({
            label: '',
            preloaded: [preloaded[i-1]],
            imagesInputName: 'media_screenshots',
            maxSize: 2 * 1024 * 1024,
            extensions: ['.jpg', '.jpeg', '.png'],
            maxFiles: 1
          });
        } else {
          $('#multi_upload_'+i).imageUploader({
            label: '',
            imagesInputName: 'media_screenshots',
            maxSize: 2 * 1024 * 1024,
            extensions: ['.jpg', '.jpeg', '.png'],
            maxFiles: 1
          });
        }
      }

      // Assuming 'input[type="file"][name="media_screenshots[]"]' is your file input
      $('input[type="file"][name="media_screenshots[]"]').on('change', function () {
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
        $('input[name="media_screenshots[]"]').removeAttr('multiple');
      }, 100);

        $(document).on('change', '.screenshots', function() {
            var cat_id = $(this).attr('data-cat_id');
            //var file = this.files[0];
            var targetparentId = $(this).parents('.screenshot-box-wrapper').attr('id');
            var file = this.files;
            if ((/\.(jpg|jpeg|png)$/i).test(file[0].name.toLowerCase())) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function () {
                        if((file[0].size/1024) > 1025)
                        {
                            $('#'+targetparentId).find('.screenshot-upload-box').find('.dimension-error').remove();
                            $('#'+targetparentId).find('.screenshot-upload-box').append('<label class="dimension-error error">Image size should be less than 1 MB</label>');
                            return false;
                        }
                        else
                        {
                            var height = this.height;
                            var width = this.width;
                            if(height > 250 || width > 500 )
                            {
                              $('#'+targetparentId).find('.screenshot-upload-box').find('.dimension-error').remove();
                              $('#'+targetparentId).find('.screenshot-upload-box').append('<label class="dimension-error error">Upload image with proper dimensions. Minimum required dimensions are 500px X 250px</label>');
                              return false;
                            }
                            else
                            {
                              uploadimginserver(reader.result,targetparentId, cat_id);
                              $('#'+targetparentId).find('.screenshot-upload-box').find('.dimension-error').remove();
                            }
                        }
                    };
                }
                reader.readAsDataURL(file[0]);
            }
            else
            {
                $('#'+targetparentId).find('.screenshot-upload-box').find('.dimension-error').remove();
                $('#'+targetparentId).find('.screenshot-upload-box').append('<label class="dimension-error error">'+file[0].name + ' is not a valid image file.</label>');
                return false;
            }
        });

        $(document).on('click', '.remove-screenshot', function(event) {
            event.preventDefault();
            $id = $(this).attr('id');
            $cat_id = $(this).attr('data-cat_id');
            $listingID = "{{$listing->id}}";
            $parent = $(this).parent().parent();
            $.ajax({
                url: '{{route("removeMedia")}}',
                type: 'POST',
                data: {id: $id, cat_id: $cat_id, listingID : $listingID, _token : $('meta[name="csrf-token"]').attr('content')},
            })
            .done(function(res) {
                if (res == 1) {
                    $parent.remove();
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        });

    });

    function uploadimginserver(resultfile,parentdivId, CatId= '')
    {
      var fd = new FormData();
      fd.append('_token', "{{ csrf_token() }}");
      fd.append('id', "{{$listing->id}}");
      fd.append('file', resultfile);
      fd.append('CatId', CatId);
      fd.append('rank', ($('#'+parentdivId).find('.screenshot-table tr').length+1));
      $('#'+parentdivId).find('.uploading-spin').removeClass('hide');
      $('#'+parentdivId).find('.screenshot-browse').addClass('hide');
      $('#'+parentdivId).find('.screenshots').prop("disabled", true);
      $('#'+parentdivId).find('.target-screenshot-area').addClass('disabled');
      $.ajax({
        url: '{{route("uploadMedia")}}',
        type: 'POST',
        async:true,
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
          $('#'+parentdivId).find('.screenshot-table tbody').append(response);
          $('#'+parentdivId).find('.target-screenshot-area').removeClass('disabled');
          $('#'+parentdivId).find('.uploading-spin').addClass('hide');
          $('#'+parentdivId).find('.screenshot-browse').removeClass('hide');
          $('#'+parentdivId).find('.screenshots').prop('disabled', false);
          if($('#'+parentdivId).find('.screenshot-table tr').length == 5)
          {
            $('#'+parentdivId).find('.screenshot-upload-box').html('');
          }
          $('#'+parentdivId).find(".screenshot_tr").each(function() {
            countNewChar($(this).find('.screenshot_desc'),$(this).find('.summary_count'),150);
          });

        },
      });
    }
  </script>
@endsection
