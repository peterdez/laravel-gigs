<!-- index.blade.php -->

@extends('layout')

@section('content')
      <h1 class="h2 p-4 border-bottom">Gigs</h1>
      <a href="{{route('gigs.create')}}" class="btn btn-primary">Create Gig</a>
      <nav class="nav nav-pills nav-pills-index nav-justified">
        <a class="nav-link active rounded-0 text-start" aria-current="page" href="#">All Gigs <span class="badge bg-secondary">425</span></a>
        <a class="nav-link rounded-0" href="#">My Gigs <span class="badge bg-secondary">32</span></a>
        <a class="nav-link rounded-0" href="#">Rejected Gigs <span class="badge bg-secondary">25</span></a>
      </nav>

    <div class="p-2 below-pills">
        <div class="row row-cols-3 row-cols-lg-6 g-3 no-wrap">
            <div class="col">
                <a class="btn btn-primary w-100" href="#" role="button">Freelance</a>
            </div>
            <div class="col">
                <!--a class="btn btn-primary w-100" href="#" role="button">Keywords</a-->
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
                    <a class="btn btn-primary active w-100" href="#" role="button">Design</a>
            </div>
            <div class="col">
                <a class="btn btn-primary w-100" href="#" role="button">Contract</a>
            </div>
        </div>
    </div>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach($gigs as $gig)
        <tr>
            <td>{{$gig->id}}</td>
            <td>{{$gig->title}}</td>
            <td>{{$gig->salary}}</td>
            <td><a href="{{ route('gigs.edit', $gig->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('gigs.destroy', $gig->id)}}" method="post">
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
  @endsection