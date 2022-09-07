<!-- index.blade.php -->

@extends('layout')

@section('content')
      <div class="d-flex align-items-center justify-content-between py-4 border-bottom px-5">
        <div><h1 class="h1 m-0 fw-bold">Gigs</h1></div>
        <div><a href="{{route('gigs.create')}}" class="btn btn-primary">Create Gig <i class="fa fa-plus"></i></a></div>
      </div>
      <nav class="nav nav-pills nav-pills-index nav-justified px-5">
        <a class="nav-link active rounded-0 text-start ps-0" aria-current="page" href="#">All Gigs <span class="badge bg-secondary">{{$gig_count}}</span></a>
        <a class="nav-link rounded-0" href="#">My Gigs <span class="badge bg-secondary-b">32</span></a>
        <a class="nav-link rounded-0" href="#">Rejected Gigs <span class="badge bg-secondary-b">25</span></a>
      </nav>

    <div class="pb-3 pt-4 below-pills px-5">
        <div class="row row-cols-3 row-cols-lg-6 g-3 no-wrap">
            <div class="col">
                <a class="btn btn-primary w-100" href="#" role="button">Freelance</a>
            </div>
            <div class="col">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Keywords
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>
            </div>
            
            <div class="col">
                <a class="btn btn-primary w-100" href="#" role="button">Location</a>
            </div>
            <div class="col">
                <a class="btn btn-primary w-100" href="#" role="button">Remote friendly</a>
            </div>
            <div class="col">
                    <a class="btn btn-primary active w-100" href="#" role="button">Design <i class="fa fa-check"></i></a>
            </div>
            <div class="col">
                <a class="btn btn-primary w-100" href="#" role="button">Contract</a>
            </div>
        </div>
    </div>
    
      <div class="table-responsive px-5">
      @if(session()->get('success'))
        <div class="alert alert-success mb-0">
          {{ session()->get('success') }}  
        </div>
      @endif
        <table class="table align-middle">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Title</th>
              <th scope="col">Role</th>
              <th scope="col">Company</th>
              <th scope="col">Date</th>
              <th scope="col">Salary</th>
              <th colspan="2"></th>
            </tr>
          </thead>
          <tbody>
        @foreach($gigs as $gig)
        <tr class="bg-white rounded mb-2">
            <td>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="">
            </div>
            </td>
            <td>
              {{ $gig->title }}
            </td>
            <td>
            @isset ($gig->role->title) 
                    {{ $gig->role->title }}
                    @endisset
            </td>
            <td>
            @isset ($gig->company->name) 
                    {{ $gig->company->name }}
                    @endisset
            </td>
            <td>{{$gig->created_at_formatted}}</td>
            <td>{{$gig->salary}}</td>
            <td>
              <div class="d-grid gap-2 d-md-block">
              <a href="{{ route('gigs.edit', $gig->id)}}" type="button" class="btn btn-primary">Edit</a>
              <form action="{{ route('gigs.destroy', $gig->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-secondary-b" type="submit">Delete</button>
                </form>
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
        </table>
        {!! $gigs->links() !!}
      </div>
  @endsection