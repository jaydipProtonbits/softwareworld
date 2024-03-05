@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Integration & API '. $type)

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
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
    .software-entity {
        display: flex;
        padding: 10px 15px;
        align-items: center;
    }
    label.form-label {
        margin-top: 1rem;
    }
    .f-big input {
        width: 20px;
        height: 20px;
        vertical-align: middle;
    }
    .common-search-content {
        border-radius: 4px;
        box-shadow: 0 8px 18px 0 rgba(0,0,0,.2);
        border: solid 1px #e5e5e5;
        background-color: #fdfeff;
        padding: 10px;
        position: absolute;
        left: 30px;
        right: 100px;
        z-index: 1;
        top: 77px;
    }
    .common-search-hit .s-o-s-list.active, .common-search-hit .s-o-s-list:hover {
        background: #ecf3ff;
    }
    .imgdiv {
        width: 44px;
        margin-right: 15px;
        display: flex;
        border-radius: 4px;
        overflow: hidden;
        height: 44px;
        justify-content: center;
        align-items: center;
        border: 1px solid #e2e2e2;
        flex: 0 0 44px;
    }
    .imgdiv img {
        width: auto;
        max-width: 42px;
        height: auto;
        max-height: 42px;
    }

    .common-search-hit .s-o-s-list {
        cursor: pointer;
    }
    .common-search-hit .s-o-s-list {
        display: flex;
        align-items: center;
        padding: 7px;
        border-radius: 4px;
        cursor: pointer;
    }
    .not-found-add-label {
        color: #757982;
        font-size: 12px;
        display: none;
    }
    .not-found-software .s-o-search-name {
        width: calc(100% - 170px);
    }
    .not-found-software .s-o-search-name::before {
        content: '"';
        display: inline-block;
    }
    .not-found-software .s-o-search-name::after {
        content: '"';
        display: inline-block;
    }
    .relative.form-group.softwaresearchextra {
        position: relative;
    }
    .hide {
        display: none;
    }
    .features_element_label {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #757982;
        height: 38px;
        display: flex;
        background: #fafcff;
        padding: 0 15px;
        font-size: 14px;
        align-content: center;
        align-items: center;
        border-bottom: 1px solid #e4e8f2;
    }
    .remove-software {
        background: #ff5858;
        border-radius: 24px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        font-size: 0;
        position: relative;
        top: 0;
        cursor: pointer;
        color: transparent;
        height: 24px;
        width: 24px;
        margin-right: 15px;
        flex: 0 0 24px;
    }
    .remove-software::before {
        line-height: 20px;
        text-align: center;
        font-size: 0;
        cursor: pointer;
        color: transparent;
        background: #fff;
        height: 3px;
        width: 10px;
        content: "";
        display: inline-block;
        position: relative;
        top: 4px;
        left: 0;
    }
    .imgdiv {
        width: 44px;
        margin-right: 15px;
        display: flex;
        border-radius: 4px;
        overflow: hidden;
        height: 44px;
        justify-content: center;
        align-items: center;
        border: 1px solid #e2e2e2;
        flex: 0 0 44px;
    }
    .imgdiv img {
        width: auto;
        max-width: 42px;
        height: auto;
        max-height: 42px;
    }
    .entity-name {
        font-weight: 600;
        color: #181818;
        font-size: 16px;
    }
    button.step-trigger {
        width: 100% !important;
        justify-content: space-between !important;
    }
    label.required-label::after {
        color: #fc4343;
        content: "*";
        font-size: 12px;
        margin-left: 2px;
    }
    .radio_label {
      color: #000;
      font-feature-settings: 'clig' off, 'liga' off;
      font-family: var(--para-font);
      font-size: 14px;
      font-style: normal;
      font-weight: 500;
      line-height: normal;
    }
    .integation_label {
      color: #000;
      font-feature-settings: 'clig' off, 'liga' off;
      font-family: var(--para-font);
      font-size: 16px;
      font-style: normal;
      font-weight: 500;
      line-height: normal;
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
        <form class="needs-validation1" action="{{route('saveIntegration'
        ,[$type,$listing->id])}}" method="POST" enctype="maltipart/form-data" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-vertical" class="content active">
            <h5 class="listing_title">Integration & API<br><small>Add integration & API</small></h5>
            <div class="row g-3">
                <div class="col-md-6">
                  <label class="d-block required-label radio_label mb-2">Does your software offers an Open API ?</label>
                  <label class="f-big">
                      <input type="radio" class="form-check-label" name="is_open_api" {{ $listing->getMeta('is_open_api') == 1 ? 'checked' : '' }} value="1"> YES
                  </label>&nbsp;&nbsp;
                  <label class="f-big">
                      <input type="radio" class="form-check-label" name="is_open_api" {{ $listing->getMeta('is_open_api') == 0 ? 'checked' : '' }} value="0"> No
                  </label>
                </div>
              <div class="col-md-6">
                <div class="form-group {{ $listing->getMeta('is_open_api') == 0 ? 'd-none' : '' }}" id="api_url_field">
                  <label class="form-label required-label mt-0">URL For API Document</label>
                  <input type="url" class="form-control" name="api_document_url" placeholder="Enter URL" value="{{ $listing->getMeta('api_document_url') }}">
                </div>
                </div>
                <div class="relative form-group softwaresearchextra col-md-6">
                    <h5 class="integation_label">Integrations</h5>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                        <input autocomplete="off" type="text" class="form-control software-search-input" placeholder="Search" aria-label="Search Software" id="integrate_software" name="q" aria-describedby="basic-addon-search31">
                    </div>
                    <div class="integrate_software-content common-search-content" style="display: none;">
                        <div id="integrate_software" class="integrate_software-hits common-search-hit"></div>
                    </div>
                    <div id="integrate_software_lists" class="rcatlayout clear form-group common-search-list {{--{{$listing->getMeta('is_open_api') != 1 ? 'hide' : ''}}--}}">

                        @if(!empty($listing->getMeta('integrate_software')))
                            @php $integrate_software = getListing($listing->getMeta('integrate_software')); @endphp
                            @foreach ($integrate_software as $software)
                                <div class="software-entity" id="{{$software->id}}">
                                    <div class="remove-software">-</div>
                                    <div class="soft_de">
                                        <div class="entity-name">{{$software->name}}</div>
                                        <input type="hidden" name="integrate_software[]" value="{{$software->id}}">
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
                  <a href="{{ (auth()->user()->is_admin()) ? route('details',['media',$listing->id]) : route('manage_details',['media',$listing->id]) }}" type="reset" class="btn btn-label-default waves-effect">
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
  <script type="text/javascript">
    function checknotfoundsoftware(name,targetlists)
    {
        var lencus = $("#"+targetlists+' .software-entity').length;
        var looplen = 0;
        var found = 0;
        var notfound = 0;
        var returnval = 0;
        if(lencus ==  0)
        {
            return 0;
        }
        else
        {
            $("#"+targetlists+' .software-entity').each(function(){
                looplen = looplen+1;
                if($(this).find('.entity-name').html().toLowerCase() == name)
                {
                    found = 1;
                }
                else
                {
                    notfound = 0;
                }
                if(looplen == lencus)
                {
                    if(found == 1)
                    {
                       return returnval = 1;
                    }
                    else
                    {
                        return returnval = 0;
                    }
                }
            });
            return returnval;
        }
    }
    function createhmResult(content,term,targetlists)
    {
        var html = '';
        var company_pic = '';
        if (content.hits.length > 0)
        {
            for (var i = 0; i < content.hits.length; ++i)
            {
                var hit = content.hits[i];
                if(i == 0)
                    html  += "<div class='s-o-s-list active' id='"+hit["_id"]+"'>";
                else
                    html  += "<div class='s-o-s-list' id='"+hit["_id"]+"'>";
                if(hit["logo"] == '')
                    company_pic = "{{asset('assets/company/no-company-logo.png')}}";
                else
                    company_pic = "{{asset('assets/company')}}"+'/'+hit["logo"];
                html += '<img src="'+company_pic+'" height="100px" width="100px">';
                html    += "<span class='s-o-search-name'>"+ hit['name']+"</span>";
                html    += "</div>";
                var searchboxval = term;
                if((i == (content.hits.length-1)) && searchboxval.length > 2)
                {
                    if((content.hits[0]['name']).toLowerCase() != searchboxval.toLowerCase())
                    {
                        var notfound = parseInt(checknotfoundsoftware(searchboxval.toLowerCase(),targetlists));
                        if(notfound == 0)
                        {
                            html  += "<div class='not-found-software s-o-s-list' id='not-found-software'><span class='s-o-search-name'>"+ searchboxval+"</span> <span class='not-found-add-label'>Press “enter” to add</span></div>";
                        }
                    }
                    break;
                }
            }
        }
        else
        {
            if(term.length > 2)
            {
                var notfound = parseInt(checknotfoundsoftware(term.toLowerCase(),targetlists));
                if(notfound == 0)
                {
                    html  += "<div class='not-found-software s-o-s-list' id='not-found-software'><span class='s-o-search-name'>"+ term+"</span><span class='not-found-add-label'>Press “enter” to add</span></div>";
                }
            }
            else
            {
                html += "<div class='padding10'>Please enter minimum 3 characters to find software</div>";
            }
        }
        return html;
    }
    function softwaresearchextra()
    {
        $(".softwaresearchextra").each(function(){
            if($(this).find(".common-search-list .software-entity").length  == 25)
            {
                $(this).find('.software-search-input').attr("disabled", "disabled");
            }
            else
            {
                $(this).find('.software-search-input').removeAttr("disabled");
            }
        });
    }
    function addfuturesoftware(enty_name, trg_list_id, fieldname)
    {
        $.ajax({
            url: "{{route('future_software')}}", //Don't forget to replace with your own post URL
            type: 'POST',
            data: {'name': enty_name, '_token':'{{csrf_token()}}'},
          }).done(function(data){
                element = '<div class="software-entity custom-software-entity" id="'+data+'"><div class="remove-software">-</div><div class="soft_de"><div class="entity-name">'+enty_name+'</div><input type="hidden" name="'+fieldname+'[]" value="'+data+'" /></div></div>';
                $('#'+trg_list_id).append(element);
                softwaresearchextra();
                $('.common-search-content').hide();
                $('.common-search-hit').html('');
                $('.common-search-list').removeClass('hide');
        });
    }
    jQuery(document).ready(function($) {
        var chosenp = '';
        var ajaxRevReq = 'ToCanajaxRevReq';
        $(document).on('keyup', '.software-search-input', function (e) {
            var fieldname = $(this).attr('id');
            var targethits = $(this).attr('id')+"-hits";
            var targetcontent = $(this).attr('id')+"-content";
            var targetlists = $(this).attr('id')+"_lists";
            var term = $(this).val();
            if (e.keyCode == 40)
            {
                // 38-up, 40-down
                if (chosenp === "")
                {
                    chosenp = 0;
                } else if ((chosenp + 1) < $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').length)
                {
                    chosenp++;
                }
                $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').removeClass('active');
                $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').addClass('active');
                $(this).val($('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ') .s-o-search-name').text());
                return false;
            } else if (e.keyCode == 38)
            {
                if (chosenp === "")
                {
                    chosenp = 0;
                } else if (chosenp > 0)
                {
                    chosenp--;
                }
                $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').removeClass('active');
                $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').addClass('active');
                $(this).val($('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ') .s-o-search-name').text());
                return false;
            } else if (e.keyCode == 27)
            {
                $('.'+targetcontent).find('.'+targethits+'').html('');
                $('.sec-one-search-content').hide();
                $(this).val('');
                return false;
            } else if (e.keyCode == 13)
            {
                var searchboxval = $.trim($(this).val());
                if ($('.'+targetcontent).find('.'+targethits+' .s-o-s-list').length > 0)
                {
                    enty_id = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').attr('id');
                    enty_img = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').find('.imgdiv').html();
                    enty_name = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp + ')').find('.s-o-search-name').html();
                    //var trg_list_id = $(this).parents('.common-search-hit').attr('id')+"_lists";
                    if(enty_id == 'not-found-software')
                    {
                        addfuturesoftware(enty_name,targetlists,fieldname);
                    }
                    else
                    {
                       // managestorage(trg_list_id);
                        var element = '<div class="software-entity" id="'+enty_id+'"><div class="remove-software">-</div><div class="soft_de"><div class="entity-name">'+enty_name+'</div><input type="hidden" name="'+fieldname+'[]" value="'+enty_id+'" /></div></div>';
                        $('#'+targetlists+ '.common-search-list').append(element);
                        $('.common-search-list').removeClass('hide');
                        $('.softwaresearchextra').addClass('alist');
                        softwaresearchextra();
                        $('.'+targethits).html('');
                        $('.'+targetcontent).hide();
                    }
                }
            } else
            {
                chosenp = '';
                if ($(this).val() != '')
                {

                    //$('.algoliacompanysearch label.error').remove();
                    //$('.cross-dark').removeClass('hide');
                    if (term.length < 2)
                    {
                        // $('#content').show();
                        // $('#search_content').hide();
                        return; //You can always alter this condition to a better one that suits you.
                    }
                    var switchingid = '';
                    if($("#"+targetlists+" .software-entity").length != 0)
                    {
                        $("#"+targetlists+" .software-entity").each(function(){
                            var sw_id = $(this).attr('id');
                            if(switchingid == '')
                            {
                                switchingid = sw_id;
                            }
                            else
                            {
                                switchingid = switchingid+","+sw_id;
                            }
                        });
                    }

                    ajaxRevReq = $.ajax({
                        url: "{{route('find_listing')}}", //Don't forget to replace with your own post URL
                        type: 'POST',
                        data: {'query': term,'switchingbypass':switchingid,'_token':'{{csrf_token()}}'},
                        dataType: 'JSON',
                        beforeSend: function () {
                            if (ajaxRevReq != 'ToCancelPrevReq' && ajaxRevReq.readyState < 3) {
                                ajaxRevReq.abort();
                            }
                        },
                        success: function (json) {
                            var html = createhmResult(json,term,targetlists,$(this).attr('id'));
                            $('.'+targethits).html(html);
                            $('.'+targetcontent).show();
                            if(targetcontent == 'consider_software-content')
                            {
                                $('.'+targetcontent).parents('.softwaresearchextra').addClass('addminheigt');
                            }

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            if (thrownError == 'abort' || thrownError == 'undefined')
                                return;
                            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            ajaxRevReq.abort();
                        }
                    }); //end ajaxRevReq
                } else
                {
                    $('.'+targethits).html('');
                    $('.'+targetcontent).hide();
                    if(targetcontent == 'consider_software-content')
                    {
                        $('.'+targetcontent).parents('.softwaresearchextra').removeClass('addminheigt');
                    }

                }
            }
        });

        $(document).on('click','.common-search-hit .s-o-s-list',function(){
            var enty_id = $(this).attr('id');
            var fieldname = $(this).parents('.common-search-hit').attr('id')
            var trg_list_id = $(this).parents('.common-search-hit').attr('id')+"_lists";
            var enty_img = $(this).find('.imgdiv').html();
            var enty_name = $(this).find('.s-o-search-name').html();
            if(enty_id == 'not-found-software')
            {
                addfuturesoftware(enty_name,trg_list_id,fieldname);
                $('.common-search-list').removeClass('hide');
                $('.softwaresearchextra').addClass('alist');
            }
            else
            {
               // managestorage(trg_list_id);
                var element = '<div class="software-entity" id="'+enty_id+'"><div class="remove-software">-</div><div class="soft_de"><div class="entity-name">'+enty_name+'</div><input type="hidden" name="'+fieldname+'[]" value="'+enty_id+'" /></div></div>';
                $(this).parents('.softwaresearchextra').find('.common-search-list').append(element);
                $('.common-search-list').removeClass('hide');
                softwaresearchextra();
                $('.common-search-content').hide();
                $('.softwaresearchextra').addClass('alist');
                $('.common-search-hit').html('');
            }
        });

        $(document).on('click','.remove-software',function(){
            $(this).parents('.software-entity').remove();
            if($('.common-search-list .software-entity').length == 0)
            {
                $('.common-search-list').addClass('hide');
                $('.softwaresearchextra').removeClass('alist');
            }
            softwaresearchextra();
        });

        $(document).on('click', '[name="is_open_api"]', function () {
          if ($(this).val() == 1)
          {
            $('#api_url_field').removeClass('d-none');
          }
          else
          {
            $('#api_url_field').addClass('d-none');
          }
        });
    });
  </script>
@endsection
