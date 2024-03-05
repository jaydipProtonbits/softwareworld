@php
$configData = Helper::appClasses();
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Add Clients')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/service.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/ckeditor/ckeditor.js')}}"></script>

@endsection
@section('page-style')
<style type="text/css">
    label.form-label {
        margin-top: 1rem;
    }
    button.step-trigger {
      width: 100% !important;
      justify-content: space-between !important;
    }
    body button.step-trigger.activeBTN span.bs-stepper-title,
    body button.step-trigger.activeBTN span.bs-stepper-subtitle {
      color: blue !important;
      font-weight: bold !important;
    }
    .activeBTN span.bs-stepper-circle {
      background: var(--bs-primary) !important;
      color: #FFF !important;
    }
</style>
@endsection


@section('content')

<!-- Validation Wizard -->
  <div class="col-12">
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
        <form id="wizard-validation-form" class="needs-validation1" method="post" action="{{route('save_clients',$service->id)}}" enctype="multipart/form-data" novalidate>
            @csrf
          <!-- Account Details -->
          <div id="account-details-validation" class="content active">
            <h5 class="listing_title">Clients & Industries <br><small>Enter Your Details.</small></h5>
            <div class="row g-3">
               <div class="row g-3">
                    <h6 class="listing_in_title">Client Focus</h6>
                    <div class="col-12">
                        <p><small>Total Progress <span class="client-total-percentage">0</span>%</small></p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" id="client-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      <table width=100% style='font-family: monospace;'>
                        <tr class="dot_top">
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                          <td width="10%">|</td>
                        </tr>
                        <tr class="num_bottom">
                          <td width="10%">0</td>
                          <td width="10%">10</td>
                          <td width="10%">20</td>
                          <td width="10%">30</td>
                          <td width="10%">40</td>
                          <td width="10%">50</td>
                          <td width="10%">60</td>
                          <td width="10%">70</td>
                          <td width="10%">80</td>
                          <td width="10%">90</td>
                          <td width="10%">100</td>
                        </tr>
                      </table>
                    </div>

                    <div class="account-tab-form-spe onlynumbers clear padding-top">
                        <div class="padding-bottom overflow mb-2 row">
                            <div class="col-md-6">
                                <label class="col-md-9" for="small">Percent of work for clients with &lt;$10M in revenue</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input name="client_focus[small]" id="small" class="form-control client-form-percentage" maxlength="3" type="text" value="{{$service->getMeta('client_focus',array())['small']??'0'}}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="padding-bottom overflow mb-2 row">
                            <div class="col-md-6">
                                <label class="col-md-9" for="midmarket">Percent of work for clients with $10M &shy; $1B in revenue</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input name="client_focus[midmarket]" id="midmarket" class="form-control client-form-percentage" maxlength="3" type="text" value="{{$service->getMeta('client_focus',array())['midmarket']??'0'}}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="padding-bottom overflow row">
                            <div class="col-md-6">
                                <label class="col-md-9" for="enterprise">Percent of work for clients with &gt;$1B in revenue</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input name="client_focus[enterprise]" id="enterprise" class="form-control client-form-percentage" maxlength="3" type="text" value="{{$service->getMeta('client_focus',array())['enterprise']??'0'}}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>




                 <div id="industries">
                   <div class="row">
                     <div class="col-sm-12">
                       <div class="divider"></div>
                     </div>
                     <div class="col-md-6">
                       <h6 class="listing_in_title">Industries</h6>
                     </div>
                     <div class="col-md-6 main-industry">
                       <div class="industry-count">Select main services</div>
                       <div class="industry-list">
                         <input class="find-industry" type="search" id="indInput" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" placeholder="Search industry">
                         <ul class="industry-ul" id="indInputUL">
                           @foreach ($industries as $value)
                             <li class="industry-li"><a ind-id="{{$value->id}}">{{$value->name}}</a></li>
                           @endforeach
                         </ul>
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-sm-12">
                       <div class="progress-line">Total Progress <span class="industry-total-percentage">0</span>%
                         <div class="progress">
                           <div style="width: 0%;" aria-valuemin="0" role="progressbar" id="industry-progress-bar" class="progress-bar progress-bar-success"></div>
                         </div>
                         <table width=100% style='font-family: monospace;'>
                           <tr class="dot_top">
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                             <td width="10%">|</td>
                           </tr>
                           <tr class="num_bottom">
                             <td width="10%">0</td>
                             <td width="10%">10</td>
                             <td width="10%">20</td>
                             <td width="10%">30</td>
                             <td width="10%">40</td>
                             <td width="10%">50</td>
                             <td width="10%">60</td>
                             <td width="10%">70</td>
                             <td width="10%">80</td>
                             <td width="10%">90</td>
                             <td width="10%">100</td>
                           </tr>
                         </table>
                       </div>
                     </div>
                   </div>
                   <div class="account-tab-form-spe clear overflow">
                     <div class="form-group overflow">
                       <div class="row no-padding">
                         @foreach ($industries as $value)
                           <div class="form-group all-industries col-md-4 mt-3 ind-id-{{$value->id}} hide">
                             <input type="hidden" name="data[Industry][{{$value->id}}][industry_id]" value="{{$value->id}}" id="Industry{{$value->id}}CompanyIndustryIndustryId">
                             <label for="Industry{{$value->id}}">{{$value->name}}</label>
                             <div class="input-group col-md-8">
                               <input name="data[Industry][{{$value->id}}][percentage]" id="Industry{{$value->id}}" class="form-control industry-percentage" type="text" value="0">
                               <span class="input-group-text">%</span>
                             </div>
                           </div>
                         @endforeach
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="row mt-5">
                   <div class="col-6 text-start">
                     <a href="{{ (auth()->user()->is_admin()) ? route('service_step',['destination',$service->id]) : route('manage_service_step',['destination',$service->id]) }}" type="reset" class="btn btn-label-default waves-effect">
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
              {{--<div class="col-12 d-flex justify-content-between">
                <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span></button>
              </div>--}}
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
<!-- /Validation Wizard -->
@endsection
@section('page-script')
  <script src="{{asset('assets/js/service.js')}}"></script>
    <?php
        echo '<script>';
        echo 'var Pindustries = ' . json_encode($service->getMeta('client_industry')) . ';';
        echo '</script>';
    ?>
  <script type="text/javascript">
    function calculateClientSum() {
        var client_sum = 0;
        $( '.client-form-percentage' ).each( function() {
            var inputValue = parseInt(this.value);
            if( isNaN( inputValue ) )
                this.value = 0;
            else {
                this.value = inputValue;
                if( /^\+?\d+$/.test( inputValue ) )
                    client_sum += inputValue;
                else
                    this.value = 0;
            }
        });
        $( '#client-progress-bar' ).css( 'width', client_sum + '%' );
        $( '.client-total-percentage' ).text( client_sum );
        if( client_sum > 100 ) {
            $( '#client-progress-bar' ).removeClass( 'progress-bar-success' ).addClass( 'progress-bar-error' );
            $( '.progress-bar-status.client-status' ).css( 'color', '#e4656c' );
        } else {
            $( '#client-progress-bar' ).removeClass( 'progress-bar-error' ).addClass( 'progress-bar-success' );
            $( '.progress-bar-status.client-status' ).css( 'color', '#7a7a7a' );
        }
    }
    function calculateIndustrySum() {
        var insdustry_sum = 0;
        $( '.industry-percentage' ).each( function() {
            var inputValue = parseInt(this.value);
            if( isNaN( inputValue ) )
                this.value = 0;
            else {
                this.value = inputValue;
                if( /^\+?\d+$/.test( inputValue ) )
                    insdustry_sum += inputValue;
                else
                    this.value = 0;
            }
        });
        $( '#industry-progress-bar' ).css( 'width', insdustry_sum + '%' );
        $( '.industry-total-percentage' ).text( insdustry_sum );
        if( insdustry_sum > 100 ) {
            $( '#industry-progress-bar' ).removeClass( 'progress-bar-success' ).addClass( 'progress-bar-error' );
            $( '.progress-bar-status.industry-status' ).css( 'color', '#e4656c' );
        } else {
            $( '#industry-progress-bar' ).removeClass( 'progress-bar-error' ).addClass( 'progress-bar-success' );
            $( '.progress-bar-status.industry-status' ).css( 'color', '#7a7a7a' );
        }
    }
    jQuery(document).ready(function($) {
        setTimeout(function() {
            calculateClientSum();
            calculateIndustrySum();
            $.each(Pindustries, function(index, val) {
                $('.industry-ul a[ind-id="'+val.industry_id+'"]').trigger('click');
                $('#Industry'+val.industry_id).val(val.percentage).trigger('blur');
            });

        }, 100);
    });
    $( '.client-form-percentage' ).on( 'keyup', function() {
        calculateClientSum();
    });

    $( document ).on( 'click', '.industry-count', function( e ) {
        e.stopPropagation();
        $( '.industry-ul li.searched' ).removeClass( 'focus' );
        if( $( this ).parents( '.main-industry' ).hasClass( 'opened' ) )
            $( this ).parents( '.main-industry' ).removeClass( 'opened' );
        else {
            $( this ).parents( '.main-industry' ).addClass( 'opened' );
            $( '#indInput' ).focus();
        }
    });
    $( document ).on( 'click', '#indInputUL .industry-li a', function( e ) {
        e.stopPropagation();
        var cat_id = $(this).attr('ind-id');
        if( $( this ).parents( '.industry-li' ).hasClass( 'checked' ) )
            $( this ).parents( '.industry-li' ).removeClass( 'checked' );
        else
            $( this ).parents( '.industry-li' ).addClass( 'checked' );
        var activeCat = $('.industry-ul li.checked').length;
        if( activeCat == 0 ) {
            $( '.industry-count' ).text( 'Select main services' );
            $( '#industries .progress-line' ).removeClass( 'open' );
            $( '#industries .industry-percentage' ).val( '0' );
            $( '#industry-progress-bar' ).css( 'width', 0 + '%' );
            $( '.all-industries' ).addClass( 'hide' );
            calculateIndustrySum();
        } else {
            if( activeCat == 1 )
                $('.industry-count').text('1 service selected');
            else
                $('.industry-count').text(activeCat+' services selected');
            var activeCat = $('.industry-ul li.checked').length;
            if( activeCat != 0 ) {
                $( '#industries .progress-line' ).addClass( 'open' );
                var cat_ids = [],
                    templen = 0,
                    lilen = $( ".industry-ul li" ).length;
                $( '.industry-ul li' ).each( function() {
                    var cat_id = $( this ).find( 'a' ).attr( 'ind-id' );
                    if( $( this ).hasClass( 'checked' ) )
                        $( '.account-tab-form-spe .ind-id-' + cat_id ).removeClass( 'hide' );
                    else {
                        $( '.account-tab-form-spe .ind-id-' + cat_id ).find( '.industry-percentage' ).val( '0' );
                        $( '.account-tab-form-spe .ind-id-' + cat_id ).addClass( 'hide' );
                    }
                    templen++;
                    if( lilen == templen )
                        calculateIndustrySum();
                });
            } else {
                $( '#industries .progress-line' ).removeClass( 'open' );
                $( '#industries .industry-percentage' ).val( '0' );
                $( '#industry-progress-bar' ).css( 'width', 0 + '%' );
                $( '.all-industries' ).addClass( 'hide' );
            }
        }
    });
    $( document ).click( function() {
        $( '.main-industry' ).removeClass( 'opened' );
    });
    $( '#indInput' ).on( 'click', function( e ) {
        e.stopPropagation();
    });
    var chosencat = '';
    $( document ).on( 'keyup', '#indInput', function( e ) {
        var term = $( this ).val();
        if( term == '' )
            chosencat = '';
        jQuery.expr[ ':' ].Contains = jQuery.expr.createPseudo( function( arg ) {
            return function( elem ) {
                return jQuery( elem ).text().toUpperCase().indexOf( arg.toUpperCase() ) >= 0;
            };
        });
        if( e.keyCode == 40 ) {
            if( chosencat === "" )
                chosencat = 0;
            else if( ( chosencat + 1 ) < $( '.industry-ul li.searched' ).length )
                chosencat++;
            $( '.industry-ul li.searched' ).removeClass( 'focus' );
            $( '.industry-ul li.searched:eq(' + chosencat + ')' ).addClass( 'focus' );
            $( '#indInput' ).val( $( '.industry-ul li.searched:eq(' + chosencat + ') a' ).text() );
            $this = $( '.industry-ul li.searched:eq(' + chosencat + ')' );
            var liIndex = $( '.industry-ul li.searched:eq(' + chosencat + ')' ).index( 'li.searched' );
            $this.closest( '.industry-ul' ).scrollTop( liIndex * $this.outerHeight() );
            return false;
        } else if( e.keyCode == 38 ) {
            if( chosencat === '' )
                chosencat = 0;
            else if( chosencat > 0 )
                chosencat--;
            $( '.industry-ul li.searched' ).removeClass( 'focus' );
            $( '.industry-ul li.searched:eq(' + chosencat + ')' ).addClass( 'focus' );
            $( '#indInput' ).val( $( '.industry-ul li.searched:eq(' + chosencat + ') a' ).text() );
            $this = $( '.industry-ul li.searched:eq(' + chosencat + ')' );
            var liIndex = $( '.industry-ul li.searched:eq(' + chosencat + ')' ).index( 'li.searched' );
            $this.closest( '.industry-ul' ).scrollTop( liIndex * $this.outerHeight() );
            return false;
        } else if( e.keyCode == 27 ) {
            $( this ).val( '' );
            return false;
        } else if( e.keyCode == 13 ) {
            e.preventDefault();
            if( $( '.industry-ul li.searched' ).length > 0 )
                $( '.industry-ul li.searched:eq(' + chosencat + ') a' )[0].click();
            return false;
        } else {
            $( '.industry-ul li' ).addClass( 'hide' );
            $( '.industry-ul li' ).removeClass( 'searched' );
            $( '.industry-ul li a:Contains("' + term + '")' ).parents( 'li' ).removeClass( 'hide' );
            $( '.industry-ul li a:Contains("' + term + '")' ).parents( 'li' ).addClass( 'searched' );
        }
    });
    $( '.industry-percentage' ).on( 'blur', function() {
        calculateIndustrySum();
        $( '.main-industry' ).removeClass( 'opened' );
        $( 'input[type="submit"]' ).prop( 'disabled', false );
    });

    $('#wizard-validation-form').submit(function(event) {
      var clientValue = parseInt($( '.client-total-percentage' ).text());
      if (clientValue > 100) {
        $( "#wizard-validation-form .alert" ).remove();
        $( "#wizard-validation-form" ).prepend( '<div class="alert alert-danger">Client line percentage must be 100</div>' );
        event.preventDefault();
        $( 'html,body' ).animate({
          scrollTop: $( '#account-details-validation' ).offset().top - 130
        }, 'slow');
        return false;
      }

      var inputValue = parseInt($( '.industry-total-percentage' ).text());
      if (inputValue > 100) {
        $( "#wizard-validation-form .alert" ).remove();
        $( "#wizard-validation-form" ).prepend( '<div class="alert alert-danger">Industries line percentage must be 100</div>' );
        event.preventDefault();
        $( 'html,body' ).animate({
          scrollTop: $( '#account-details-validation' ).offset().top - 130
        }, 'slow');
        return false;
      }
    });
  </script>
@endsection
