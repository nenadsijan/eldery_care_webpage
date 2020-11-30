

  <table class="table table-bordered table-striped" id="results" style="text-align: center; border: 2px solid white;">

            <thead>
                <tr>
                    <th>Ime Dokumenta</th>
                    <th>Preuzmite Dokument</th>
                  @if (Auth::user())   
                    <th>Promijenite Dokument</th>
                  @endif   
                </tr>
            </thead>

            <tbody>
                @foreach ($documents as $document)
                
                <tr>
                    <td>{{ $document->title}}</td>
                    <td><a href="{{asset('storage/upload/'.$document->file_name)}}" class="btn btn-hot text-capitalize btn-xs" download>Preuzmi fajl</a>   
                    </td>
                    @if (Auth::user())  
                    <td>
                            <a href="{{ route('document.edit', ['id' =>  $document -> id ]) }}" class="btn btn-hot text-capitalize btn-xs style="margin-right: 3px;">Izmijeni</a>
                    </td>
                    @endif
                 @endforeach  
   
                       </tr> 
            </tbody>
            
        </table>
<div id="pageNavPosition"> </div>


    @if (Auth::user())  
                         <a href="{{ route('document.create')}}" class="btn btn-success" style="border-radius:0px;  position: absolute; right: 0; margin-right: 2%;">Dodaj Vijest</a>
         @endif