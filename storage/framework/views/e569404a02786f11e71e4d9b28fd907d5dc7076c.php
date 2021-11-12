
    <?php $__env->startSection('content'); ?>
        <div class="container">
            <h3>Booking Form</h3>
            <div class="container" style="padding-top:5px">
                <form method="post" action="<?php echo e(url('admin/booking')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="customer_id" value="1">
                    <!-- <input type="hidden" name="ref" value="front"> -->
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
                    <span id="price"></span>
                    <hr>
                    <br>
                    <input name="total_adults" class="form-control" placeholder="Total Adults">
                    <br/>
                    <input name="total_child" class="form-control" placeholder="Total Child">
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

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
                            console.log(resp);
                            let _html = '';
                            $.each(resp.data,function(index,val){
                                console.log(val);
                                _html += `<option value=${val.rooms.id}>${val.rooms.title} - ${val.roomtype.title}</option>`;
                            });
                            $(".room_availble").html(_html);
                        }
                    });
                });

                $(".room_availble").on('blur',function(){
                    let _roomId = $(this).val();
                    $.ajax({
                        url:`<?php echo e(url('admin/booking/room_price/${_roomId}')); ?>`,
                        dataType:"json",
                        success:function(resp){
                            // console.log(resp.rp[0].price);
                            $("#price").html(`Price Rs: ${resp.rp[0].price} Per Night`);
                        }
                    });
                })
            });
        </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\booknow\resources\views/front-booking.blade.php ENDPATH**/ ?>