
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Booking
                    <a href="<?php echo e(url('admin/booking')); ?>" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>

                <?php if(Session::has('success')): ?>
                    <p class="text-success" style="margin-left:300px;" ><?php echo e(session('success')); ?></p>
                <?php endif; ?>

                <div class="container" style="padding-top:5px">
                    <form method="post" action="<?php echo e(url('admin/booking')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <select name="customer_id" class="form-control">
                            <option value="">--- Select Customer ---</option>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($item['id']); ?>"><?php echo e($item['full_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                No Customer Found
                            <?php endif; ?>
                        </select>
                        <br/>
                        <label for="checkin_date">Check In Date</label>
                        <input name="checkin_date" type="date" class="form-control checkin_date" />
                        <br/>
                        <label for="checkout_date">Check Out Date</label>
                        <input name="checkout_date" type="date" class="form-control checkout_date" />
                        <br/>
                        <label for="available_room">Available Room</label>
                        <select name="room_id" class="form-control room_availble">
                            <option value="">select one </option>
                        </select>
                        <br/>
                        <input name="total_adults" class="form-control" placeholder="Total Adults">
                        <br/>
                        <input name="total_child" class="form-control" placeholder="Total Child">
                        <br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        </div>
    </div>

    <?php $__env->startSection('scripts'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".checkout_date").on('blur',function(){
                    let _checkout_date = $(this).val();
                    let _checkin_date  = $(".checkin_date").val();
                    $.ajax({
                        url:"<?php echo e(url('admin/booking/availble_rooms')); ?>/"+_checkin_date+"/"+_checkout_date,
                        dataType:'json',
                        beforeSend:function(){
                            $(".room_availble").html(`<option>--Loading---</option>`);
                        },
                        success:function(resp){
                            let _html = '';
                            $.each(resp.data,function(index,val){
                                _html += `<option value=${val.rooms.id}>${val.rooms.title} - ${val.roomtype.title}</option>`;
                            });
                            $(".room_availble").html(_html);
                        }
                    });
                })
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\booknow\resources\views/booking/create.blade.php ENDPATH**/ ?>