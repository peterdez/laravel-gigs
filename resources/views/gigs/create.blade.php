<!-- create.blade.php -->
@extends('layout')
@section('content')
<div class="d-flex align-items-center justify-content-between py-4 border-bottom px-5">
  <div><h1 class="h1 m-0 fw-bold">Gigs</h1></div>
</div>
<h4 class="h4 py-4 px-5">New gig</h4>
<form action="{{route('gigs.store')}}" method="POST" id="add_gig_form" class="gig-form g-3 mb-5">
  @csrf
  <div class="d-md-flex align-items-start px-3">
    <div class="nav flex-column nav-pills nav-pills-inner px-4 py-2 pt-md-2 pb-md-4 mb-2 mx-md-4 w-25 bg-white shadow-lg rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <div class="col-md-12">  
    <ul class="gig-line mb-0">
				<li class="mt-4">
					<button type="button" href="#" id="v-pills-basic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basic" 
          role="tab" aria-controls="v-pills-basic" aria-selected="true" class="nav-link active text-start p-0">Basic Data</button>
					
				</li>

				<li>
					<button type="button" href="#" id="v-pills-remuneration-tab"  data-bs-toggle="pill" data-bs-target="#v-pills-remuneration" 
          role="tab" aria-controls="v-pills-remuneration" aria-selected="false" class="nav-link text-start p-0">Remuneration</button>
					
				</li>
			</ul>
    </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
    </div>
    @endif
    <div class="tab-content w-50  bg-white shadow-lg rounded p-4" id="v-pills-tabContent">
      <input type="hidden" name="user_id" class="form-control" id="" placeholder="user id" value={{$user_id}}>
      <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab" tabindex="0">
       <div class="row g-3">

          <div class="col-md-6">
            <label for="title" class="form-label">Gig Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>

          <div class="col-md-6">
            <label for="description" class="form-label">Short Description</label>
            <input type="text" name="description" id="description" class="form-control">
          </div>

          <div class="col-md-6">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select" name="role_id" id="role_id" aria-label="select role">
              <option selected>Select Role</option>
              @foreach($roles as $role)
              <option value="{{$role->id}}">{{$role->title}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label for="company_id" class="form-label">Company</label>
            <select class="form-select" name="company_id" id="company_id" aria-label="select company">
                      <option selected>Select company</option>
                      @foreach($companies as $company)
                      <option value="{{$company->id}}">{{$company->name}}</option>
                      @endforeach
                    </select>
          </div>

          <label for="location" class="form-label">Location</label>
          <div class="col-md-6 mt-0">
            <select class="form-select" aria-label="country">
              <option selected>Country</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>

          <div class="col-md-6 mt-0">
            <select class="form-select" aria-label="state">
              <option selected>State/Region</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>

          <div class="col-md-12">
          <textarea class="form-control" id="address" rows="2" placeholder="Address"></textarea>
          </div>

          <div class="col-md-12">
          <label for="tags" class="form-label">Add tags</label>
          <input type="text" class="form-control" data-role="tagsinput" placeholder="" aria-label="tags">
          <p class="text-muted mt-2">Suggested tags: 
            <span class="text-decoration-underline">full time</span> 
          <span class="text-decoration-underline">contract</span>  
          <span class="text-decoration-underline">freelance</span>
           </p>
          </div>

          <div class="col-md-12">
          <div class="float-end">
          <a href="{{ route('gigs.index') }}" type="button" class="btn btn-link">Cancel</a>
          <button class="btn btn-primary" id="continue_btn" type="button">Continue</button>
          </div>
          </div>

       </div><!-- row -->

       

      </div><!-- tab pane-->
      <div class="tab-pane fade" id="v-pills-remuneration" role="tabpanel" aria-labelledby="v-pills-remuneration-tab" tabindex="0">
        <label for="salary" class="form-label">Salary</label>
        <div class="row g-3">
          <div class="col-md-6">
          <input type="hidden" name="salary" id="salary" class="form-control">
          @error('salary')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
          <input type="text" name="salary_min" class="form-control" id="salary_min" placeholder="minimum">
          </div>

          <div class="col-md-6">
            <input type="text" name="salary_max" class="form-control" id="salary_max" placeholder="maximum" aria-label="maximum">
          </div>
          <div class="col-md-12">
            <div class="float-end">
            <button class="btn btn-link" id="gig_create_back" type="button">Back</button>
            <button type="submit" class="btn btn-primary">Add Gig</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection