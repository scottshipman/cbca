<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendRegistrationEmail;
use App\Mail\RegistrationMail;
use App\Models\Membership;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $membership = Membership::where('active', '=', 1)->orderBy('id', 'DESC')->first();

        return view('auth.register', compact('membership'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->tx)
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'run_for_office' => $request->run_for_office,
                'volunteer' => $request->volunteer,
            ]);

            $membership = Membership::where('active', '=', 1)->orderBy('id', 'DESC')
                ->first();
            if($membership)
            {
                DB::table('membership_user')->insert([
                    'user_id' => $user->id,
                    'membership_id' => $membership->id,
                    'order_id'=>$request->tx,
                    'created_at' => now()->format('Y-m-d'),
                    'updated_at' => now()->format('Y-m-d')
                ]);
            }

            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => 1
            ]);

            $transaction =
                [
                    'name'=> 'CBCA ' . $membership->name,
                    'price' => $membership->price,
                    'dates' => 'from '. $membership->start_date. ' to ' .
                        $membership->end_date,
                    'orderID' => $request->tx,
                ],

            dispatch(new SendRegistrationEmail($user, $transaction));

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }

        return redirect('/register')->withErrors(['msg' => 'Something went 
        wrong saving your membership info. Please email 
        info@crystalbeachcommunity.org to get help.']);;
    }
}
