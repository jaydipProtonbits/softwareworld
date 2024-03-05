<!-- Footer: Start -->
<footer class="landing-footer bg-body footer-text">
  <div class="footer-top">
    <div class="container">
      <div class="row gx-0 gy-4 g-md-5">
        <div class="col-lg-5">
          <a href="{{url('/')}}" class="app-brand-link mb-4">
            <img src="{{asset('assets/img/branding/nav_logo.svg')}}">
          </a>
          <p class="footer-text footer-logo-description mb-4">
            SoftwareWorld is a software review platform that showcases top software solutions suitable for various industries, providing a comprehensive review service by comparing the best software solutions available on the market. The platform creates unbiased lists of the top software solutions by category, helping businesses find the right solution for them.
          </p>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 pe-1 ps-2">
          <h6 class="footer-title mb-4">About</h6>
          <ul class="list-unstyled">
            <li class="mb-3">
              <a href="javascript:void(0);" class="footer-link">Why SoftwareWorld</a>
            </li>
            <li class="mb-3">
              <a href="javascript:void(0);" class="footer-link">Blogs</a>
            </li>
            <li class="mb-3">
              <a href="javascript:void(0);" class="footer-link">Help Center</a>
            </li>
            <li class="mb-3">
              <a href="javascript:void(0);" class="footer-link">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <h6 class="footer-title mb-4">For User</h6>
          <ul class="list-unstyled">
            <li class="mb-3">
              <a href="javascript:void(0)" class="footer-link">Pricing</a>
            </li>
            <li class="mb-3">
              <a href="javascript:void(0)" class="footer-link">Find Software</a>
            </li>
            <li class="mb-3">
              <a href="javascript:void(0)" class="footer-link">Find Service</a>
            </li>
            <li class="mb-3">
              <a href="javascript:void(0)" class="footer-link">Methodology</a>
            </li>
            <li class="mb-3 hide_review_only">
              <a href="javascript:void(0);" class="footer-link">Write A Review</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-4">
          <h6 class="footer-title mb-4">For Business</h6>
            <ul class="list-unstyled">
                <li class="mb-3">
                  <a href="javascript:void(0)" class="footer-link">Get Listed</a>
                </li>
                <li class="mb-3">
                  <a href="javascript:void(0)" class="footer-link">Vendor Login</a>
                </li>
            </ul>
            <ul class="list-unstyled list-inline f-logo">
                <li class="list-inline-item"><a href="javascript:void(0);"><img src="{{asset('assets/img/icons/f-linkedin.svg')}}"></a></li>
                <li class="list-inline-item"><a href="javascript:void(0);"><img src="{{asset('assets/img/icons/f-facebook.svg')}}"></a></li>
                <li class="list-inline-item"><a href="javascript:void(0);"><img src="{{asset('assets/img/icons/f-twitter.svg')}}"></a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom py-3">
    <div class="container ">
        <div class="row">
            
              <div class="col-md-8 text-end p-0">
                <p class="d_copy">Copyright © <script>document.write(new Date().getFullYear());</script> {{config('variables.creatorName')}}. All Rights Reserved.</p>
              </div>
              <div class="col-md-4 text-end fb_links pe-0">
                <a href="{{config('variables.githubFreeUrl')}}" class="footer-link me-3" target="_blank">Privacy Policy</a>
                <a href="{{config('variables.facebookUrl')}}" class="footer-link pe-0" target="_blank">Terms of Use</a>
              </div>
        </div>
    </div>
  </div>
</footer>
<!-- Footer: End -->
