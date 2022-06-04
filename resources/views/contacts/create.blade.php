@extends('layout.app')
@section('title','Create Contact')
@section('contents')

<section class="vh-100 gradient-custom">
    <div class="container-fluid">
        <center><h1>Create Contact</h1>

        <form action="{{ route('contacts.store') }}" method="post" class="form bg-white p-6 border-1">
            @csrf
            <div class="form-item">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label for="phone">Phone No.:</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label for="address">Address:</label>
                <input type="text" name="address" value="{{ old('address') }}">
                @error('address')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-item-submit">
                <input type="submit" value="Submit" name="submit">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
        </form>
        </center>
    </div>

</section>
@endsection
