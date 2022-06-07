@include('master.app')

<body>
    <div class="page-section">
        <div class="container">
          <h1 class="text-center wow fadeInUp">To-do List</h1>
            {{-- input-here --}}
          <form action="{{route('update', ['data' => $data])}}" method="POST" class="main-form">
            @csrf
            @method('put')
            <div class="row mt-5 ">
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <input name="data" type="text" value="{{$data->data}}" class="form-control" placeholder="Write here">
              </div>
              </div>
            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Update-Activity</button>
          </form>
        </div> <!-- .container -->
      </div>

        {{-- jquery --}}
     





</body>
</html>