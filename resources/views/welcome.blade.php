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
        <h5>Mouse</h5>
        <p>Encontre mouses e acessórios aqui.</p>
      </div>
    </div>
    <section>
      <div class='row mx-0'>
      </div>
      <div class="carousel-item">
        <img src="../images/café.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Brindes exclusivos</h5>
          <p>Tudo para seus funcionários.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/relogio2.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Brindes para eventos</h5>
          <p>Faça seus convidados lembrarem para sempre de seu evento.</p>
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

{{-- CATEGORIA 1 --}}

<div class="container my-4">
  <div class="row">
    <div class="col-lg-4 col-md-10 mx-auto">
      <img class="img-gallery--category w-100 img-fluid" src="../images/relogio.jpg" alt="">
    </div>
    <div class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      @foreach (\App\Models\Product::highlights(1, 3) as $product)
        <a href='{{ route('product.show', $product->id) }}'>
          <div class="p-0 my-sm-3 my-lg-0 img-gallery--container">
            <img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt=""> 
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>

{{-- CATEGORIA 2 --}}

<div class="container my-4">
  <div class="row">
    <div class="col-lg-4 col-md-10 mx-auto">
      <img class="img-gallery--category w-100 img-fluid" src="../images/caixa de som.jpg" alt="">
    </div>
    <div
      class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      @foreach (\App\Models\Product::highlights(1, 6) as $product)
        <div class="p-0 my-sm-3 my-lg-0 img-gallery--container">
          <img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt=""> 
        </div>
      @endforeach
    </div>
  </div>
</div>

{{-- CATEGORIA 3 --}}

<div class="container my-4">
  <div class="row">
    <div
      class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
        @foreach (\App\Models\Product::highlights(1, 6) as $product)
          <div class="p-0 my-sm-3 my-lg-0 img-gallery--container">
            <img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt="">
          </div>
        @endforeach
    </div>
    <div class="col-lg-4 col-md-10 mx-auto">
      <img class="img-gallery--category w-100 img-fluid" src="../images/fone.jpg" alt="">
    </div>
  </div>
</div>


@endsection
