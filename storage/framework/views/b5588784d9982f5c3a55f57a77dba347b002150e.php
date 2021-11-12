
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customers
                    <a href="<?php echo e(url('admin/customer/create')); ?>" class="btn btn-success btn-sm float-right" >Add New</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php if(Session::has('success')): ?>
                        <p class="text-success"><?php echo e(session('success')); ?></p>
                    <?php endif; ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Room/Type</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Adults</th>
                                <th>Childs</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            use Carbon\Carbon;
                        ?>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item['bookingInfo']['id']); ?></td>
                                    <td><?php echo e($item['bookingInfo']['customer']['full_name']); ?></td>
                                    <td><?php echo e($item['bookingInfo']['room']['title']); ?> / <?php echo e($item['roomType'][0]['title']); ?></td>
                                    <td><?php echo e(Carbon::parse($item['bookingInfo']['checkin_date'])->format('d-m-y')); ?></td>
                                    <td><?php echo e($item['bookingInfo']['checkout_date']); ?></td>
                                    <td><?php echo e($item['bookingInfo']['total_adults']); ?></td>
                                    <td><?php echo e($item['bookingInfo']['total_child']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                No Data Found
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\booknow\resources\views/booking/index.blade.php ENDPATH**/ ?>