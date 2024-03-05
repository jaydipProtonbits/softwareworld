@extends('layouts/layoutMaster')

@section('title', 'Software Management')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
  <style>
    .dd-btn {
      display: inline-block;
    }
    div#list_of_claims_filter {
      display: none;
    }
  </style>
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
@endsection



@section('content')
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-2">
          <h5 class="card-title mb-0">Claims</h5>
        </div>
        <div class="col-md-7"></div>
      </div>
    </div>
    @if (\Session::has('success'))
      <div class="alert alert-success ms-3 me-3">
        {!! \Session::get('success') !!}
      </div>
    @endif

    <div class="card-datatable table-responsive">
      <table class="datatables-users table" id="list_of_claims">
        <thead class="border-top">
        <tr>
          <th>Id</th>
          <th>Types</th>
          <th>Name</th>
          <th>Claim Email</th>
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
    let list_of_claims;

    list_of_claims = $('#list_of_claims').DataTable({
      serverSide  : true,
      order       : [0, 'asc'],
      ajax        : {
        url     : '{{ route('list_of_claims') }}',
        type    : 'post',
        data    : function(d){
          d._token = '{{ csrf_token() }}';
        }
      },
      columns     : [
        { data: 'id' },
        { data: 'type_id' },
        { data: 'claimed_id' },
        { data: 'email' },
        { data: 'status' },
        { data: 'created_at' },
        { data: 'actions', 'width': '20px', 'sClass': 'text-center' },
      ],
      columnDefs: [
        { orderable : false, targets : [6] }
      ],
      initComplete: function (res) {
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
      }
    });

    $(document).on('click', '.approved_claim', function () {
      let id = $(this).data('id');
      console.log(id);
      // sweetalert for confirmation of delete
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to Approve this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve it!',
        customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          let url = '{{ route('approve_claim', ':id') }}';
          url = url.replace(':id', id);

          $.ajax({
            type: 'post',
            url: url,
            dataType: 'JSON',
            data: {
              '_method': 'put',
              '_token': '{{ csrf_token() }}',
            },
            success: function success(response) {
              if(response.success)
              {
                // success sweetalert
                Swal.fire({
                  icon: 'success',
                  title: 'Approved!',
                  text: 'The Claim has been approved!',
                  customClass: {
                    confirmButton: 'btn btn-success'
                  }
                }).then(function (result) {
                    if(result.value)
                    {
                      setTimeout(function() {
                        location.reload();
                      }, 500);
                    }
                });
              }
            },
            error: function error(_error) {
              console.log(_error);
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'The Claim is not approve!',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  </script>
@endsection
