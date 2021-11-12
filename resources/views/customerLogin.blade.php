<div class="container">
    <h3>Register Form</h3>
    <form method="post" action="{{route('customer.login')}}">
    @csrf
        <table class="table table-bordered">
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" class="form-control"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="password" class="form-control"></td>
            </tr>
            <tr>
                <input type="hidden" name="ref" value="front">
                <td><button type="submit" class="btn btn-success btn-sm">Login</button></td>
            </tr>
        </table>
    </form>
</div>