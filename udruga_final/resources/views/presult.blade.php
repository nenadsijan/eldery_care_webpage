{{-- listing the contents on the page  --}}
     @if (count($posts) > 0)

                    <div class="camp">
                  @foreach ($posts->chunk(3) as $items)
                        <div class="row">  
                            @foreach ($items as $post)
                            
                          <div class="col-md-4">
                <div class="card-content">
              
                    <div class="card-img">
                    @if( $post->post_thumbnail )  
                    <img src="/uploads/{{ $post->post_thumbnail }}" alt="{{ $post->post_title }}" />
                        @else
                          <img src="/uploads/no-image.png" alt="" />
                     @endif
               
            
              
                    </div>
                    <div class="card-desc">
                        <h3><a href="/posts/{{$post-> id}}">{{$post->title}}</a> <br> <h6 style="text-align: center;">{{$post->created_at->toFormattedDateString()}}</h6></h3>
                       
                        <p>
                            
                            {{ $post->content }}</p>

         <a href="/posts/{{$post-> id}}" class="btn btn-hot text-capitalize btn-xs" style=" width:100px; margin: -20px -50px;
          position:relative; top:50%; left:50%;;">Saznaj više</a>
                    
                          

                    </div>
                </div>
            </div>
                            @endforeach

                        </div>
                 

                    @endforeach

                    <div>{{ $posts->links() }}</div>

            @else
                    <p>Nema Vijesti</p>
            @endif
                      @if (Auth::user())  
                         <a href="{{ route('post.create')}}" class="btn btn-success" style=" border-radius:0px; ">Dodaj Vijest</a>
                       @endif
            </div>