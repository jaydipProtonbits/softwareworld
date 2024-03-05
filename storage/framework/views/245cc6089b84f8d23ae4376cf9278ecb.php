<?php
$configData = Helper::appClasses();
?>

<?php $__env->startSection('title', 'Browse Software Categories'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/nouislider/nouislider.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/front-page-landing.css')); ?>" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on("keyup",'.hunt',function(){
            let val = $(this).val().toLowerCase();
            $('#cate_list .tab-content').children().addClass('show active');
            $("#cate_list .tab-pane").each(function(r, ele) {
                return $(ele).find("li").each(function(r, ele) {
                    $(ele).text().search(new RegExp(val, "i")) < 0 ? ($(ele).addClass("hide"), $(ele).removeClass("show")) : ($(ele).addClass("show"), $(ele).removeClass("hide"))
                }),
                    $(ele).find("li.show").length > 0 ? ($(ele).addClass("show"), $(ele).removeClass("hide")) : ($(ele).addClass("hide"), $(ele).removeClass("show"));
            });
            $("#cate_list .tab-pane").hasClass("show") ? ($(".software-explore-list .result-not-found").removeClass("show"), $(".software-explore-list .result-not-found").addClass("hide")):($(".software-explore-list .result-not-found").removeClass("hide"), $(".software-explore-list .result-not-found").addClass("show"))
        });
        $('#cate_list .nav-item button').on('click', function(e){
            e.preventDefault();

            console.log($(this).attr('data-bs-target'));
            
                
                // Hide all tab content
                $('#cate_list .tab-content').children().removeClass('show active');
                // Show the clicked tab content
                $('.tab-content '+ $(this).attr('data-bs-target')).addClass('show active');
            
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/front-page-landing.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div data-bs-spy="scroll" class="scrollspy-example">
    <div id="app-home">
        <!-- Top Heading -->
        <section class="mt-0 home_sec py-5" id="browse_head">
            <div class="container py-lg-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="top_head">Browse Software Categories</h1>
                        <p class="">Find the right Software providers</p>
                    </div>
                    <div class="col-12 mt-lg-4 text-center">
                        <form class="" method="get" onsubmit="return false;" id="searchform_categories">
                            <input type="text" name="q" placeholder="Search Company / Software" class="hunt">
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-3" id="cate_list">
            <div class="container">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <!-- Generate A-Z tabs -->
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-A" aria-controls="navs-tab-A" aria-selected="true">A</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-B" aria-controls="navs-tab-B" aria-selected="false">B</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-C" aria-controls="navs-tab-C" aria-selected="false">C</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-D" aria-controls="navs-tab-D" aria-selected="false">D</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-E" aria-controls="navs-tab-E" aria-selected="false">E</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-F" aria-controls="navs-tab-F" aria-selected="false">F</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-G" aria-controls="navs-tab-G" aria-selected="false">G</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-H" aria-controls="navs-tab-H" aria-selected="false">H</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-I" aria-controls="navs-tab-I" aria-selected="false">I</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-J" aria-controls="navs-tab-J" aria-selected="false">J</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-K" aria-controls="navs-tab-K" aria-selected="false">K</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-L" aria-controls="navs-tab-L" aria-selected="false">L</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-M" aria-controls="navs-tab-M" aria-selected="false">M</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-N" aria-controls="navs-tab-N" aria-selected="false">N</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-O" aria-controls="navs-tab-O" aria-selected="false">O</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-P" aria-controls="navs-tab-P" aria-selected="false">P</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-Q" aria-controls="navs-tab-Q" aria-selected="false">Q</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-R" aria-controls="navs-tab-R" aria-selected="false">R</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-S" aria-controls="navs-tab-S" aria-selected="false">S</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-T" aria-controls="navs-tab-T" aria-selected="false">T</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-U" aria-controls="navs-tab-U" aria-selected="false">U</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-V" aria-controls="navs-tab-V" aria-selected="false">V</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-W" aria-controls="navs-tab-W" aria-selected="false">W</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-X" aria-controls="navs-tab-X" aria-selected="false">X</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-Y" aria-controls="navs-tab-Y" aria-selected="false">Y</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-Z" aria-controls="navs-tab-Z" aria-selected="false">Z</button>
                        </li>
                    </ul>
                    <div class="tab-content px-0">
                        <!-- Generate content for each tab -->
                                                <?php 
                        $Alisting = clone $listing; 
                        $Alisting = $Alisting->where('title', 'like', 'A%')->get();
                        ?>
                        <?php if($Alisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-A" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">A</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Alisting as $key => $CharA): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharA->slug)); ?>"><?php echo e($CharA->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Blisting = clone $listing; 
                        $Blisting = $Blisting->where('title', 'like', 'B%')->get();
                        ?>
                        <?php if($Blisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-B" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">B</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Blisting as $key => $CharB): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharB->slug)); ?>"><?php echo e($CharB->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Clisting = clone $listing; 
                        $Clisting = $Clisting->where('title', 'like', 'C%')->get();
                        ?>
                        <?php if($Clisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-C" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">C</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Clisting as $key => $CharC): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharC->slug)); ?>"><?php echo e($CharC->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Dlisting = clone $listing; 
                        $Dlisting = $Dlisting->where('title', 'like', 'D%')->get();
                        ?>
                        <?php if($Dlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-D" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">D</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Dlisting as $key => $CharD): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharD->slug)); ?>"><?php echo e($CharD->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Elisting = clone $listing; 
                        $Elisting = $Elisting->where('title', 'like', 'E%')->get();
                        ?>
                        <?php if($Elisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-E" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">E</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Elisting as $key => $CharE): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharE->slug)); ?>"><?php echo e($CharE->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Flisting = clone $listing; 
                        $Flisting = $Flisting->where('title', 'like', 'F%')->get();
                        ?>
                        <?php if($Flisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-F" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">F</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Flisting as $key => $CharF): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharF->slug)); ?>"><?php echo e($CharF->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Glisting = clone $listing; 
                        $Glisting = $Glisting->where('title', 'like', 'G%')->get();
                        ?>
                        <?php if($Glisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-G" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">G</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Glisting as $key => $CharG): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharG->slug)); ?>"><?php echo e($CharG->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Hlisting = clone $listing; 
                        $Hlisting = $Hlisting->where('title', 'like', 'H%')->get();
                        ?>
                        <?php if($Hlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-H" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">H</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Hlisting as $key => $CharH): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharH->slug)); ?>"><?php echo e($CharH->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Ilisting = clone $listing; 
                        $Ilisting = $Ilisting->where('title', 'like', 'I%')->get();
                        ?>
                        <?php if($Ilisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-I" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">I</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Ilisting as $key => $CharI): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharI->slug)); ?>"><?php echo e($CharI->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Jlisting = clone $listing; 
                        $Jlisting = $Jlisting->where('title', 'like', 'J%')->get();
                        ?>
                        <?php if($Jlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-J" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">J</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Jlisting as $key => $CharJ): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharJ->slug)); ?>"><?php echo e($CharJ->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Klisting = clone $listing; 
                        $Klisting = $Klisting->where('title', 'like', 'K%')->get();
                        ?>
                        <?php if($Klisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-K" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">K</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Klisting as $key => $CharK): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharK->slug)); ?>"><?php echo e($CharK->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Llisting = clone $listing; 
                        $Llisting = $Llisting->where('title', 'like', 'L%')->get();
                        ?>
                        <?php if($Llisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-L" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">L</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Llisting as $key => $CharL): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharL->slug)); ?>"><?php echo e($CharL->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Mlisting = clone $listing; 
                        $Mlisting = $Mlisting->where('title', 'like', 'M%')->get();
                        ?>
                        <?php if($Mlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-M" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">M</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Mlisting as $key => $CharM): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharM->slug)); ?>"><?php echo e($CharM->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Nlisting = clone $listing; 
                        $Nlisting = $Nlisting->where('title', 'like', 'N%')->get();
                        ?>
                        <?php if($Nlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-N" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">N</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Nlisting as $key => $CharN): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharN->slug)); ?>"><?php echo e($CharN->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Olisting = clone $listing; 
                        $Olisting = $Olisting->where('title', 'like', 'O%')->get();
                        ?>
                        <?php if($Olisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-O" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">O</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Olisting as $key => $CharO): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharO->slug)); ?>"><?php echo e($CharO->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Plisting = clone $listing; 
                        $Plisting = $Plisting->where('title', 'like', 'P%')->get();
                        ?>
                        <?php if($Plisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-P" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">P</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Plisting as $key => $CharP): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharP->slug)); ?>"><?php echo e($CharP->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Qlisting = clone $listing; 
                        $Qlisting = $Qlisting->where('title', 'like', 'Q%')->get();
                        ?>
                        <?php if($Qlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-Q" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">Q</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Qlisting as $key => $CharQ): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharQ->slug)); ?>"><?php echo e($CharQ->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Rlisting = clone $listing; 
                        $Rlisting = $Rlisting->where('title', 'like', 'R%')->get();
                        ?>
                        <?php if($Rlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-R" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">R</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Rlisting as $key => $CharR): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharR->slug)); ?>"><?php echo e($CharR->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Slisting = clone $listing; 
                        $Slisting = $Slisting->where('title', 'like', 'S%')->get();
                        ?>
                        <?php if($Slisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-S" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">S</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Slisting as $key => $CharS): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharS->slug)); ?>"><?php echo e($CharS->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Tlisting = clone $listing; 
                        $Tlisting = $Tlisting->where('title', 'like', 'T%')->get();
                        ?>
                        <?php if($Tlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-T" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">T</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Tlisting as $key => $CharT): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharT->slug)); ?>"><?php echo e($CharT->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Ulisting = clone $listing; 
                        $Ulisting = $Ulisting->where('title', 'like', 'U%')->get();
                        ?>
                        <?php if($Ulisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-U" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">U</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Ulisting as $key => $CharU): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharU->slug)); ?>"><?php echo e($CharU->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Vlisting = clone $listing; 
                        $Vlisting = $Vlisting->where('title', 'like', 'V%')->get();
                        ?>
                        <?php if($Vlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-V" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">V</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Vlisting as $key => $CharV): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharV->slug)); ?>"><?php echo e($CharV->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Wlisting = clone $listing; 
                        $Wlisting = $Wlisting->where('title', 'like', 'W%')->get();
                        ?>
                        <?php if($Wlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-W" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">W</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Wlisting as $key => $CharW): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharW->slug)); ?>"><?php echo e($CharW->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Xlisting = clone $listing; 
                        $Xlisting = $Xlisting->where('title', 'like', 'X%')->get();
                        ?>
                        <?php if($Xlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-X" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">X</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Xlisting as $key => $CharX): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharX->slug)); ?>"><?php echo e($CharX->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Ylisting = clone $listing; 
                        $Ylisting = $Ylisting->where('title', 'like', 'Y%')->get();
                        ?>
                        <?php if($Ylisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-Y" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">Y</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Ylisting as $key => $CharY): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharY->slug)); ?>"><?php echo e($CharY->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        $Zlisting = clone $listing; 
                        $Zlisting = $Zlisting->where('title', 'like', 'Z%')->get();
                        ?>
                        <?php if($Zlisting->count() > 0): ?>
                        <div class="tab-pane fade show active" id="navs-tab-Z" role="tabpanel">
                            <div class="row align-items-top">
                                <div class="col-md-1">
                                    <p class="alpha_title">Z</p>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        <?php 
                                        foreach ($Zlisting as $key => $CharZ): ?>
                                            <li><a href="<?php echo e(route('front_software_listing',$CharZ->slug)); ?>"><?php echo e($CharZ->title); ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/web/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m6ek6c99z96m/public_html/laravel-dev.softwareworld.co/resources/views/front/web/browse-software.blade.php ENDPATH**/ ?>