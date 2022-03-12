@extends('layout')
@section('title')
    All Books
@endsection
@section('content')
<input type="search" class="search" placeholder="Search Book" name="search" id="keyword">
@auth
    <h2>Notes:</h2>
    @foreach(Auth::user()->notes as $note)
        <p>{{ $note->content }}</p>
    @endforeach
    <a href="{{route('notes.create')}}" class="btn btn-info">Add New Note</a>

@endauth

<h1>All Books</h1>
@auth
    <a href="{{route('books.create')}}" class="btn btn-primary">Create</a>
@endauth
<div class="allBooks" id="allBooks">
@foreach($books as $book)
    
    <hr>
   <a href="{{route('books.show',$book->id)}}"><h3>{{ $book->title }}</h3></a>
    <p>{{ $book->desc}}</p>
    <a href="{{route('books.show',$book->id)}}" class="btn btn-primary">Show</a>
    @auth 
        <a href="{{route('books.edit',$book->id)}}" class="btn btn-success">Edit</a>
        @if (Auth::user()->is_admin==1)
            <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger">Delete</a>
        @endif
    @endauth

@endforeach
</div>

@endsection

@section('scripts')
    <script>
        let inputSearch = document.getElementById('keyword');
        var allBooks = document.getElementById('allBooks');

        inputSearch.addEventListener("keyup", function(){
               let keyword = inputSearch.value;
               let url = "{{ route('books.search') }}" + "?keyword=" + keyword;
               allBooks.innerHTML="";
               let xhr = new XMLHttpRequest();
               xhr.open('GET', url, true);

               xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    var books  = JSON.parse(result);
                    for(let book of books)
                    {
                        let myH3 = document.createElement("h3");
                        let myTextH3 = document.createTextNode(book.title);
                        myH3.appendChild(myTextH3);
                        let myP = document.createElement("p");
                        let myTextP = document.createTextNode(book.desc);
                        myP.appendChild(myTextP);
                        allBooks.appendChild(myH3);
                        allBooks.appendChild(myP);
                    }
                }
             }

                xhr.send();
                //    console.log(keyword);
                });
    </script>
@endsection