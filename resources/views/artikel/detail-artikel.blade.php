<x-index-layout>
  <style>
    .container-artikel {
  padding: 2rem 1rem;
  background-color: #f9f9f9;
  border-top-left-radius: 24px;
        border-top-right-radius: 24px;
}

.back-btn {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  margin-bottom: 1rem;
}

h1 {
  font-size: 1.8rem;
  color: #144e2a;
  text-align: center;
}

.author {
  text-align: center;
  color: #666;
  font-size: 0.9rem;
  margin-bottom: 1.5rem;
}

.main-image {
  display: block;
  margin: 0 auto 1.5rem;
  width: 100%;
  max-width: 900px;
  border-radius: 8px;
}

.content {
  max-width: 900px;
  margin: 0 auto;
}

.content p {
  margin-bottom: 1rem;
  color: black;
}

.content ol {
  padding-left: 1.2rem;
  margin-bottom: 1rem;
  color: black;
}

.content li {
  margin-bottom: 1rem;
  color: black;
}

footer {
        background: white;
        color: #0F3D2B;
    }
  </style>
 
 <main class="container-artikel">
    <button onclick="window.location.href='/artikel'" class="back-btn">←</button>
    <h1>{{$article->judul}}</h1>
    <p class="author">{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('l, d F Y') }} | {{$article->sumber}}</p>
    <img src="{{ asset('storage/' . $article->image) }}" alt="{{$article->judul}}" class="main-image" />
    
    <section class="content">
      {!!$article->deskripsi!!}
    </section>
  </main>
</x-index-layout>
