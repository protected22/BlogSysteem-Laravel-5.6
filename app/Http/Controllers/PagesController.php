<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {
	
	public function getIndex() {
		# process variable data or parameters
		# talk to the model
		# receive from the model
		# compile or process data from the model if needed
		# pass that data to the correct view
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages/welcome')->withPosts($posts);
	
	}
	
	public function getAbout() {
		$first = 'Simon';
		$last = 'J';
		
		$fullname = $first . " " . $last;
		$email = 'contact@simondev.tk';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages/about')->withData($data);
	}
	
	public function getContact() {
		return view('pages/contact');
	}
	
	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10'
			]);
		
		$data = array(
		'email' => $request->email,
		'subject' => $request->subject,
		'bodyMessage' => $request->message
		);
		
		Mail::send('emails.contact', $data, function($message) use ($data) {
			$message->from($data['email']);
			$message->to('contact@simondev.tk');
			$message->subject($data['subject']);
		});
		
		Session::flash('success', 'Your Email was Sent!');
		
		return redirect('/');
	}
	
	
	
}