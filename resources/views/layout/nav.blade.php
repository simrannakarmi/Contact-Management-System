<!DOCTYPE html>
<html lang="en">

<body>
    <nav class="nav-all">

        <div class="nav-items">
            <span class="logo"><a href="{{route('home')}}"><img src="{{URL::asset('CMS.png')}}" alt="logo">Home</a></span>

        </div>


        <div class="user_details">
            <span>{{Auth::user()->name}}</span>

            <span><a href="{{ route('logout') }}">Log Out</a></span>
        </div>
   </nav>

</body>
</html>
