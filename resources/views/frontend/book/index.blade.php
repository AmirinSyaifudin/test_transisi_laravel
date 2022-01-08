@extends('frontend.templates.default')

@section('content')
<h2>SILAHKAN MELAKUKANG LOGIN DAHULU</h2>
<h5>EMIAL    = admin@transisi.id  </h5>
<h5>PASSWORD = transisi </h5>
{{-- <blockquote>
 <p class="flow-text">Koleksi Buku yang bisa kamu baca & pinjam</p>
</blockquote>
 <div class="row">
    @foreach ($books as $book)
        @include('frontend.templates.components.card-book', [  'book' => $book])
    @endforeach
 </div> --}}

 {{--  pagimation  --}}
 {{-- {{ $books->links('vendor.pagination.materialize') }} --}}

@endsection
