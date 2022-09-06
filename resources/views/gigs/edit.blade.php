<!-- create.blade.php -->

@extends('layout')

@section('content')
<h1 class="h2 p-4 border-bottom">Gigs</h1>
      <h4 class="p-4">New gig</h4>
      
      <div class="d-md-flex align-items-start px-3">
        <div class="nav flex-column nav-pills nav-pills-inner me-5 mb-2 px-5 w-25 bg-white shadow rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active text-start" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
          <button class="nav-link text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
          
        </div>
        <div class="tab-content w-50  bg-white shadow rounded p-4 border" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
          </div>
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
            <form action="{{route('gigs.update', $gig->id)}}" method="POST" class="row g-3">
                    @csrf
                @method('PUT')
                <div class="col-md-6">
                <input type="text" name="user_id" class="form-control" id="exampleForrolInput1" value="{{$user_id}}">
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title" value="{{$gig->title}}">
                <input type="text" name="salary" class="form-control" id="exampleFormControlIn" placeholder="salary" value="{{$gig->salary}}">
                <textarea name="description" class="form-control" id="exampleFormControlTe" rows="3">{{$gig->description}}</textarea>
                <select class="form-select" name="company_id" aria-label="Default select example">
                @foreach($companies as $company)
        
                <option value="{{$company->id}}" {{ ($gig->company_id == $company->id) ? 'selected' : ''; }}>{{$company->name}}</option>
                @endforeach
              </select>
              <select class="form-select" name="role_id" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="{{$gig->role_id}}" selected>{{$gig->role_id}}</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
              </form>
          </div>
          
        </div>
      </div>
      @endsection