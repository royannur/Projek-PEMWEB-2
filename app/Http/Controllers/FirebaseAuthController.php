<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\EmailExists;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;


use Exception;

use function PHPUnit\Framework\returnSelf;

class FirebaseAuthController extends Controller
{
    protected $auth;
    protected $database;
    public function __construct()
    {
        $path = base_path('storage/firebase/serviceAccountKey.json');

        if(!file_exists($path)){
            die("This file path .{$path}. is not Exists");
        }
        $factory = (new Factory)->withServiceAccount($path);

         $this->auth = $factory->createAuth();
        $this->database = $factory
        ->withDatabaseUri('https://project-pemweb2-default-rtdb.firebaseio.com/') // Ganti sesuai URL database kamu
        ->createDatabase();
    }
    public  function registerform(){
        return view('auth.form');
    }
   public function register(Request $request){
    $validator = FacadesValidator::make($request->all(),[
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required|max:255'
    ]);

    if($validator->fails())
    {
        return redirect()->back()->withErrors($validator)->withInput()->with('error','Please Required Fill all');
    } else {
        try{
            $name = $request->input("name");
            $email = $request->input("email");
            $password = $request->input("password");

            $userProperties = [
                'displayName' => $name,
                'email' => $email,
                'password' => $password,
            ];

            $createdUser = $this->auth->createUser($userProperties);

            // Simpan ke Realtime Database
            $this->database
                ->getReference('users/'.$createdUser->uid)
                ->set([
                    'id_user' => $createdUser->uid,
                    'nama' => $name,
                    'password' => $password // encrypt/hide this in production!
                ]);

            return redirect()->back()->with('success', 'User Register Succesfully');
        } catch(EmailExists $e){
            return redirect()->back()->with('error', 'this Email is already Exists');
        } catch(Exception $e){
            return redirect()->back()->with('error', 'This User is not Please Try Again');
        }
    } 
}

    public function loginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|max:100',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error','Please Required Fill All Fields');
        }else{
            try{
                $email = $request->input('email');
                $password = $request->input('password');

                $user = $this->auth->signInWithEmailAndPassword($email, $password);

                if($user){
                    return view("auth.dashboard")->with('success', 'User Login Successfully');
                }else{
                    return redirect()->back()->with('error','User Not Login Please Try Again');
                }
            }catch(InvalidPassword $e){
                return redirect()->back()->with('error','Invalid Password');
            }catch(UserNotFound $e){
                return redirect()->back()->with('error', 'User Not Found');
            }catch(Exception $e){
                return redirect()->back()->with('error','User Login Please Try Again');
            }
        }
    }
    public function dashboard(){
        return view('auth.dashboard');

    }
}
