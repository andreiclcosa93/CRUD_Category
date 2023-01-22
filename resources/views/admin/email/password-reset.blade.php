<style>
    p, h1 {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>


<div style="max-width: 600px; margin: 30 auto; padding: 30px;">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 style="margin-left: 0;">Hello!</h1>
            <hr>
            <h1>You are receiving this email because we received a password reset request for your account.</h1></br>
            <p style="color: red;">This password reset link will expire in 60 minutes.</p></br></br>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('password.reset', ['token'=>$token, 'email'=>$email]) }}" style="border: 1px solid dark; text-decoration:none; padding: 8px 10px; display:block; text-align:center; min-width: 150px;
                color:#fff; background-color: #b71661;">Link</a>
        </div>
    </br></br>
        <div>
            <p>
                If you did not request a password reset, no further action is required.
            </p>
        </br></br>
            <pre>
                Regards,
                Andrei.
            </pre>
        </div>
    </div>
</div>







