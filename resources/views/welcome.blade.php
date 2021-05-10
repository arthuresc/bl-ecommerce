@extends('layouts.structure.index')

@section('content')
{{-- //FIND - CAROUSEL TOP   --}}
<section id="carousel" class="carousel slide mb-3" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/mouse.jpg" class="d-block img-carousel" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Nome de um mouse</h5>
        <p>A descrição completa sobre o mouse.</p>
      </div>
    </div>
    <section>
      <div class='row mt-5 mx-0'>
      </div>
      <div class="carousel-item">
        <img src="../images/café.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/relogio.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
{{--  //FIND FIM DO CAROUSEL --}}

{{-- @foreach (\App\Models\Product::highlights() as $product) --}}
{{-- <div class='col-10 col-md-6 col-lg-4 mx-auto mt-3'> --}}
  {{-- <div class='text-center'> --}}
    {{-- <img src="{{ asset($product->mainImage) }}" style='height: 200px; width: 150px;'> --}}
  {{-- </div> --}}
  {{-- <div class='text-center mt-3'> --}}
    {{-- <span class='d-block'>{{ $product->name }}</span> --}}
    {{-- <span class='text-decoration-line-through text-muted'>R$100,00</span> --}}
    {{-- <span class=''>{{ $product->price }}</span> --}}
    {{-- <div class='mt-3'> --}}
      {{-- <a href='{{ route('product.show', $product->id) }}' class='btn btn-success'></a> --}}
    {{-- </div> --}}
  {{-- </div> --}}
{{-- </div> --}}
{{-- @endforeach --}}

<div class="container my-4">
  <div class="row">
    <div class="col-lg-4 col-md-10 mx-auto">
      <img class="img-gallery--category w-100 img-fluid" src="../images/caixa de som.jpg" alt="">
    </div>
    <div class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      @foreach (\App\Models\Product::highlights() as $product)
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><a href='{{ route('product.show', $product->id) }}'><img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt=""> </div></a>
      @endforeach
    </div>
  </div>
</div>

{{--  //FIND INICIO PRODUTOS --}}
<div class="container my-4">
  <div class="row">
    <div class="col-lg-4 col-md-10 mx-auto">
      <img class="img-gallery--category w-100 img-fluid" src="../images/caixa de som.jpg" alt="">
    </div>
    <div class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio2.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/sorvete.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
    </div>
  </div>
</div>
{{-- <x-orchid-icon class="icon" path="fa.arrow-left"/> --}}
<div class="container my-4">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio2.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/sorvete.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
      <div class="p-0 my-sm-3 my-lg-0 img-gallery--container"><img class="img-gallery--thumbnail" src="../images/relogio.jpg" alt=""> </div>
    </div>
    <div class="col-lg-4 col-md-10 mx-auto">
      <img class="img-gallery--category w-100 img-fluid" src="../images/caixa de som.jpg" alt="">
    </div>
  </div>
</div>



@endsection
