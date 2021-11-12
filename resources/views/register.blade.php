@extends('frontlayout')
    @section('content')
        <div class="container">
            <h3>Register Form</h3>
            <form method="post" action="{{url('admin/customer')}}">
            @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td><input type="text" name="full_name" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="text" name="email" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="text" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td><input type="text" name="mobile" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input type="text" name="address" class="form-control"></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="ref" value="front">
                        <td><button type="submit" class="btn btn-success btn-sm">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
    @endsection