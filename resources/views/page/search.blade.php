<div class="productos py-5">
    <div class="container pb-5">
        <h2 class="title--important mb-3">Buscador</h2>
        <form class="d-block my-5" action="" method="get">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 d-flex">
                    <input type="search" value="{{ $data['search'] }}" name="s" required pattern="(.|\s)*\S(.|\s)*" placeholder="Estoy buscando" class="header__input search__input">
                    <button type="submit" class="header__button"><i class="fas fa-search"></i></button>
                </div>
                <div class="col-12 mt-3">
                    <p class="text-center">Total de registros encontrados: {{ $data["total"] }}</p>
                </div>
            </div>
        </form>
        <div class="row mt-n4 justify-content-center">
            @forelse($data["productos"] AS $p)
            <div class="col-12 col-md-4 mt-4 d-flex align-items-stretch">
                @include('page.parts.elemento', ['e' => $p])
            </div>
            @empty
            <div class="col-12 py-4">
                @include( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'd-block mx-auto img--not-found' , 'n' => 'Not found' ] )
                <h3 class="text-center">Sin resultados</h3>
            </div>
            @endforelse
        </div>
        <div class="row mt-5">
            <div class="col-12 justify-content-center d-flex">
                {{$data["productos"]->appends(["s" => $data["search"]])->links()}}
            </div>
        </div>
    </div>
</div>