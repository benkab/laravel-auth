<p>Hi {{Auth::user()->firstname}},</p>
<br>
<p>Please activate your account by clicking on this : <a href="{{ URL::to('/verification/token/' . Auth::user()->token) }}" target="_blank">Activate the account</a></p>
<br>
<p>AUTH Team</p>