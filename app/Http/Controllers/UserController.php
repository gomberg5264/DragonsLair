<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
        /* $user = new User();
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->save(); */
        $this->validate($request,
        [
            'email' => 'required|email|unique:users|max:250',
            'username' => 'required|unique:users|max:80',
            'password' => 'required|max:250|min:8'
        ]);
        $data = ['email' => $request['email'], 'username' => $request['username'], 'password' => bcrypt($request['password'])];
        $user = new User($data);
        if($user->save())
        {
            Auth::login($user);
            return redirect()->route('registrationSuccess');
        }
        else
        {
            return redirect()->route('welcome');
        }
    }
    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|max:250',
                'password' => 'required|max:250'
            ]
        );
        return Auth::attempt(['email' => $request['email'], 'password' => $request['password']])?(redirect()->route('loginSuccess')):(redirect()->route('incorrectCredentials'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('logoutSuccess');
    }
    public function dashboard()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();     //Extracts the data of the currently logged in user.
        $posts = DB::table('posts')->orderBy('created_at', 'DESC')->paginate(3);
        return view('home.dashboard', ['user' => $user, 'posts' => $posts]);
    }
    public function index()
    {
        return view('users.index', ['users' => DB::table('users')->orderBy('username')->paginate(5)]);
        //Returns the 'users.index' view, passing in a paginated collection of users to the view.
    }
    public function getID($username = '')
    {
        return ($username == '')?(Auth::user()->id):(DB::table('users')->where('username', $username)->value('id'));
        //Returns the userID corresponding to the supplied username, else returns the userID of the user making the request.
    }
    public function displayPosts($userID)
    {
        return DB::table('posts')->where('user_id', $userID)->orderBy('created_at', 'DESC')->paginate(4);
        //Returns all posts belonging to the user corresponding to $userID.
    }
    public function page($username = '')
    {
        return ($username == '')?
        (view('users.page',
        [
            'posts' => $this->displayPosts(Auth::user()->id),
            'username' => DB::table('users')->where('id', Auth::user()->id)->value('userName')
        ])):
        (view('users.page',
        [
            'posts' => $this->displayPosts($this->getID($username)),
            'username' => $username
        ]));
        //Returns all posts belonging to the user corresponding to $username.
    }
    public function search($string)     //Returns all usernames prefixed by $string.
    {

    }
}
