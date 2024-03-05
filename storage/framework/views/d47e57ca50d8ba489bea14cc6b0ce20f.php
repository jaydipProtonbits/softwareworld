<?php $__env->startSection('title', 'Category Management'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Categories</h5>
  </div>
  <?php if(\Session::has('success')): ?>
    <div class="alert alert-success ms-3 me-3">
        <?php echo \Session::get('success'); ?>

    </div>
<?php endif; ?>
      <div class="row mt-2 ms-2">
            <div class="col-12">Filter : </div>

            <div class="col-md-3 type_filter">
            </div>

            <div class="col-md-3 prent_filter">
            </div>
      </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table">
      <thead class="border-top">
        <tr>
          <th></th>
          <th>Id</th>
          <th>Type</th>
          <th>Parent Category</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var dt_user_table = $('.datatables-users'),
            userView = baseUrl + 'app/user/view/account';
            if (dt_user_table.length) {
                var dt_user = dt_user_table.DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                    url: baseUrl + 'admin/category/ajaxData'
                  },
                  initComplete: function (settings, json) {
                      // Add select filter
                      $('.type_filter').append('<select class="form-control input-sm"  id="am_aplicacion_id"></select>');
                      $('#am_aplicacion_id').append('<option value="">Filter by Type</option>');
                      am_aplicacion_ids = <?php echo json_encode($types); ?>;
                      for (var key in am_aplicacion_ids) {
                          var obj = am_aplicacion_ids[key];

                            $('#am_aplicacion_id').append('<option value="' + obj.id + '">' + obj.name + '</option>');

                      }
                      // Filter results on select change
                      $('#am_aplicacion_id').on('change', function () {
                          dt_user.columns(3).search($(this).val()).draw();
                      });
                      $('.prent_filter').append('<select class="form-control input-sm"  id="pc_id"></select>');
                      $('#pc_id').append('<option></option>');
                      pc_ids = <?php echo json_encode($category); ?>;
                      for (var key in pc_ids) {
                          var obj = pc_ids[key];
                          $('#pc_id').append('<option value="' + obj.id + '">' + obj.name + '</option>');
                      }

                      $("#pc_id").select2({
                          placeholder: "Parent Category",
                          allowClear: true
                      });

                      // Filter results on select change
                      $('#pc_id').on('change', function () {
                          dt_user.columns(4).search($(this).val()).draw();
                      });




                  },
                  columns: [
                  // columns according to JSON
                    { data: '' },
                    { data: 'id' },
                    { data: 'type' },
                    { data: 'parent_id' },
                    { data: 'name' },
                    { data: 'action'}
                  ],
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
                    targets: 4,
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
                      var $row_output = '<div class="d-flex justify-content-start align-items-center user-name">' + '<div class="avatar-wrapper">' + '<div class="avatar avatar-sm me-3">' + $output + '</div>' + '</div>' + '<div class="d-flex flex-column">' + '<a href="category/'+full['id']+'/edit/" class="text-body text-truncate"><span class="fw-medium">' + $name + '</span></a>' + '</div>' + '</div>';
                      return $row_output;
                    }
                  }, {
                    // User email
                    targets: 3,
                    searchable: false,
                    orderable: false,
                    render: function render(data, type, full, meta) {
                      var $parent_id = full['parent_id'];
                      return '<span class="user-email">' + $parent_id + '</span>';
                    }
                  }, {
                    // User email
                    targets: 2,
                    searchable: true,
                    orderable: true,
                    render: function render(data, type, full, meta) {
                      var $type = full['type'];
                      return '<span class="user-email">' + $type + '</span>';
                    }
                  }, {
                    // Actions
                    targets: -1,
                    title: 'Actions',
                    searchable: false,
                    orderable: false,
                    render: function render(data, type, full, meta) {
                      return '<div class="d-inline-block text-nowrap">' + "<a class=\"btn font-dark btn-sm btn-icon edit-record\" href='category/"+full['id']+"/edit/' data-id=\"".concat(full['id'], "\" data-bs-toggle=\"\" data-bs-target=\"\"><i class=\"ti ti-edit\"></i></a>") + "<button class=\"btn btn-sm btn-icon delete-record\" data-id=\"".concat(full['id'], "\"><i class=\"ti ti-trash\"></i></button>") + '</div>';
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
                  buttons: [
                  {
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle mx-3',
                    text: '<i class="ti ti-logout rotate-n90 me-2"></i>Export',
                    buttons: [
                    {
                      extend: 'print',
                      title: 'Category',
                      text: '<i class="ti ti-printer me-2" ></i>Print',
                      className: 'dropdown-item',
                      exportOptions: {
                        columns: [2, 3, 4],
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
                      title: 'Category',
                      text: '<i class="ti ti-file-text me-2" ></i>Csv',
                      className: 'dropdown-item',
                      exportOptions: {
                        columns: [2, 3, 4],
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
                      title: 'Category',
                      text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                      className: 'dropdown-item',
                      exportOptions: {
                        columns: [2, 3, 4],
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
                      title: 'Category',
                      text: '<i class="ti ti-file-text me-2"></i>Pdf',
                      className: 'dropdown-item',
                      exportOptions: {
                        columns: [2, 3, 4],
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
                      title: 'Category',
                      text: '<i class="ti ti-copy me-1" ></i>Copy',
                      className: 'dropdown-item',
                      exportOptions: {
                        columns: [2, 3, 4],
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
                    text: '<i class="ti ti-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add New Category</span>',
                    className: 'add-new btn btn-primary',
                    action: function ( e, dt, button, config ) {
                        window.location = baseUrl+'admin/category/create/';
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
                  url: "".concat(baseUrl, "admin/category/").concat(user_id),
                   dataType: 'JSON',
                    data:{
                        'id': user_id,
                        '_token': '<?php echo e(csrf_token()); ?>',
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
                  text: 'The category has been deleted!',
                  customClass: {
                    confirmButton: 'btn btn-success'
                  }
                });
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                  title: 'Cancelled',
                  text: 'The Category is not deleted!',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/admin/category/index.blade.php ENDPATH**/ ?>