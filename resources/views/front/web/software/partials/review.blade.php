@php
  $configData = Helper::appClasses();
@endphp
@extends('layouts/web/layoutMaster')
@section('title', 'Software Review')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
@endsection

@section('page-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}"/>
  <style type="text/css">
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
    .common-search-content1 {
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

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/js/front-page-landing.js')}}"></script>
  <script src="{{asset('assets/js/ui-carousel.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/chartjs/chartjs.js')}}"></script>
  <script type="text/javascript">
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

      /* 1. Visualizing things on Hover - See next part for action on click */
      $('.ease_use li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function (e) {
          if (e < onStar) {
            $(this).addClass('hover');
          } else {
            $(this).removeClass('hover');
          }
        });
      }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
          $(this).removeClass('hover');
        });
      });

      /* 2. Action to perform on click */
      $('.ease_use li').on('click', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }
        for (i = 0; i < onStar; i++) {
          $(stars[i]).addClass('selected');
        }
        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('.ease_use li.selected').last().data('value'), 10);
      });

        /*----  Profile picture Preview and Reset Actions   ----*/
      var originalProfilePicUrl = $('#uploadedAvatar').attr('src');
      $('#upload').change(function () {

        var file = this.files[0];
        if (file) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#uploadedAvatar').attr('src', e.target.result);
          };

          reader.readAsDataURL(file);
        }
      });

      // Add a click event listener to the reset button
      $('#resetButton').click(function () {
        $('#uploadedAvatar').attr('src', originalProfilePicUrl);
        $('#upload').val('');
      });

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
              //addfuturesoftware(enty_name,targetlists,fieldname);
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
              url: "{{ route('find_listing') }}", //Don't forget to replace with your own post URL
              type: 'POST',
              data: {
                'query': term,
                'switchingbypass':switchingid,
                '_token':'{{csrf_token()}}'
              },
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
  </script>

  <script type="text/javascript">
    var chosenp1 = '';
    var ajaxRevReq1 = 'ToCanajaxRevReq1';
    $(document).on('keyup', '.software-search-input1', function (e) {
      var fieldname = $(this).attr('id');
      var targethits = $(this).attr('id')+"-hits";
      var targetcontent = $(this).attr('id')+"-content";
      var targetlists = $(this).attr('id')+"_lists";
      var term = $(this).val();
      if (e.keyCode == 40)
      {
        // 38-up, 40-down
        if (chosenp1 === "")
        {
          chosenp1 = 0;
        } else if ((chosenp1 + 1) < $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').length)
        {
          chosenp1++;
        }
        $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').removeClass('active');
        $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ')').addClass('active');
        $(this).val($('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ') .s-o-search-name').text());
        return false;
      } else if (e.keyCode == 38)
      {
        if (chosenp1 === "")
        {
          chosenp1 = 0;
        } else if (chosenp1 > 0)
        {
          chosenp1--;
        }
        $('.'+targetcontent).find('.'+targethits+' .s-o-s-list').removeClass('active');
        $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ')').addClass('active');
        $(this).val($('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ') .s-o-search-name').text());
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
          enty_id = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ')').attr('id');
          enty_img = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ')').find('.imgdiv').html();
          enty_name = $('.'+targetcontent).find('.'+targethits+' .s-o-s-list:eq(' + chosenp1 + ')').find('.s-o-search-name').html();
          //var trg_list_id = $(this).parents('.common-search-hit1').attr('id')+"_lists";
          if(enty_id == 'not-found-software')
          {
            //addfuturesoftware(enty_name,targetlists,fieldname);
          }
          else
          {
            // managestorage(trg_list_id);
            var element = '<div class="software-entity" id="'+enty_id+'"><div class="remove-software">-</div><div class="soft_de"><div class="entity-name">'+enty_name+'</div><input type="hidden" name="'+fieldname+'[]" value="'+enty_id+'" /></div></div>';
            $('#'+targetlists+ '.common-search-list1').append(element);
            $('.common-search-list1').removeClass('hide');
            $('.softwaresearchextra1').addClass('alist');
            softwaresearchextra1();
            $('.'+targethits).html('');
            $('.'+targetcontent).hide();
          }
        }
      } else
      {
        chosenp1 = '';
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

          ajaxRevReq1 = $.ajax({
            url: "{{ route('find_listing') }}", //Don't forget to replace with your own post URL
            type: 'POST',
            data: {
              'query': term,
              'switchingbypass':switchingid,
              '_token':'{{csrf_token()}}'
            },
            dataType: 'JSON',
            beforeSend: function () {
              if (ajaxRevReq1 != 'ToCancelPrevReq' && ajaxRevReq1.readyState < 3) {
                ajaxRevReq1.abort();
              }
            },
            success: function (json) {
              var html = createhmResult(json,term,targetlists,$(this).attr('id'));
              $('.'+targethits).html(html);
              $('.'+targetcontent).show();
              if(targetcontent == 'consider_software-content')
              {
                $('.'+targetcontent).parents('.softwaresearchextra1').addClass('addminheigt');
              }

            },
            error: function (xhr, ajaxOptions, thrownError) {
              if (thrownError == 'abort' || thrownError == 'undefined')
                return;
              //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
              ajaxRevReq1.abort();
            }
          }); //end ajaxRevReq1
        } else
        {
          $('.'+targethits).html('');
          $('.'+targetcontent).hide();
          if(targetcontent == 'consider_software-content')
          {
            $('.'+targetcontent).parents('.softwaresearchextra1').removeClass('addminheigt');
          }

        }
      }
    });


    $(document).on('click','.common-search-hit1 .s-o-s-list',function(){
      var enty_id = $(this).attr('id');
      var fieldname = $(this).parents('.common-search-hit1').attr('id')
      var trg_list_id = $(this).parents('.common-search-hit1').attr('id')+"_lists";
      var enty_img = $(this).find('.imgdiv').html();
      var enty_name = $(this).find('.s-o-search-name').html();
      if(enty_id == 'not-found-software')
      {
        addfuturesoftware(enty_name,trg_list_id,fieldname);
        $('.common-search-list1').removeClass('hide');
        $('.softwaresearchextra1').addClass('alist');
      }
      else
      {
        // managestorage(trg_list_id);
        var element = '<div class="software-entity" id="'+enty_id+'"><div class="remove-software">-</div><div class="soft_de"><div class="entity-name">'+enty_name+'</div><input type="hidden" name="'+fieldname+'[]" value="'+enty_id+'" /></div></div>';
        $(this).parents('.softwaresearchextra1').find('.common-search-list1').append(element);
        $('.common-search-list1').removeClass('hide');
        softwaresearchextra1();
        $('.common-search-content1').hide();
        $('.softwaresearchextra1').addClass('alist');
        $('.common-search-hit1').html('');
      }
    });

    $(document).on('click','.remove-software',function(){
      $(this).parents('.software-entity').remove();
      if($('.common-search-list1 .software-entity').length == 0)
      {
        $('.common-search-list1').addClass('hide');
        $('.softwaresearchextra1').removeClass('alist');
      }
      softwaresearchextra1();
    });

    function softwaresearchextra1()
    {
      $(".softwaresearchextra1").each(function(){
        if($(this).find(".common-search-list1 .software-entity").length  == 25)
        {
          $(this).find('.software-search-input1').attr("disabled", "disabled");
        }
        else
        {
          $(this).find('.software-search-input1').removeAttr("disabled");
        }
      });
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
  </script>
@endsection

@section('content')
  <div data-bs-spy="scroll" class="scrollspy-example review_software">
    <!-- Heading Title -->
    <section id="page_heading" class="mt-3 single_heading">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body mt-3 pb-0 ">
                <div class="row branding">
                  <div class="col-lg-8">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="pre_img text-center">
                          @if($listing->logo)
                            <img src="{{ asset('assets/company/'.$listing->logo) }}" width="100px" height="100px"
                                 alt="S">
                          @else
                            {{ substr($listing->name, 0, 1) }}
                          @endif
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <h1>{{ $listing->name ?? '' }}</h1>
                        <p>{{ $listing->tagline ?? '' }}</p>
                        <div class="soft_ratings mb-3 mt-2">
                          <ul class="list-group list-group-horizontal list-inline gap-1">
                            <li><i class="ti ti-star-filled"></i></li>
                            <li><i class="ti ti-star-filled"></i></li>
                            <li><i class="ti ti-star-filled"></i></li>
                            <li><i class="ti ti-star"></i></li>
                            <li><i class="ti ti-star"></i></li>
                            <li class="r_count">3.0 <a href="javascript:void(0);">4 Reviews</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Heading Title -->
    <section id="review_form">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="m_page_title">Write a Review</h3>
          </div>
        </div>
        <div class="bs-stepper wizard-vertical vertical mt-2 settings_page">
          <div class="bs-stepper-header">
            <div class="step {{ $active_tab == 'profile' ? 'active' : '' }}" data-target="#account-details-1">
              <button type="button" class="step-trigger" aria-selected="true">
                        <span class="bs-stepper-circle">
                        <i class="ti ti-user"></i>
                        </span>
                <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Reviewer Details</span>
                        <span class="bs-stepper-subtitle">Enter Your Information</span>
                        </span>
              </button>
            </div>
            <div class="line"></div>
            <div class="step {{ $active_tab == 'usage' ? 'active' : '' }}" data-target="#personal-info-1">
              <button type="button" class="step-trigger" aria-selected="false">
                <span class="bs-stepper-circle"><i class="ti ti-device-desktop"></i></span>
                <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Software Usage</span>
                        <span class="bs-stepper-subtitle">Describe Your Usage</span>
                        </span>
              </button>
            </div>
            <div class="line"></div>
            <div class="step {{ $active_tab == 'review' ? 'active' : '' }}" data-target="#social-links-1">
              <button type="button" class="step-trigger" aria-selected="false">
                <span class="bs-stepper-circle"><i class="ti ti-stars"></i></span>
                <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Reviews and Rating</span>
                        <span class="bs-stepper-subtitle">Rate and Review It</span>
                        </span>
              </button>
            </div>
          </div>
          <div class="bs-stepper-content">
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
            <!-- Email Details -->
            <div id="account-details-1" class="content {{ $active_tab == 'profile' ? 'active' : '' }} dstepper-block">
              <div class="content-header mb-3">
                <h6 class="mb-0 setting_heading">Reviewer Details</h6>
                <span>Enter Your Information</span>
              </div>
              <form method="POST" action="{{ route('front_store_review') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type_id" value="2">
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <input type="hidden" name="listing_name" value="{{ $listing->name }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() ?? 0 }}">
                <input type="hidden" name="store" value="reviewer_details">

                <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img src="{{ auth()->check() ? auth()->user()->profile_url : asset('assets/img/placeholder/avatar.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-blue me-2 mb-3"
                           tabindex="0">
                      <span class="d-none d-sm-block upload-btn">Upload new photo</span>
                      <i class="ti ti-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" name="profile_pic" class="account-file-input" hidden="">
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect" id="resetButton">
                      <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                      <span class="d-none d-sm-block reset-btn">Reset Photo</span>
                    </button>
                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                    <label for="name" class="form-label">Full Name</label>
                    <input class="form-control" type="text" id="name" name="name" autofocus="" placeholder="Doe" value="{{ auth()->user()->name ?? '' }}">
                    @error('name')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 mt-3 col-md-6 fv-plugins-icon-container">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input class="form-control" type="text" name="company_name" id="company_name"
                           placeholder="Enter Company name" value="{{ auth()->user()->user_details->company_name ?? '' }}">
                    <div
                      class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="job_title" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="job_title" name="job_title"
                           placeholder="Enter Job Title" value="{{ auth()->user()->user_details->job_title ?? '' }}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="company_site" class="form-label">Company Website</label>
                    <input type="text" class="form-control" id="company_site" name="company_site"
                           placeholder="Enter Company Website" value="{{ auth()->user()->user_details->company_site ?? '' }}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email ?? '' }}"
                           placeholder="Enter Email Address" readonly="">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="linkedin_url" class="form-label">LinkedIn Profile URL</label>
                    <input class="form-control" type="text" id="linkedin_url" name="linkedin_url"
                           placeholder="Enter LinkedIn Profile URL" value="{{ auth()->user()->user_details->linkedin_url ?? '' }}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="country_id">Country</label>
                    <select id="country_id" name="country_id" class="form-select">
                      <option value="">Choose Country</option>
                      @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ auth()->user()->user_details->country_id ?? 0 == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mt-2 text-end">
                  <button type="submit" class="btn btn-secondary btn-blue me-2 waves-effect waves-light upload-btn">Save & Next
                    <i class="ti ti-arrow-right"></i></button>
                </div>
              </form>
            </div>
            <!-- Personal Info -->
            <div id="personal-info-1" class="content {{ $active_tab == 'usage' ? 'active' : '' }}">
              <div class="content-header mb-3">
                <h6 class="mb-0 setting_heading">Software Usage</h6>
                <span>Describe Your Usage</span>
              </div>
              <form method="post" action="{{ route('front_store_review') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type_id" value="2">
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <input type="hidden" name="listing_name" value="{{ $listing->name }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() ?? 0 }}">
                <input type="hidden" name="store" value="usage_details">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">How much time have you spent with {{ $listing->name }}?</label>
                      <div class="d-flex justify-content-start gap-5">
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Free trial" name="spend[]"
                                   id="Spend1">
                            <label class="form-check-label" for="Spend1">
                              Free trial
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Less than 6 months" name="spend[]"
                                   id="Spend2">
                            <label class="form-check-label" for="Spend2">
                              Less than 6 months
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="6-12 months" name="spend[]"
                                   id="Spend3">
                            <label class="form-check-label" for="Spend3">
                              6-12 months
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1-2 years" name="spend[]"
                                   id="Spend4">
                            <label class="form-check-label" for="Spend4">
                              1-2 years
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2+ years" name="spend[]" id="Spend5">
                            <label class="form-check-label" for="Spend5">
                              2+ years
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">How often do you engage with {{ $listing->name }}?</label>
                      <div class="d-flex justify-content-start gap-5">
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Daily" name="engage[]" id="Engage1">
                            <label class="form-check-label" for="Engage1">
                              Daily
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Weekly" name="engage[]" id="Engage2">
                            <label class="form-check-label" for="Engage2">
                              Weekly
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Weekly" name="engage[]" id="Engage2">
                            <label class="form-check-label" for="Engage2">
                              Weekly
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Which {{ $listing->name }} features have you worked with?</label>
                    <select class="form-control" name="features">
                      <option value="">Select Feature</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">What's your take on the price of Fresh sales?</label>
                      <div class="d-flex justify-content-start gap-5">
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Inexpensive" name="price_sales"
                                   id="price_sales1">
                            <label class="form-check-label" for="price_sales1">
                              Inexpensive
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Mid Tier" name="price_sales"
                                   id="price_sales2">
                            <label class="form-check-label" for="price_sales2">
                              Mid Tier
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Expensive" name="price_sales"
                                   id="price_sales3">
                            <label class="form-check-label" for="price_sales3">
                              Expensive
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Have you integrated {{ $listing->name }} with any other software?</label>
                      <div class="d-flex justify-content-start gap-5">
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Yes" name="anu_other" id="anu_other1">
                            <label class="form-check-label" for="anu_other1">
                              Yes
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="No" name="anu_other" id="anu_other2">
                            <label class="form-check-label" for="anu_other2">
                              No
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="I Don't Know" name="anu_other"
                                   id="anu_other3">
                            <label class="form-check-label" for="anu_other3">
                              I Don't Know
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="relative form-group softwaresearchextra col-md-4 mt-3">
                        <div class="input-group input-group-merge">
                          <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                          <input autocomplete="off" type="text" class="form-control software-search-input" placeholder="Search" aria-label="Search Software" id="integrate_software" name="q" aria-describedby="basic-addon-search31">
                        </div>
                        <div class="integrate_software-content common-search-content" style="display: none;">
                          <div id="integrate_software" class="integrate_software-hits common-search-hit"></div>
                        </div>
                        <div id="integrate_software_lists" class="rcatlayout clear form-group common-search-list"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Did you switch from any other software to {{ $listing->name }}?</label>
                      <div class="d-flex justify-content-start gap-5">
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Yes" name="switch_other" id="switch_other1">
                            <label class="form-check-label" for="switch_other1">
                              Yes
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="No" name="switch_other" id="switch_other2">
                            <label class="form-check-label" for="switch_other2">
                              No
                            </label>
                          </div>
                        </div>
                        <div class="">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="I Don't Know" name="switch_other"
                                   id="switch_other3">
                            <label class="form-check-label" for="switch_other3">
                              I Don't Know
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="relative form-group softwaresearchextra1 col-md-4 mt-3">
                        <div class="input-group input-group-merge">
                          <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                          <input autocomplete="off" type="text" class="form-control software-search-input1" placeholder="Search" aria-label="Search Software" id="integrate_software1" name="q" aria-describedby="basic-addon-search31">
                        </div>
                        <div class="integrate_software1-content common-search-content1" style="display: none;">
                          <div id="integrate_software1" class="integrate_software1-hits common-search-hit1"></div>
                        </div>
                        <div id="integrate_software_lists" class="rcatlayout clear form-group common-search-list1"></div>
                      </div>

                    </div>
                  </div>
                  <div class="col-12 text-end">
                    <button class="btn btn-secondary btn-blue btn-next waves-effect waves-light">Save & Next <i
                        class="ti ti-arrow-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <!-- Social Links -->
            <div id="social-links-1" class="content {{ $active_tab == 'review' ? 'active' : '' }}">
              <div class="content-header mb-3">
                <h6 class="mb-0 setting_heading">Reviews </h6>
                <span>Rate and Review It</span>
              </div>
              <form method="post" action="#" enctype="multipart/form-data">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Enter Your Review Title </label>
                      <input type="text" name="review_title" class="form-control" placeholder="Enter Your Review Title">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Pros: What did you find most appealing in {{ $listing->name }}?</label>
                      <textarea rows="8" name="pros" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Cons: What did you find least appealing in {{ $listing->name }}?</label>
                      <textarea rows="8" name="cons" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Share your overall experience with {{ $listing->name }}</label>
                      <textarea rows="8" name="overall_experience" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <h6 class="rating_title">Ratings</h6>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class='d-flex justify-content-between rating-stars'>
                          <div class="rating_text">
                            <p>Ease of Use</p>
                          </div>
                          <ul class='ease_use'>
                            <li class='star' title='Poor' data-value='1'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Fair' data-value='2'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Good' data-value='3'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Excellent' data-value='4'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='WOW!!!' data-value='5'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                          </ul>
                        </div>
                        <div class='d-flex justify-content-between rating-stars'>
                          <div class="rating_text">
                            <p>Features & Functionality</p>
                          </div>
                          <ul class='ease_use'>
                            <li class='star' title='Poor' data-value='1'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Fair' data-value='2'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Good' data-value='3'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Excellent' data-value='4'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='WOW!!!' data-value='5'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class='d-flex justify-content-between rating-stars'>
                          <div class="rating_text">
                            <p>Customer Support</p>
                          </div>
                          <ul class='ease_use'>
                            <li class='star' title='Poor' data-value='1'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Fair' data-value='2'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Good' data-value='3'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Excellent' data-value='4'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='WOW!!!' data-value='5'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                          </ul>
                        </div>
                        <div class='d-flex justify-content-between rating-stars'>
                          <div class="rating_text">
                            <p>Overall Experience</p>
                          </div>
                          <ul class='ease_use'>
                            <li class='star' title='Poor' data-value='1'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Fair' data-value='2'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Good' data-value='3'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Excellent' data-value='4'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='WOW!!!' data-value='5'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Free trial" name="anonymously_review[]"
                             id="anonymously_review">
                      <label class="form-check-label" for="anonymously_review">
                        Post Review Anonymously?
                      </label>
                    </div>
                  </div>
                  <div class="col-12 text-end">
                    <button class="btn btn-secondary btn-blue waves-effect waves-light">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
