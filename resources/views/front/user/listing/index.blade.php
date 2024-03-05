@extends('layouts/layoutMaster')

@section('title', 'Software Management')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection



@section('content')
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header">
      <h5 class="card-title mb-0">Software</h5>
    </div>
    @if (\Session::has('success'))
      <div class="alert alert-success ms-3 me-3">
        {!! \Session::get('success') !!}
      </div>
    @endif
    <div class="card-datatable table-responsive">
      <table class="datatables-users table">
        <thead class="border-top">
        <tr>
          <th></th>
          <th>Id</th>
          <th>Name</th>
          <th>Vendor Name</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection

@section('page-script')
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var dt_user_table = $('.datatables-users'),
        userView = baseUrl + 'app/user/view/account';
      if (dt_user_table.length) {
        var dt_user = dt_user_table.DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{ route('ListingData') }}"
          },
          columns: [
            // columns according to JSON
            {
              data: ''
            }, {
              data: 'id'
            }, {
              data: 'name'
            }, {
              data: 'vendor_name'
            }, {
              data: 'status'
            }, {
              data: 'created_at'
            }, {
              data: 'action'
            }],
          columnDefs: [{
            // For Responsive
            className: 'control',
            searchable: false,
            orderable: false,
            responsivePriority: 2,
            targets: 0,
            render: function render(data, type, full, meta) {
              return '';
            }
          }, {
            searchable: false,
            orderable: false,
            targets: 1,
            render: function render(data, type, full, meta) {
              return "<span>".concat(full.fake_id, "</span>");
            }
          }, {
            // User full name
            targets: 2,
            responsivePriority: 4,
            render: function render(data, type, full, meta) {
              var $name = full['name'];

              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['name'],
                $initials = $name.match(/\b\w/g) || [],
                $output;
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';

              // Creates full output for row
              var $row_output = '<div class="d-flex justify-content-start align-items-center user-name">' + '<div class="avatar-wrapper">' + '<div class="avatar avatar-sm me-3">' + $output + '</div>' + '</div>' + '<div class="d-flex flex-column">' + '<a href="listing/information/'+full['id']+'" class="text-body text-truncate"><span class="fw-medium">' + $name + '</span></a>' + '</div>' + '</div>';
              return $row_output;
            }
          }, {
            // User email
            targets: 3,
            searchable: true,
            orderable: true,
            render: function render(data, type, full, meta) {
              var $vendor_name = full['vendor_name'];
              return '<span class="user-email">' + $vendor_name + '</span>';
            }
          }, {
            // User email
            targets: 4,
            render: function render(data, type, full, meta) {
              var $status = full['status'];
              return '<span class="status l-'+status+'">' + $status + '</span>';
            }
          }, {
            // User email
            targets: 5,
            render: function render(data, type, full, meta) {
              var $created_at = full['created_at'];
              return '<span class="user-email">' + $created_at + '</span>';
            }
          }, {
            // Actions
            targets: -1,
            title: 'Actions',
            searchable: false,
            orderable: false,
            render: function render(data, type, full, meta) {
              return '<div class="d-inline-block text-nowrap">' + "<a class=\"btn font-dark btn-sm btn-icon edit-record\" href='listing/information/"+full['id']+"' data-id=\"".concat(full['id'], "\" data-bs-toggle=\"\" data-bs-target=\"\"><i class=\"ti ti-edit\"></i></a>") + "<button class=\"btn btn-sm btn-icon delete-record\" data-id=\"".concat(full['id'], "\"><i class=\"ti ti-trash\"></i></button>") + '</div>';
            }
          }],
          order: [[2, 'desc']],
          dom: '<"row mx-2"' + '<"col-md-2"<"me-3"l>>' + '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' + '>t' + '<"row mx-2"' + '<"col-sm-12 col-md-6"i>' + '<"col-sm-12 col-md-6"p>' + '>',
          language: {
            sLengthMenu: '_MENU_',
            search: '',
            searchPlaceholder: 'Search..'
          },
          // Buttons with Dropdown
          buttons: [{
            extend: 'collection',
            className: 'btn btn-label-primary dropdown-toggle mx-3',
            text: '<i class="ti ti-logout rotate-n90 me-2"></i>Export',
            buttons: [{
              extend: 'print',
              title: 'Listings',
              text: '<i class="ti ti-printer me-2" ></i>Print',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be print
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function customize(win) {
                //customize print view for dark
                $(win.document.body).css('color', config.colors.headingColor).css('border-color', config.colors.borderColor).css('background-color', config.colors.body);
                $(win.document.body).find('table').addClass('compact').css('color', 'inherit').css('border-color', 'inherit').css('background-color', 'inherit');
              }
            }, {
              extend: 'csv',
              title: 'Listings',
              text: '<i class="ti ti-file-text me-2" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be print
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }, {
              extend: 'excel',
              title: 'Listings',
              text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be display
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }, {
              extend: 'pdf',
              title: 'Listings',
              text: '<i class="ti ti-file-text me-2"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be display
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }, {
              extend: 'copy',
              title: 'Listings',
              text: '<i class="ti ti-copy me-1" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be copy
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }]
          }, {
            text: '<i class="ti ti-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add New Software</span>',
            className: 'btn btn-primary',
            action: function ( e, dt, button, config ) {
              window.location = baseUrl+'admin/listing/create/';
            }
          }],
          // For responsive popup
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function header(row) {
                  var data = row.data();
                  return 'Details of ' + data['name'];
                }
              }),
              type: 'column',
              renderer: function renderer(api, rowIdx, columns) {
                var data = $.map(columns, function (col, i) {
                  return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                    ? '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' + '<td>' + col.title + ':' + '</td> ' + '<td>' + col.data + '</td>' + '</tr>' : '';
                }).join('');
                return data ? $('<table class="table"/><tbody />').append(data) : false;
              }
            }
          }
        });
      }
      $(document).on('click', '.add-new', function () {
        var user_id = $(this).data('id'),
          dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
          dtrModal.modal('hide');
        }

        // sweetalert for confirmation of delete
        Swal.fire({
          title: 'What do you want to add?',
          text: "Select service or software",
          icon: 'question',
          showDenyButton: true,
          confirmButtonText: "Software",
          denyButtonText: `Service`,
          buttonsStyling: false,
          customClass: {
            confirmButton: 'btn btn-success me-3',
            denyButton: 'btn btn-success me-3'
          },
        }).then(function (result) {
          if (result.isConfirmed) {
            window.location.href = "{{route('listing.create')}}";
          } else if (result.isDenied) {
            window.location.href = "{{route('service.create')}}";
          }
        });
      });
      $(document).on('click', '.delete-record', function () {
        var user_id = $(this).data('id'),
          dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
          dtrModal.modal('hide');
        }

        // sweetalert for confirmation of delete
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary'
          },
          buttonsStyling: false
        }).then(function (result) {
          if (result.value) {
            // delete the data

            $.ajax({
              type: 'DELETE',
              url: "".concat(baseUrl, "admin/listing/").concat(user_id),
              dataType: 'JSON',
              data:{
                'id': user_id,
                '_token': '{{ csrf_token() }}',
              },
              success: function success() {
                setTimeout(function() {
                  location.reload();
                }, 500);

              },
              error: function error(_error) {
                console.log(_error);
              }
            });

            // success sweetalert
            Swal.fire({
              icon: 'success',
              title: 'Deleted!',
              text: 'The listing has been deleted!',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Cancelled',
              text: 'The listing is not deleted!',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          }
        });
      });

    });
  </script>
@endsection
