<!DOCTYPE html>
<html lang="en">

<body>
    <nav class="nav-all">
        <h3>Logo</h3>
        <div class="nav-items">
            <span><a href="{{route('home')}}">Home</a></span>

        </div>


        <div class="user_details">
            <span>{{Auth::user()->name}}</Span>

            <span><a href="{{ route('logout') }}">Log Out</a></span>
        </div>
   </nav>
</body>
</html>
