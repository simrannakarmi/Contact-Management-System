<!DOCTYPE html>
<html lang="en">

<body>
    <nav class="nav-all">

        <div class="nav-items">
            <span><a href="{{route('home')}}">Home</a></span>

        </div>


        <div class="user_details">
            <span>{{Auth::user()->name}}</span>

            <span><a href="{{ route('logout') }}">Log Out</a></span>
        </div>
   </nav>
   <script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
    </script>
</body>
</html>
