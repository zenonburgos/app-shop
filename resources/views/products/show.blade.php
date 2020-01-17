@extends('layouts.app')

@section('title', 'Mi App Shop | Dashboard')

@section('body-class', 'profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-circle img-responsive img-raised">
                    </div>                   

                    <div class="name">
                        <h3 class="title">{{ $product->name }}</h3>
                        <h6>{{ $product->category->name }}</h6>
                    </div>

                     @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notification') }}
                        </div>
                    @endif
                    
                </div>
            </div>
            <div class="description text-center">
                <p>{{ $product->long_description }}</p>
            </div>

            <div class="text-center" data-toggle="modal" data-target="#modalAddToCart">
                <button class="btn btn-primary btn-round">
                    <i class="material-icons">add</i> Añadir al carrito de compras
                </button>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                            <!-- <ul class="nav nav-pills" role="tablist">
                                <li class="active">
                                    <a href="#studio" role="tab" data-toggle="tab">
                                        <i class="material-icons">camera</i>
                                        Studio
                                    </a>
                                </li>
                                <li>
                                    <a href="#work" role="tab" data-toggle="tab">
                                        <i class="material-icons">palette</i>
                                        Work
                                    </a>
                                </li>
                                <li>
                                    <a href="#shows" role="tab" data-toggle="tab">
                                        <i class="material-icons">favorite</i>
                                        Favorite
                                    </a>
                                </li>
                            </ul> -->

                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach ($imagesLeft as $image)
                                            <img src="{{ $image->url }}" />
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($imagesRight as $image)
                                            <img src="{{ $image->url }}" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                

                                <!-- <div class="tab-pane text-center" id="work">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="/img/examples/chris5.jpg" class="img-rounded" />
                                            <img src="/img/examples/chris7.jpg" class="img-rounded" />
                                            <img src="/img/examples/chris9.jpg" class="img-rounded" />
                                        </div>
                                        <div class="col-md-6">
                                            <img src="/img/examples/chris6.jpg" class="img-rounded" />
                                            <img src="/img/examples/chris8.jpg" class="img-rounded" />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane text-center" id="shows">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="/img/examples/chris4.jpg" class="img-rounded" />
                                            <img src="/img/examples/chris6.jpg" class="img-rounded" />
                                        </div>
                                        <div class="col-md-6">
                                            <img src="/img/examples/chris7.jpg" class="img-rounded" />
                                            <img src="/img/examples/chris5.jpg" class="img-rounded" />
                                            <img src="/img/examples/chris9.jpg" class="img-rounded" />
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
      </div>
      <form method="post", action="{{ url('/cart') }}">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
          </div>
      </form>
      
    </div>
  </div>
</div>

@include('includes.footer')
@endsection


