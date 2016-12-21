<p>Hi {{Auth::user()->firstname}}</p>
<br>
<p>Please activate your account by clicking on this : <a href="/verification/token/{{Auth::user()->token}}">link</a></p>
<br>
<p>AUTH Team</p>