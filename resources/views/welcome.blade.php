@include('master.app')
<body>
    <div class="page-section">
      
        <div class="container">
          <h1 class="text-center wow fadeInUp">To-do List</h1>
            {{-- input-here --}}
            
            
            {{-- add-activity --}}
         <div class="row my-3">
            <div class="col-12 col-sm-6">
              <form action="{{route('store')}}" method="POST" class="main-form" >
                @csrf
            
                  <div class="input-group mt-2  ">
                    <input name="data" id="input" type="text" class="form-control" placeholder="Write here">
                    <span class="input-group-btn ml-2">
                      <button type="submit" id="add" class="btn btn-primary">Add-Activity</button>
                  </span>
                  </div>
    
                </form>
            </div>
              {{-- search --}}
            <div class="col-12 col-sm-6">
              <form action="{{route('home')}}" method="GET" role="search">
                @csrf
                  <div class="input-group mt-2">
                      
                      <input type="text" class="form-control mr-2" name="data" placeholder="Search projects" >
                      <span class="input-group-btn ml-2">
                        <button class="btn btn-info" type="submit" title="Search">
                            <span class="fas fa-search">Search</span>
                        </button>
                    </span>
                  </div>
              </form>
            </div>
         </div>

           {{-- activity- table --}}
                
            <table class="table table-striped text-left ">
                  <thead>
                        <tr>
                          <th scope="col">Activities</th>     
                        </tr>
                  </thead>
            <tbody>
                    @if(session()->has('success'))
                            <div class="alert alert-success">
                              {{ session()->get('success') }}
                            </div>
                    @endif



                 @foreach ($data as $data)
                    <tr>
                    
                        @if ($data->is_confirmed == false)
                            <td class="text-left" scope="row">{{$data->data}} 
                                <div class="col-md-12 bg-light text-right">  


                                  <a href="{{route('edit', ['data' => $data])}}" type="button" class="btn btn-info">Edit</a>
                                  {{-- edit-button --}}
                              
                                  <a href="{{route('confirm', ['data' => $data])}}" type="button" class="btn btn-success">Complete</a>
                                {{-- route('blog.by.slug', ['slug' => 'someslug']) --}}

                                 
                              </div>        
                            </td>
                        @else

                            <td class="text-left" scope="row">
                                <strike>{{$data->data}} </strike>
                                    <div class="col-md-12 bg-light text-right"> 
                                        {{-- form1 --}}
                                        <form action="{{route('cut',['data'=> $data])}}" method="POST">
                                          @csrf
                                           <button type="submit" class="btn btn-danger">Delete</button>
                            {{-- route('blog.by.slug', ['slug' => 'someslug']) --}}
                                        </form>
                                            {{-- form2 --}}
                                            
                                    </div>        
                            </td>

                        @endif
                    

                  </tr>
                 @endforeach

                      @if(session()->has('msg'))
                            <div class="alert alert-success">
                                {{ session()->get('msg') }}
                            </div>
                      @endif
                            
                </tbody>
              </table>
        </div> <!-- .container -->
      </div>

        {{-- jquery --}}
     



<script>
  
  // document.getElementById("add").addEventListener("click", function(event){
  //   event.preventDefault();
  //   document.getElementById("add").style.backgroundColor = "red";
  // });

</script>

</body>
</html>