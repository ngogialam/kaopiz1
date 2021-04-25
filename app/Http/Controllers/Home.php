<?php

namespace App\Http\Controllers;

// use App\Mail\SendMail as MailSendMail;

use App\Mail\SendMailRegister;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Test;
use Illuminate\Support\Facades\Mail;

// use IlluminateSupport\Mail\SendMail;
use App\Users\Users as UsersUsers;
use PhpParser\Node\Expr\New_;

//  use App\Support\Controllers\Home;

class Home extends Controller
{
    public function show()
    {
        return view('auth.add');
    }
    
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $name = $request->input("name");
            $email = $request->input("email");
            $phone = $request->input("phone");
            $password = $request->input("password");
            $test = new Test();
            $test->name=$name;
            $test->email = $email;
            $test->phone = $phone;
            $test->password = $password;
            $test->save();
        }
        $data = array(
            'name'   => '$request ->name',
            'message' => '$request ->message',
            $name = $request->input("name"),
        );

        
        Mail ::to('lamngo24121998@gmail.com')->send(new SendMailRegister($data));
        $test = DB::table('test')->get();

        return view('auth.menu', compact('test'));
          // return redirect()->route('MyRoute'); 
        // return "them thanh cong";
     
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $test = DB::table('test')->where('name', 'LIKE', '%' . $request->search . '%')->get();
            if ($test) {
                foreach ($test as $key => $test) {
                    $output .= '<tr>
                    <td>' . $test->id . '</td>
                    <td>' . $test->name . '</td>
                    <td>' . $test->email . '</td>
                    <td>' . $test->phone . '</td>
                    <td>' . $test->password . '</td>
                    <td>' . $test->created_at . '</td>
                    </tr>';
                }
            }
            
            return Response($output);
        }
    }

    public function sendemailDemo(Request $request){
        // $this->validate($request,[
        //     'name'  => 'requied',
        //     'email'  => 'requied|email',
        //     'phone'  => 'requied',
        //     'message' => 'requied',
        // ]);
        $data = array(
            'name'   => '$request ->name',
            'message' => '$request ->message',
        );
        Mail ::to('lamngo24121998@gmail.com')->send(new SendMailRegister($data));
        // die('3333333333333333333333');
        return view('auth.add');
    }
        
     public function database(Request $request){
         
         $data = DB::table('test')->get();
        //  var_dump(($data));
        
        foreach($data as $row)
        {
            foreach($row as $key =>$value)
            {
                echo $key.":".$value ."<br>";
            }
            echo "<hr>";
        }
        return view('auth.menu');
     }   
    
}
