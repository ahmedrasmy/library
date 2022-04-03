@extends('layout')
@section('title')
{{__('site.All Books')}}    
@endsection
@section('content')
<!-- Start Search -->
<div class="searchInput">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-6 mx-auto">
          <input
            class="w-100 text-light bg-transparent p-2 my-3"
            type="search"
            name="search" id="keyword"
            placeholder="{{__('site.Enter Book Title')}}"
          />
        </div>
      </div>
    </div>
  </div>
  <!-- End Search -->
  
    <div class="notebook">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-6">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="main-title text-center mt-5 mb-5 position-relative">
                        <img class="mb-4" src="{{asset('imgs/title.png')}}" alt="" />
                        <h2>{{__('site.All Books')}}</h2>
                            @auth
                                <div class="d-flex justify-content-center pb-2 pt-2">
                                    <a class="btn rounded-pill main-btn text-uppercase" href="{{route('books.create')}}">{{__('site.Create')}}</a>
                                </div>
                            @endauth
                      </div>
                </div>
                @auth
                <div class="col-sm-6">
                    <div class="main-title text-center mt-5 mb-5 position-relative">
                        <img class="mb-4" src="{{asset('imgs/title.png')}}" alt="" />
                        <h2>{{__('site.Notes')}}</h2>
                        @if (LaravelLocalization::getCurrentLocale() == 'en')
                            @foreach(Auth::user()->notes as $note)
                                <h3>{{ $note->content_en }}</h3>
                            @endforeach
                        @else
                            @foreach(Auth::user()->notes as $note)
                                <h3>{{ $note->content_ar }}</h3>
                            @endforeach
                        @endif
                       
                            <div class="d-flex justify-content-center pb-2 pt-2">
                                <a class="btn rounded-pill main-btn text-uppercase" href="{{route('notes.create')}}">{{__('site.Add New Note')}}</a>
                            </div>
                    </div>
                </div>
                @endauth
            </div>
            
        </div>
    </div>
<!-- Start Book  -->
<div class="book pt-5 pb-5">
    <div class="container">
      <div class="row allBooks" id="allBooks">
        @foreach($books as $book)
            <div class="col-md-6 col-lg-4 mb-3">
            <div class="card">
                <img src="{{asset('uploads/books/' . $book->img )}}" class="card-img-top" alt="Book" />
                <div class="card-body text-center">
                    <h5 class="card-title"><a class="btn rounded-pill main-btn text-uppercase fw-bold" href="{{route('books.show',$book->id)}}">{{ $book->title }}</a></h5>
                    <span class="text-black-50 mb-5">{{ $book->desc}}</span><br><br>
                    <a href="{{route('books.show',$book->id)}}" class="btn btn-primary">{{__('site.Show')}}</a>
                    @auth 
                        <a href="{{route('books.edit',$book->id)}}" class="btn btn-success">{{__('site.Edit')}}</a>
                        @if (Auth::user()->is_admin==1)
                            <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger">{{__('site.Delete')}}</a>
                        @endif
                    @endauth
                </div>
            </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Book  -->
  {{-- Start pagination  --}}
  <div class="d-flex justify-content-center">
    {!! $books->links() !!}
  </div>
 
  {{-- End pagination  --}}

@endsection

@section('scripts')
    <script>
        let inputSearch = document.getElementById('keyword');
        var allBooks = document.getElementById('allBooks');

        inputSearch.addEventListener("keyup", function(){        
               let keyword = inputSearch.value;
               if(keyword == "")
               {
                     allBooks
               }
               let url = "{{ route('books.search') }}" + "?keyword=" + keyword;
               let xhr = new XMLHttpRequest();
               xhr.open('GET', url, true);

               xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    allBooks.innerHTML="";
                    var result = xhr.responseText;
                    var books  = JSON.parse(result);
                    var text="";
                    if(books == "")
                    {
                        text=`<span class="text-danger text-center">{{__('site.no book')}}</span>`;
                        allBooks.innerHTML=text;
                    }
                    
                    for(let book of books)
                    {   
                        
                         text=`
                         <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card">
                            <img src="/uploads/books/${book.img}" class="card-img-top" alt="Book" />
                            <div class="card-body text-center">
                                <h5 class="card-title"><a class="btn rounded-pill main-btn text-uppercase fw-bold" href="#">${book.title}</a></h5>
                                <span class="text-black-50 mb-5">${book.desc}</span><br><br>
                            <a href="/books/show/${book.id}" class="btn btn-primary">{{__('site.Show')}}</a>
                            @auth 
                                <a href="/books/edit/${book.id}" class="btn btn-success">{{__('site.Edit')}}</a>
                                @if (Auth::user()->is_admin==1)
                                    <a href="/books/delete/${book.id}" class="btn btn-danger">{{__('site.Delete')}}</a>
                                @endif
                            @endauth
                            </div>
                        </div>
                        </div>`;
                        allBooks.innerHTML += text;
                    }
                    

                }
             }

                xhr.send();
            
                });
    </script>
@endsection