<!DOCTYPE html>
<html lang="en">

<body>
    <nav>
        <h3>Logo</h3>
        <div class="nav-items">
            <span><a href="{{route('home')}}">Home</a></span>
            <span><a href="{{route('contacts.create')}}">Create Contact</a></span>
        </div>
       
        <div class="user_details">
            {{Auth::user()->name}}
        </div>
   </nav>
</body>
</html>