@extends('layouts/layoutMaster')
@section('title', 'Settings')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/chartjs/chartjs.js')}}"></script>
<script type="text/javascript">
        $('#analytics_p .flatpickr-input').flatpickr({monthSelectorType:"static"})
        var labels = [];
        var data = [];
        for (var i = 1; i <= 15; i++) {
          var label = "1 Jan " + i;
          labels.push(label);
          data.push(Math.floor(Math.random() * 15));

        }
      const ctx = document.getElementById('profile_view');
      const ctx2 = document.getElementById('website_view');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: '# of Views',
            borderColor:'#013870',
            data: data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
      new Chart(ctx2, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: '# of Views',
            borderColor:'#013870',
            data: data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
</script>
@endsection
@section('content')
<div class="row" id="analytics_p">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title mb-0">Analytics</h1>
        </div>
        <div class="card-body pt-2">
            <div class="d-flex justify-content-between">
                <h3>Profile Views</h3>
                <input type="text" class="form-control flatpickr-input" placeholder="YYYY-MM-DD" id="flatpickr-date" readonly="readonly">
            </div>

            <div class="text-center">
                <h2>Views: <strong>3</strong></h2>
            </div>
            <div class="main_chart">
                <canvas id="profile_view"></canvas>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                <h3>Website Visits</h3>
                <input type="text" class="form-control flatpickr-input" placeholder="YYYY-MM-DD" id="flatpickr-date" readonly="readonly">
            </div>
            <div class="text-center">
                <h2>Views: <strong>3</strong></h2>
            </div>
            <div class="main_chart">
                <canvas id="website_view"></canvas>
            </div>

        </div>
    </div>
</div>
@endsection