@extends('layout.app')
@section('title','Home')
@section('contents')
<section class="vh-100 gradient-custom">

    <div class="container">
       <center><h1>Home</h1></center>
       <p>Your Contact Info:</p>
       <div class="row justify-content-center">
        <div class="col">
               <div class="card">
                   <h1 class="card-header">Contacts</h1>
               <div class="card-body">



                   <div>
                       <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>
                   </div>

                   <table class="table">
                       <thead>
                               <tr>
                                   <td>ID</td>
                                   <td>First Name</td>
                                   <td>Last Name</td>
                                   <td>Email</td>
                                   <td>Phone No.</td>
                                   <td>Address</td>
                                   <td>Username</td>
                                   <td colspan = 2>Actions</td>
                               </tr>
                       </thead>
                       <tbody>
                               @foreach($contact as $contact)
                               <tr>
                                       <td>{{$contact->id}}</td>
                                       <td>{{$contact->first_name}}</td>
                                       <td>{{$contact->last_name}}</td>
                                       <td>{{$contact->email}}</td>
                                       <td>{{$contact->phone}}</td>
                                       <td>{{$contact->address}}</td>
                                       <td>{{$contact->user_id}}</td>
                                       <td>
                                               <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                                       </td>
                                       <td>
                                               <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button class="btn btn-danger" type="submit">Delete</button>
                                               </form>
                                       </td>
                               </tr>
                               @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
           </div>
       </div>

       <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
      </form>
   </div>
</section>
@endsection
