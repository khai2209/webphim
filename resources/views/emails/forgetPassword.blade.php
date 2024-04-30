<h1>Forget Password Email</h1>
   
<a href="{{ route('reset.submit', ['user'=>$user->id, 'token'=>$user->remember_token]) }}">Nhấn vào đây để đặt lại mật khẩu mới cho tài khoản</a>