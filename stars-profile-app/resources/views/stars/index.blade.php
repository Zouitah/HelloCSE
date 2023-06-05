@extends('layout')
<style>
@media (min-width: 800px) {
  .star-details {
    position: absolute;
    width: 60vw;
    top: 10vh;
    left: 35vw;
    display: none;
  }
}

@media (max-width: 800px) {
  .fullname {
    display: none;
  }
}
</style>
@section('content')
<div class="container">
  <div class="row mb-3">
    @auth  
      <div class="col-md-3">
          <a class="btn btn-outline-secondary btn-block" href="{{route('star.create')}}" role="button">Ajouter une nouvelle Star</a>
      </div>
    @endauth
  </div>
  @php $i = 0 @endphp
  @foreach ($stars as $star)
    <div class="row">
      <div class="col-md-3">
        <div class="alert alert-secondary" role="alert" onclick="showStarDetails(<?php echo $i;?>)">
          {{$star->firstname}}
        </div>
      </div>
      <div class="col-md-9">
        <div id="star-{{$i}}-details"  class="row star-details" style="display: none;">
          <div class="col-md-12">
            <div class="row justify-content-between">
              <div class="col-md-6 fullname">
                <h1 id="star-fullname">{{$star->firstname." ".$star->lastname}}</h1>
              </div>
              @auth
                <div class="col-md-6">
                  <div class="d-inline-block float-end">
                    <form action="{{ route('star.edit',$star->id) }}" method="GET">
                      @csrf
                      <button type="submit" class="btn btn-light">Edit</button>
                    </form>
                  </div>
                  <div class="d-inline-block float-end">
                    <form action="{{ route('star.destroy',$star->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              @endauth
            </div>
            <div class="row">
              <div class="image-wrapper">
                <img src="{{ asset('/storage/images/'.$star->image.'') }}" class="float-start me-3" id="star-image" alt="Star Image" width="200px">
              <p id="star-description">{{$star->description}}</p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @php $i++ @endphp
  @endforeach
  </div>

  <script>
    var stars = <?php echo $json_stars; ?>;
    console.log(stars)

    function showStarDetails(index) {
      var star = stars[index];
      document.getElementById("star-fullname").textContent = star.firstname + star.lastname;
      document.getElementById("star-description").textContent = star.description;
      var element = document.querySelector("[style*='display: block']");
      if(element && element.id != "star-"+index+"-details") element.style.display="none"
      document.getElementById("star-"+index+"-details").style.display = "block";

    }
  </script>
@endsection