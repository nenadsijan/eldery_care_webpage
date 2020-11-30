<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Request2;
//including post model to controller
use validate;
use App\Post;
use App\Document;
//if we want to use sql syntax for queries 
use DB; 
use Image;
use Mail;
use Session;
USE Validator;
use Redirect;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{

 function index()
    {
     return view('login');
    }
    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {

      return redirect('');
     }
     else
     {
      return back()->with('error', 'Uneli ste pogresne podatke');
     }

    }

    function successlogin(Request $request)
    {

      $posts= Post::orderby('created_at', 'desc')->paginate(3, ['*'], 'page_1s'); 
   

       if ($request->ajax()) {
            
            return view('presult',  compact('posts'));
             
       
        }
     $documents= Document::orderby('created_at', 'desc')->paginate(10000, ['*'], 'page_2s');
      
     return view('main_page', ['posts'=>$posts,'documents'=>$documents]);

    }

    function logout()
    {
     Auth::logout();
     return redirect('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


  $rules = [
        'naslov' => 'required|min:3|max:20',
         'sadržaj' => 'required|min:40',
         'slika' => 'mimes:jpeg,bmp,png'
         
    ];
      $customMessages = [
        'required' => 'Unesite ":attribute" !',
        'min'  => 'Polje ":attribute" mora da ima minimum :min karaktera.',
         'max'  => 'Polje ":attribute" može da ima najviše :max karaktera.',
         'email'  => 'Polje ":attribute" mora da ima validan format',
         'mimes' => '":attribute" mora biti u sledećim formatima: :values'
    ];

    $validator =  Validator::make(Input::all(), $rules,  $customMessages);

    if ($validator->fails())
    {
 
return \Redirect::back()->withErrors($validator)->withInput();
  }





        //create new post
        $post= new Post;
       
        $post -> title = $request -> input('naslov');
        $post -> content = $request -> input('sadržaj');
        
     // Handle File Upload
     if( $request->hasFile('file') ) {
               $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/upload', $fileNameToStore);
            $post->file_name = $fileNameToStore;

        }
        
        // Check if file is present
        if( $request->hasFile('slika') ) {
            $post_thumbnail     = $request->file('slika');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();
            ini_set('memory_limit', '256M');
            Image::make($post_thumbnail)->resize(329.33, 199.33)->save( public_path('uploads/' . $filename ) );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }

        $post->save();
        
          return redirect()->route('posts.show', $post)->with('successPost', 'Napisali ste novu vijest !');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //list post while we enter through link
        $post= Post::find($id);
    $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
     $next = Post::where('id', '>', $post->id)->first();
        return view('show')-> with('post', $post)->with('previous', $previous)->with('next', $next);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post= Post::find($id);
        return view('edit')-> with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   $rules = [
        'naslov' => 'required|min:3|max:20',
         'sadržaj' => 'required|min:40',
         'slika' => 'mimes:jpeg,bmp,png'
    ];
      $customMessages = [
        'required' => 'Unesite ":attribute" !',
        'min'  => 'Polje ":attribute" mora da ima minimum :min karaktera.',
         'max'  => 'Polje ":attribute" može da ima najviše :max karaktera.',
         'email'  => 'Polje ":attribute" mora da ima validan format',
         'mimes' => '":attribute" mora biti u sledećim formatima: :values'
    ];

    $validator =  Validator::make(Input::all(), $rules,  $customMessages);

    if ($validator->fails())
    {
 
return \Redirect::back()->withErrors($validator)->withInput();
  }


    
       $post = Post::findOrFail($id);

              
        $post -> title = $request -> input('naslov');
        $post -> content = $request -> input('sadržaj');
    

        if( $request->hasFile('image') ) {
               $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/upload', $fileNameToStore);
            $post->file_name = $fileNameToStore;

        }

 // Check if file is present
        if( $request->hasFile('slika') ) {
            $post_thumbnail     = $request->file('slika');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();
            ini_set('memory_limit', '256M');
            Image::make($post_thumbnail)->resize(329.33, 199.33)->save( public_path('uploads/' . $filename ) );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }

        $post->save();



            return redirect()->route('posts.show', $post)->with('editPost', 'Promijenili ste vijest !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post -> delete();
          $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        if(is_null($previous)){
          return redirect('/') ->with('deletePost', 'Vijest je obrisana!');
        }
        $perviousPost=$previous->id;
           return redirect('/posts/'.$perviousPost) ->with('deletePost', 'Vijest je obrisana!');
    }



     public function sendMail(Request $request)
    {
    
    

    if ($request->ajax()) {

      $rules = [
        'ime' => 'required|min:3|max:50',
        'email' => 'required|email|max:100',
         'poruka' => 'required|min:3'
    ];
      $customMessages = [
        'required' => 'Unesite ":attribute" !',
        'min'  => 'Polje ":attribute" mora da ima minimum :min karaktera.',
         'max'  => 'Polje ":attribute" može da ima najviše :max karaktera.',
         'email'  => 'Polje ":attribute" mora da ima validan format'
    ];


        $validator = Validator::make($request->all(), $rules, $customMessages);

  if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }else {
      $data= array(
         'ime' => $request ->ime,
        'email' => $request ->email,
         'poruka' =>$request ->poruka,
        );
    
        
      Mail::send('contact', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('nenadsijan@gmail.com');
        $message->subject($data['ime']);


      });

 
            return response()->json(['success' => true, 'message' => 'Email je poslat, kontaktiraćemo vas u najkrećem mogućem roku !']);
            }
    }
}

 public function createDocument()
    {
    
    return view('createDocument');

     }   

  public function storeDocument(Request $request)
    {   


  $rules = [
        'naslov' => 'required|min:3|max:50',
        'document' => 'required',
     
    ];
      $customMessages = [
        'required' => 'Unesite ":attribute" !',
        'min'  => 'Polje ":attribute" mora da ima minimum :min karaktera.',
         'max'  => 'Polje ":attribute" može da ima najviše :max karaktera.',


    ];

    $validator =  Validator::make(Input::all(), $rules,  $customMessages);

    if ($validator->fails())
    {
 
        return \Redirect::back()->withErrors($validator)->withInput();
     }





        //create new post
        $document= new Document;
       
        $document -> title = $request -> input('naslov');
        
     // Handle File Upload
     if( $request->hasFile('document') ) {
               $filenameWithExt = $request->file('document')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('document')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('document')->storeAs('public/upload', $fileNameToStore);
            $document->file_name = $fileNameToStore;

        }
      

        $document->save();
        
          return redirect()->route('main')->with('successPost', 'Uspiješno ste dodali dokument !');



    }


 public function editDocument($id)
    {
         $document= Document::find($id);

        return view('editDocument')-> with('document', $document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDocument(Request $request, $id)
    {
   $rules = [
        'naslov' => 'required|min:3|max:20',
    
       
    ];
      $customMessages = [
        'required' => 'Unesite ":attribute" !',
        'min'  => 'Polje ":attribute" mora da ima minimum :min karaktera.',
         'max'  => 'Polje ":attribute" može da ima najviše :max karaktera.',
         'email'  => 'Polje ":attribute" mora da ima validan format',
         'mimes' => '":attribute" mora biti u sledećim formatima: :values'
    ];

    $validator =  Validator::make(Input::all(), $rules,  $customMessages);

    if ($validator->fails())
    {
 
return \Redirect::back()->withErrors($validator)->withInput();
  }



       $document = Document::findOrFail($id);

              
        $document -> title = $request -> input('naslov');
         $request->hasFile('document');


     if( $request->hasFile('document') ) {
               $filenameWithExt = $request->file('document')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('document')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('document')->storeAs('public/upload', $fileNameToStore);
            $document->file_name = $fileNameToStore;

        }

        $document->save();



            return redirect()->route('main')->with('editPost', 'Promijenili ste informacije od dokumenta !');

    }


     public function destroyDocument($id)
    {
        $document= Document::find($id);
        $document -> delete();
           return redirect('/') ->with('deleteDocument', 'Dokument je obrisan!');
    }

}