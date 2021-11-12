
    <?php $__env->startSection('content'); ?>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo e(asset('img/slider-imgs/banner.jpg')); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('img/slider-imgs/banner1.jpg')); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('img/slider-imgs/banner2.jpg')); ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <h1 class="text-center text-success border-bottom">Services</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo e(asset('img/services-imgs/food.jpg')); ?>" alt="" class="img-thumbnail">
                </div>
                <div class="col-md-8">
                    <h3>Service heading</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde laborum saepe aliquam iste aperiam aspernatur? Beatae dignissimos eius ipsa deleniti voluptatem, harum suscipit dolor voluptatum aut cupiditate deserunt sunt fugit?</p>
                    <p>
                        <a href="#" class="btn btn-primary btn-sm">Read More</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="text-center text-success border-bottom">Gallery</h1>
            <div class="row my-3">
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-3">
                        <div class="card">
                            <h6 class="card-header"><?php echo e($roomType['title']); ?></h6>
                            <div class="card-body">
                                    <?php $__empty_2 = true; $__currentLoopData = $roomType['roomtypeimgs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$roomTypeImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <a href="<?php echo e(asset('storage/room_types/'.$roomTypeImg['img_src'])); ?>" data-lightbox="rgallery<?php echo e($roomTypeImg['room_type_id']); ?>">
                                        <!-- <?php if($index == 0): ?>
                                            <img class="img-fluid" src="<?php echo e(asset('storage/room_types/'.$roomTypeImg['img_src'])); ?>" alt="">
                                        <?php else: ?>
                                        <img class="img-fluid hide" src="<?php echo e(asset('storage/room_types/'.$roomTypeImg['img_src'])); ?>" alt="">
                                        <?php endif; ?> -->

                                        <?php if($loop->first): ?>
                                            <img class="img-fluid" src="<?php echo e(asset('storage/room_types/'.$roomTypeImg['img_src'])); ?>" alt="">
                                        <?php endif; ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        No Image Found
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    Content Not availble
                <?php endif; ?>
            </div>
        </div>
        <style>
            .hide{
                display: none;
            }
        </style>
        <link href="<?php echo e(asset('vendor/lightbox/src/css/lightbox.css')); ?>" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo e(asset('vendor/lightbox/src/js/lightbox.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\booknow\resources\views/home.blade.php ENDPATH**/ ?>