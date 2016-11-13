<?php

	namespace App\Http\Controllers;

	use App\Mailers\AppMailer;
	use App\User;
	use Illuminate\Http\Request;

	class RegistrationController extends Controller
	{

		public function register() {
			return view('auth.register');
		}

		public function postRegister(Request $request, AppMailer $mailer) {

			// validate the request
			$this->validate($request,
				[
					'username' => 'required|min:3|max:50|unique:users',
					'firstname' => 'required|min:3|max:50',
					'middlename' => 'max:20',
					'lastname'  => 'required|min:3|max:50',
					'address1'  => 'required|min:3|max:60',
					'address2'  => 'max:30',
					'city'      => 'required|min:3|max:50',
					'state'     => 'required|min:2|max:2',
					'zip'       => 'required|min:5|max:55',
					'country'   => 'required|min:2|max:50',
					'email'     => 'required|email|unique:users',
					'password'  => 'required|min:6|max:50|confirmed',
					'password_confirmation'=>'required|min:6|max:50'

				]);

			// create the user
			$user = User::create($request->all());

			// email them a confirmation link
			$mailer->sendEmailConfirmationTo($user);

			// flashes message
			flash('Please confirm your email address.');

			// redirect back
			return redirect()->back();
		}

		public function confirmEmail($token) {

			$user = User::whereToken($token)->firstOrFail()->confirmEmail();


			flash('You are now confirmed. Please login.');

			return redirect('login');
		}


	}
