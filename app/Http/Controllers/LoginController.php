<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LoginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callBackFacebook()
    {
       $user = Socialite::driver('facebook')->user();

      //  Find or create a user in your database using the $user information

        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {    
            Auth::login($existingUser);
           
        } else {
          
            $data['fullname'] =$user->getName();
            $data['email'] = $user->getEmail();
            $data['password'] = bcrypt(str_random(16));
            $data['created_at'] = new \DateTime();
            $data['uuid'] = Str::uuid();
            $data['avatar'] = $user->getAvatar();
            $data['status_user'] =1;
    
              DB::table('users')->insert($data);
              Auth::login($data);
        }
        return redirect()->route('website.index')->with('success', 'Login with Facebook successfully.');
  
    }
    public function logoutFacebook(){
        Auth::logout();
        $redirectUrl = 'https://www.facebook.com/logout.php?next=' . urlencode(config('app.url')) . '&access_token=' . session('facebook_token');
        return redirect($redirectUrl)->with('success', 'Logged out successfully.');
    }


    public function getLogin(){

        if(!Auth::check()){
            return view('login.login');
        }

        return redirect()->route('admin.categories.index');
    }
    
    public function postLogin(LoginRequest $request){

        $login = [
            'email' => $request->email,
            'password' =>$request->password,      
        ];
        //check status 
    //     $email =$request->email;
    //     $check_login =DB:: table('users')->where('email', $email )->get();

    //    $status_user =  $check_login->pluck('status_user')->toArray();

    //     if($status_user != 1){
    //         return back()->with([
    //              'error' => 'Tài khoản của bạn đã bị khóa,vì những hành vi không đúng',
    //              ]);
    //     }else{
    //         echo 'tiếp tục';
    //     }

        if (Auth::attempt($login)) {
            if(Auth::user()->email_verified_at !=null){
                if(Auth::user()->level == 1 && 2){
                    $request->session()->regenerate();

                    return redirect()->route('admin.categories.index');
                }

                return redirect()->route('website.index');
            }                              
            else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->with([
                    'error' => 'Please confirm your email',
                ]);
            }
                    
        }

        return back()->with([
            'error' => 'Email or password wrong, Please enter again',
        ]);
               
    }

    public function getForgot(){
     
        return view('login.forgot');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);

        // echo $token_random =Str::random();
        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
              'email'=>$request->email,
              'token'=>$token,
              'created_at'=>Carbon::now(),
            
        ]);
        
        $action_link = route('showResetFrom',['token'=>$token,'email'=>$request->email]);
        $body = "Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản  <b> Store Phone.online </b> được liên kết với " .$request->email.". Bạn có thể đặt lại mật khẩu của mình bằng cách nhấp vào liên kết bên dưới";

       \Mail::send('emails.forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
             $message->from('noreply@example.com','Storephone.online');
             $message->to($request->email,'Your name')
                     ->subject('Reset Password');
       });

      
       return back()->with('success', 'We have e-mailed your password reset link!');
    }
    public function showResetFrom(Request $request, $token = null){
        return view('login.resetPassword')->with(['token'=>$token,'email'=>$request->email]);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('error', 'Invalid token');
        }else{

            User::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('getLogin')->with('success', 'Mật khẩu đã được đổi bạn có thể đăng nhập với mật khẩu mới')->with('verifiedEmail', $request->email);
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        $redirectUrl = 'https://www.facebook.com/logout.php?next=' . urlencode(config('app.url')) . '&access_token=' . session('facebook_token');
        
        return redirect()->route('getLogin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
         return view ('login.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = $request->except('_token', 'password_confirmation', 'avatar');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime();
        
        $data['uuid'] = Str::uuid();
        
        $data['avatar'] = '';
        $data['status_user'] =1;

             $result = DB::table('users')->insert($data);
        if($result){
            Mail::to($request->email)->send(new NotifyMail($data));
            return view('login/send-mail');
        }

    }
     public function verify($uuid)
        {
            $data =DB::table('users')->where('uuid', $uuid)->first();

            if($data->email_verified_at == null){
                DB::table('users')->where('uuid', $uuid)->update(['email_verified_at' => new \DateTime()]);
        
                return view('login.login');
        }else {
            return redirect()->route('website.index');
        }
    }
 



}
