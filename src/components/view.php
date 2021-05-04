@section("content")

<div class="bg-primary">
    <h2 class="titulo-politica-privacidade">Política de Privacidade</h2>
</div>

<div class="container-lg container-md px-0 px-lg-3 px-md-3">
    <div class="bg-politica-privacidade text-justify shadow py-4">
        <ul class="nav nav-tabs mx-lg-3 pb-4 d-flex justify-content-lg-start justify-content-center" id="myTab" role="tablist">
            @foreach($itens as $key => $item)
                <li class="nav-item">
                    <a class="link nav-link border-0 @if($key == 0) active @endif"
                    data-toggle="tab" 
                    href="#<?php echo $item->id; ?>"
                    role="tab"
                    aria-controls="<?php echo $item->id; ?>"
                    aria-selected="{{$key == 0 ? true : false}}">{{$item->titulo}}</a>
                </li>
            @endforeach
        </ul>
        <div class="texto-politica-privacidade tab-content" id="myTabContent">
            @foreach($itens as $key => $item)
                <div class="tab-pane fade @if($key == 0) show active @endif"
                id="<?php echo $item->id; ?>"
                role="tabpanel"
                aria-labelledby="home-tab">
                    {!!$item->conteudo!!}
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection