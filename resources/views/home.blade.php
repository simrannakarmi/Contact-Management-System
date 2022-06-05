@extends('layout.app')
@section('title','Home')
@section('contents')
<section class="vh-100 gradient-custom">


@if(Auth::user()->isAdmin())
<br/><br/><center><h2 class="welcome">Welcome Admin</h2></center><br/><br/>

 <div class="row justify-content-center">
  <div class="col">
         <div class="card">
             <center><h1 class="card-header">Contacts</h1></center>
         <div class="card-body">

             <table class="table">
                 <thead>
                         <tr>
                             <td>ID</td>
                             <td>First Name</td>
                             <td>Last Name</td>
                             <td>Email</td>
                             <td>Phone No.</td>
                             <td>Address</td>
                             <td colspan = 2 >Actions</td>
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
</div>

@elseif(Auth::user()->isUser())

<br/><br/> <center><h2 class="welcome">Welcome {{ Auth::user()-> name }}</h2></center>
   <br/><br/>
    {{ $hasRecord = false }}
   @foreach ($contact as $contact)

        <div class="row justify-content-center">
            <div class="col">

            @if(Auth::user()->id == $contact->user_id)

               <div class="card">
                   <h1 class="card-header">Your Contact Info:</h1>
                <div class="card-body">

                   <table class="table">
                       <thead>
                               <tr>
                                   <td>ID</td>
                                   <td>First Name</td>
                                   <td>Last Name</td>
                                   <td>Email</td>
                                   <td>Phone No.</td>
                                   <td>Address</td>
                                   <td>Action</td>
                               </tr>
                       </thead>
                       <tbody>

                               <tr>
                                       <td>{{$contact->id}}</td>
                                       <td>{{$contact->first_name}}</td>
                                       <td>{{$contact->last_name}}</td>
                                       <td>{{$contact->email}}</td>
                                       <td>{{$contact->phone}}</td>
                                       <td>{{$contact->address}}</td>
                                       <td>
                                            <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                                       </td>
                               </tr>

                       </tbody>
                   </table>
               </div>
             </div>
             <?php $hasRecord = true ?>
             @break
            @endif

            </div>
        </div>

   @endforeach

    @if(!$hasRecord)
        <center><p>You haven't created a contact yet!</p>
        <div>
            <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>
        </div></center>

    @endif

@endif
</section>
@endsection
