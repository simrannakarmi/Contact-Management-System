@extends('layout.app')
@section('title','Edit Contact')
@section('contents')

<div class="container">
	<div class="row justify-content-center">
	 <div class="col-md-8">
			<div class="card">
				<h1 class="card-header">Update Contact</h1>
			<div class="card-body">
				<center>	<form method="post" action="{{ route('contacts.update', $contact->id) }}" class="form">
							@method('PATCH')
							@csrf

                            <div class="form-item">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" value="{{ $contact->first_name }}">
                                    @error('first_name')
                                        <div class="form-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-item">
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name" value="{{ $contact->last_name }}">
                                    @error('last_name')
                                        <div class="form-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>

							<div class="form-item">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ $contact->email }}">
                                @error('email')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label for="phone">Phone No.:</label>
                                <input type="text" name="phone" value="{{ $contact->phone }}">
                                @error('phone')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label for="address">Address:</label>
                                <input type="text" name="address" value="{{ $contact->address }}">
                                @error('address')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-item-submit">
                                <input type="submit" value="Update" name="submit">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>

					</form>
                </center>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection
