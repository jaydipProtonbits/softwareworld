<?php
    $configData = Helper::appClasses();
?>



<?php $__env->startSection('title', $listing->name ?? 'Single Service Page'); ?>

<?php $__env->startSection('meta_title', $listing->name ?? ''); ?>
<?php $__env->startSection('meta_description', $listing->getMeta('short_description') ?? ''); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/front-page-landing.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/ui-carousel.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/front-page-landing.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ui-carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/chartjs/chartjs.js')); ?>"></script>
    <script>
        var industriesLabels = <?php echo json_encode($industries_labels, 15, 512) ?>;
        var industriesData = <?php echo json_encode($industries_data, 15, 512) ?>;

        var service_label = <?php echo json_encode($service_labels, 15, 512) ?>;
        var service_data = <?php echo json_encode($service_data, 15, 512) ?>;
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            /*review Open Close*/
            $('button.expand-btn').click(function() {
                $(this).parent().parent().find('.hiiden_item').toggle();
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).html('Hide Full Review <i class="ti ti-chevron-up"></i>');
                } else {
                    $(this).html('Read Full Review <i class="ti ti-chevron-down"></i>');
                }
            });


            // single page tab changes
            jQuery('#inner_menu .menu_items li a').click(function(event) {
                jQuery('#inner_menu .menu_items li a').removeClass('active');
                jQuery(this).addClass('active');
            });

            /*----  Close the Portfolio   ----*/
            $(document).on('click', '.close_portoflio', function() {
                $(this).addClass('d-none');
                $('body #portfolio_view').addClass('d-none');
            });

            var data = {
                labels: service_label,
                datasets: [{
                    data: service_data,
                    backgroundColor: ['#164F6F', '#22719F', '#2D94CF', '#38B6FF', '#60C5FF', '#88D3FF',
                        '#AFE2FF', '#C3E9FF', '#D7F0FF', '#EBF8FF'
                    ],
                }]
            };

            var industry_data = {
                labels: industriesLabels,
                datasets: [{
                    data: industriesData,
                    backgroundColor: ['#164F6F', '#22719F', '#2D94CF', '#38B6FF', '#60C5FF', '#88D3FF',
                        '#AFE2FF', '#C3E9FF', '#D7F0FF', '#EBF8FF'
                    ],
                }]
            };

            var client_data = {
                labels: ["Percent of work for clients with < $10M in revenue",
                    "Percent of work for clients with $10M &shy; $1B in revenue",
                    "Percent of work for clients with > $1B in revenue"
                ],
                datasets: [{
                    data: ['<?php echo e($listing->getMeta('client_focus', [])['small'] ?? '0'); ?>',
                        <?php echo e($listing->getMeta('client_focus', [])['midmarket'] ?? '0'); ?>,
                        <?php echo e($listing->getMeta('client_focus', [])['enterprise'] ?? '0'); ?>

                    ],
                    backgroundColor: ['#164F6F', '#22719F', '#2D94CF'],
                }]
            };


            // Configuration options for the Pie Chart
            var options = {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false,
                        fullSize: true,
                        position: 'bottom'
                    },

                }

            };

            // Get the context of the canvas element
            var service_focus = document.getElementById('service_focus').getContext('2d');
            var client_focus = document.getElementById('client_focus').getContext('2d');
            var industry_focus = document.getElementById('industry_focus').getContext('2d');

            // Create the Pie Chart
            var myPieChart1 = new Chart(service_focus, {
                type: 'pie',
                data: data,
                options: options
            });

            var myPieChart2 = new Chart(client_focus, {
                type: 'pie',
                data: client_data,
                options: options
            });

            var myPieChart3 = new Chart(industry_focus, {
                type: 'pie',
                data: industry_data,
                options: options
            });

            var legendHtml = generateLegend(myPieChart1);
            $('.service_focus_l').html(legendHtml);

            var legendHtml = generateLegend(myPieChart2);
            $('.client_focus_l').html(legendHtml);

            var legendHtml = generateLegend(myPieChart3);
            $('.industry_focus_l').html(legendHtml);

            function generateLegend(chart) {
                var legendItems = chart.legend.legendItems;
                var legendHtml = '<ul>';
                legendItems.forEach(function(item) {
                    legendHtml += '<li><span class="bg_legend" style="background-color:' + item.fillStyle +
                        '"></span>';
                    legendHtml += '<span class="bg_label">' + item.text + '</span></li>';
                });
                legendHtml += '</ul>';
                return legendHtml;
            }

            $(document).ready(function() {
                var fixedSection = $("#inner_menu");
                var offset = fixedSection.offset().top;
                $(window).scroll(function() {
                    if ($(window).scrollTop() > offset) {
                        fixedSection.addClass("fixed");
                    } else {
                        fixedSection.removeClass("fixed");
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        function readMoreAbout() {
            var _moreText = document.getElementById("more-about");
            var _readMoreButton = document.getElementById("read-more-about");

            if (_moreText.style.display === "none") {
                _moreText.style.display = "inline";
                _readMoreButton.style.display = "none";
            } else {
                _moreText.style.display = "none";
            }
        }

        function view_portfolio(id) {
            let url = '<?php echo e(route('get_portfolio_details', ':id')); ?>';
            url = url.replace(':id', id);
            $.get(url, function(response) {
                if (response.success) {
                    $('#portfolio_view').removeClass('d-none').html(response.portfolio_html);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div data-bs-spy="scroll" class="scrollspy-example service_single">

        <!-- Heading Title -->
        <section id="page_heading" class="mt-3 single_heading">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-3 pb-3">
                                <ul class="list-inline m-0 p-0 m-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="b_link">Home /</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="b_link active"><?php echo e($listing->name); ?></a></li>
                                </ul>
                            </div>
                            <div class="card-body mt-3 pb-0 ">
                                <div class="row branding">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="pre_img text-center <?php echo e($listing->logo ? 'bg-white' : ''); ?>">
                                                    <?php if($listing->logo): ?>
                                                        <img src="<?php echo e(asset('assets/service/' . $listing->logo)); ?>"
                                                            width="100px" alt="<?php echo e($listing->name); ?>">
                                                    <?php else: ?>
                                                        <?php echo e(substr($listing->name, 0, 1)); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <h1><?php echo e($listing->name); ?></h1>
                                                <p><?php echo e($listing->tagline); ?></p>
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul class="list-group list-group-horizontal list-inline gap-1">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0 <a href="javascript:void(0);">4 Reviews</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-4 text-end">
                                        <a href="<?php echo e($listing->website); ?>" class="btn btn-primary" id="visit_website">VISIT
                                            WEBSITE &nbsp;<i class="ti ti-external-link"></i></a>
                                        <p class="verified_btn">
                                            <?php if($listing->claimed_by): ?>
                                                <i class="ti ti-circle-check"></i> Verified Profile
                                            <?php else: ?>
                                                <i class="ti ti-info-circle text-gray"></i> Unclaimed Profile
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Heading Title -->

        <!-- Menu -->
        <section id="inner_menu" class="mt-0 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="align-items-baseline d-flex justify-content-between menu_inner">
                            <div class="menu_items">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item logo-item">
                                        <?php if($listing->logo): ?>
                                            <img src="<?php echo e(asset('assets/service/' . $listing->logo)); ?>" height="48px"
                                                width="48px" class="img-fluid" alt="<?php echo e($listing->name); ?>">
                                        <?php else: ?>
                                            <img src="https://placehold.co/48x48/fdd400/000000/png?text=<?php echo e(substr($listing->name, 0, 1)); ?>"
                                                height="48px" width="48px" class="img-fluid">
                                        <?php endif; ?>
                                        <span><?php echo e($listing->name); ?></span>
                                    </li>
                                    <li class="list-inline-item"><a href="#overview" class="active">Overview</a></li>
                                    <li class="list-inline-item"><a href="#focus">Focus</a></li>
                                    <li class="list-inline-item"><a href="#portfolio">Portfolio</a></li>
                                    <li class="list-inline-item hide_review_only"><a href="#reviews">Reviews</a></li>
                                </ul>
                            </div>
                            <div class="menu_btns">
                                <a href="javascript:void(0)" class="review_link hide_review_only"><i class="ti ti-edit"></i>
                                    &nbsp; Write a Review</a>
                                <a href="<?php echo e($listing->website); ?>" class="website_link">VISIT WEBSITE &nbsp; <i
                                        class="ti ti-external-link"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Menu -->

        <!-- Overview -->
        <section id="overview" class="section_service mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2>Overview</h2>
                            <div class="row single_meta mb-md-5">
                                <div class="col-lg-10">
                                    <p>
                                        <?php echo nl2br($listing->getMeta('long_description') ?? '') ?? ''; ?>

                                    </p>
                                    </p>
                                </div>
                                <div class="col-lg-2 single_property">
                                    <p>
                                        <img src="<?php echo e(asset('assets/img/icons/misc/coin.svg')); ?>">
                                        <?php $__currentLoopData = HourlyRate(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($listing->hourly_rate == $key ? $value . '/hr' : ''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <p>
                                        <img src="<?php echo e(asset('assets/img/icons/misc/user-blue.svg')); ?>">
                                        <?php $__currentLoopData = EmployeesSize(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($listing->employees == $key ? $value : ''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <p>
                                        <img src="<?php echo e(asset('assets/img/icons/misc/calendar-plain.svg')); ?>">
                                        <?php echo e($listing->founded); ?>

                                    </p>
                                    <p>
                                        <img src="<?php echo e(asset('assets/img/icons/misc/label.svg')); ?>">
                                        <?php $__currentLoopData = ProjectCost(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($listing->project_cost == $key ? $value : ''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <p>
                                    <div class="d-flex gap-4">
                                        <?php if($listing->getMeta('linkedin') ?? false): ?>
                                            <a href="<?php echo e($listing->getMeta('linkedin') ?? 'javascript:void(0)'); ?>">
                                                <img src="<?php echo e(asset('assets/img/icons/linkedin-web.svg')); ?>">
                                            </a>
                                        <?php endif; ?>
                                        <?php if($listing->getMeta('facebook') ?? false): ?>
                                            <a href="<?php echo e($listing->getMeta('facebook') ?? 'javascript:void(0)'); ?>">
                                                <img src="<?php echo e(asset('assets/img/icons/facebook-web.svg')); ?>">
                                            </a>
                                        <?php endif; ?>
                                        <?php if($listing->getMeta('twitter') ?? false): ?>
                                            <a href="<?php echo e($listing->getMeta('twitter') ?? 'javascript:void(0)'); ?>">
                                                <img src="<?php echo e(asset('assets/img/icons/x-web.svg')); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <h4>Company Location</h4>
                            <div class="row single_locations">
                                <div class="col-lg-3">
                                    <div class="loc_inner">
                                        <h6>
                                            <?php echo e($country_name ?? ''); ?> (HQ)
                                        </h6>
                                        <p>
                                            <?php echo e($listing->street ?? ''); ?>, <?php echo e($city_name ?? ''); ?>, <?php echo e($state_name ?? ''); ?>

                                            <?php echo e($listing->postal_code ?? ''); ?>

                                        </p>
                                        <p>
                                            <?php echo e($listing->location_phone ?? ''); ?>

                                        </p>
                                    </div>
                                </div>

                                <?php
                                    $locations = $listing->getMeta('locations', []);
                                ?>

                                <?php for($i = 2; $i <= 4; $i++): ?>
                                    <?php
                                        $loc = empty($locations[$i]) ? [] : $locations[$i];
                                    ?>
                                    <div class="col-lg-3 <?php echo e(empty($locations[$i]) ? 'd-none' : ''); ?>">
                                        <div class="loc_inner">
                                            <h6>
                                                <?php echo e($location_data[$i]['country_name'] ?? ''); ?>

                                            </h6>
                                            <p>
                                                <?php echo e($loc['street'] ?? ''); ?>,
                                                <?php echo e($location_data[$i]['city_name'] ?? ''); ?>,
                                                <?php echo e($location_data[$i]['state_name'] ?? ''); ?>

                                                <?php echo e($loc['zip_code'] ?? ''); ?>

                                            </p>
                                            <p>
                                                <?php echo e($loc['contact_no'] ?? ''); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endfor; ?>

                                <div class="col-12 text-end mt-3 d-none">
                                    <a href="javascript:void(0);" id="show_more_loc">Show More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Overview -->

        <!-- focus -->
        <section id="focus" class="section_service mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2>Focus Areas</h2>
                            <div class="row single_focus">
                                <div class="col-lg-4">
                                    <div class="focus_inner">
                                        <h6>Service Focus</h6>
                                        <canvas id="service_focus" width="300px" height="300px"></canvas>
                                        <div class="service_focus_l cum_legend"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="focus_inner">
                                        <h6>Client Focus</h6>
                                        <canvas id="client_focus" width="300px" height="300px"></canvas>
                                        <div class="client_focus_l cum_legend"></div>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="focus_inner">
                                        <h6>Industry Focus</h6>
                                        <canvas id="industry_focus" width="300px" height="300px"></canvas>
                                        <div class="industry_focus_l cum_legend"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- focus -->

        <!-- Portfolio -->
        <section id="portfolio" class="section_service mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-0">
                            <h2><?php echo e($listing->name ?? null); ?> Clients & Portfolios</h2>
                            <h5>
                                Key Clients
                            </h5>
                            <div class="key_clients d-flex gap-2 flex-wrap">
                                <?php $__currentLoopData = $key_clients ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="javascript:void(0);"><?php echo e($key_client); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="port_single mt-4 d-none" id="portfolio_view"></div>

                            <div class="row mt-3 port_thumb">
                                <?php if(count($listing->portfolio) > 0): ?>
                                    <?php $__currentLoopData = $listing->portfolio()->select('thumbnail', 'id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-4 mb-4">
                                            <a href="javascript:void(0)" onclick="view_portfolio(<?php echo e($portfolio->id); ?>)">
                                                <img src="<?php echo e($portfolio->thumbnail_url); ?>" class="img-fluid"
                                                    data-port_id="<?php echo e($portfolio->id); ?>">
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio -->

        <!-- focus -->
        <section id="reviews" class="section_service hide_review_only mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box_inner pb-4">
                            <h2>Innowise Group Reviews</h2>
                            <div class="review_sort mb-4">
                                <div class="row">
                                    <div class="align-items-center review_top_row row">
                                        <div class="col-lg-3">
                                            <div class="align-items-center d-flex gap-2">
                                                <label>Services: </label>
                                                <select class="form-control">
                                                    <option value="">All Services</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="align-items-center d-flex gap-2">
                                                <label>Sort By:</label>
                                                <select id="ss_sort_review" class="form-control">
                                                    <option value="">Relevance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul
                                                class="list-group list-group-horizontal list-inline gap-1 justify-content-start">
                                                <li><i class="ti ti-star-filled"></i></li>
                                                <li><i class="ti ti-star-filled"></i></li>
                                                <li><i class="ti ti-star-filled"></i></li>
                                                <li><i class="ti ti-star"></i></li>
                                                <li><i class="ti ti-star"></i></li>
                                                <li class="r_count">3.0</li>
                                                <li class="r_link"><a href="javascript:void(0);">19 Reviews</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="javascript:void(0);" class="btn btn-secondary" id="add_review">Write
                                                a Review</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card mb-4 review_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-xs-12 col-sm-12 border-end">
                                        <div class="row mb-4">
                                            <div class="col-sm-2">
                                                <img src="<?php echo e(asset('assets/img/placeholder/review-man.png')); ?>"
                                                    width="100px" height="100px" class="img-fluid rounded-1">
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="name_details mb-2">
                                                    <h3 class="d-inline">Ross E</h3>
                                                    <p class="time_leap d-inline">Posted 1 day ago</p>
                                                </div>
                                                <p class="r_role">General Manager</p>
                                                <p class="r_role">Events Services, 51 - 200 Employess</p>
                                            </div>
                                        </div>
                                        <h4>Rating</h4>
                                        <div class="row o-rating align-items-center mb-4 pe-4">
                                            <div class="col-sm-6">
                                                <p class="m-0">Overall Rating</p>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul
                                                        class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-0">Quality </p>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul
                                                        class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-0">Communication</p>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul
                                                        class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-0">Cost</p>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <div class="soft_ratings mb-3 mt-2">
                                                    <ul
                                                        class="list-group list-group-horizontal list-inline gap-1 justify-content-end">
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star-filled"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li><i class="ti ti-star"></i></li>
                                                        <li class="r_count">3.0</li>
                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row pro_details border-top me-0">
                                            <div class="col-md-8 border-end pt-3 pb-2">
                                                <h4>Project Details</h4>
                                                <p>Project Cost :- <span>$100000 to $500000</span></p>
                                                <p>Project Status :- <span>On Going</span></p>
                                            </div>
                                            <div class="col-md-4 text-center pt-3">
                                                <h4 class="text-center">Share it on</h4>
                                                <ul
                                                    class="list-group list-group-horizontal list-inline gap-3 justify-content-center">
                                                    <li><img src="<?php echo e(asset('assets/img/icons/linkedin-web.svg')); ?>"
                                                            width="24px" height="24px" class="img-fluid"></li>
                                                    <li><img src="<?php echo e(asset('assets/img/icons/facebook-web.svg')); ?>"
                                                            width="24px" height="24px" class="img-fluid"></li>
                                                    <li><img src="<?php echo e(asset('assets/img/icons/x-web.svg')); ?>"
                                                            width="24px" height="24px" class="img-fluid"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-xs-12 col-sm-12 r_content">
                                        <h2>“Zoho CRM is one of the best products”</h2>
                                        <ul>
                                            <li>
                                                <p class="r_ques">What was the project name that you have worked with
                                                    OpenXcell?</p>
                                                <p class="r_ans">Goodfirms</p>
                                            </li>
                                            <li>
                                                <p class="r_ques">What did you find most impressive about Hashthink
                                                    Technologies Inc</p>
                                                <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.</p>
                                            </li>
                                            <li class="hiiden_item">
                                                <p class="r_ques">What did you find most impressive about Hashthink
                                                    Technologies Inc</p>
                                                <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.</p>
                                            </li>
                                            <li class="hiiden_item">
                                                <p class="r_ques">What did you find most impressive about Hashthink
                                                    Technologies Inc</p>
                                                <p class="r_ans">Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.</p>
                                            </li>
                                        </ul>
                                        <div class="text-end">
                                            <button class="expand-btn btn btn-primary">Read Full Review <i
                                                    class="ti ti-chevron-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- focus -->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\softwareworld\resources\views/front/web/service/index.blade.php ENDPATH**/ ?>