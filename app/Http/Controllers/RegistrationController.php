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
					'name'     => 'required',
					'email'    => 'required|email|unique:users',
					'password' => 'required'
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
