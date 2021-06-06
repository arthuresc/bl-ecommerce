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
      <a href='{{ route('category.show', 4) }}' target="_blank">
        <img src="../images/products/slider/slider2.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Brindes para eventos</h5>
          <p>Garrafas personalizadas e reutilizáveis.</p>
        </div>
      </a>
    </div>
    <div class="carousel-item">
      <a href='{{ route('tag.show', 21) }}' target="_blank">
        <img src="../images/products/slider/slider1.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Relógios MVMT</h5>
          <p>Qualidade e preço baixo.</p>
        </div>
      </a>
    </div>
    <div class="carousel-item">
      <a href='{{ route('tag.show', 21) }}' target="_blank">
        <img src="../images/products/slider/slider3.jpg" class="d-block img-carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Canecas variadas</h5>
          <p>Faça seus convidados lembrarem para sempre de seu evento.</p>
        </div>
      </a>
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
      <a href='{{ route('category.show', 1) }}' class="link-dark">
        <img class="img-gallery--category w-100 img-fluid" src="../images/products/categories/category1.jpg" alt="">
      </a>
    </div>
    <div class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      @foreach (\App\Models\Product::highlights(1, 3) as $product)
        <div class="flip-card img-gallery--container">
          <div class="flip-card-inner shadow">
            <div class="flip-card-front p-0 my-sm-3 my-lg-0">
              <img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt="">
            </div>
            <a href='{{ route('product.show', $product->id) }}' class="link-dark">
              <div class="flip-card-back">
                <div class="mt-5">
                  <p class="text-muted">{{ $product->name }}</p>
                  <div class='mt-5'>
                    <span class="display-6">Comprar</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

{{-- CATEGORIA 2 --}}

<div class="container my-4">
  <div class="row">
      <div class="col-lg-4 col-md-10 mx-auto">
        <a href='{{ route('category.show', 2) }}' class="link-dark">
          <img class="img-gallery--category w-100 img-fluid" src="../images/products/categories/category2.jpg" alt="">
        </a>
      </div>
    <div
      class="col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
      @foreach (\App\Models\Product::highlights(2, 6) as $product)
        <div class="flip-card img-gallery--container">
          <div class="flip-card-inner shadow">
            <div class="flip-card-front p-0 my-sm-3 my-lg-0">
              <img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt="">
            </div>
            <a href='{{ route('product.show', $product->id) }}' class="link-dark">
              <div class="flip-card-back">
                <div class="mt-5">
                  <p class="text-muted">{{ $product->name }}</p>
                  <div class='mt-5'>
                    <span class="display-6">Comprar</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

{{-- CATEGORIA 3 --}}

<div class="container my-4">
  <div class="row">
    <div
      class="p-1 col-lg-8 col-md-10 mx-auto d-flex flex-wrap flex-row justify-content-sm-around justify-content-lg-between align-content-sm-around align-content-lg-between container">
        @foreach (\App\Models\Product::highlights(3, 6) as $product)

        <div class="flip-card img-gallery--container">
          <div class="flip-card-inner shadow">
            <div class="flip-card-front p-0 my-sm-3 my-lg-0">
              <img class="img-gallery--thumbnail" src="{{ asset($product->mainImage) }}" alt="">
            </div>
            <a href='{{ route('product.show', $product->id) }}' class="link-dark">
              <div class="flip-card-back">
                <div class="mt-5">
                  <p class="text-muted">{{ $product->name }}</p>
                  <div class='mt-5'>
                    <span class="display-6">Comprar</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        @endforeach
    </div>
      <div class="col-lg-4 col-md-10 mx-auto">
        <a href='{{ route('category.show', 3) }}' class="link-dark">
          <img class="img-gallery--category w-100 img-fluid" src="../images/products/categories/category3.jpg" alt="">
        </a>
      </div>
  </div>
</div>


@endsection
