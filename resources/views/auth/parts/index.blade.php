<section class="my-3">
    <div class="container-fluid">
        <div class="p-4 bg-white">
            <h1 class="text-center text-welcome">Bienvenido {{Auth::user()["name"]}}</h1>
            @isset($data["elements"])
            <p class="mt-5 text-center">Información básica</p>
            <div class="row">
                @foreach($data["elements"] AS $e)
                <div class="col-12 col-md-4 mt-4">
                    <div class="p-4 button--form border border-dark" style="background-color: {{$e['bg']}}; color: {{$e['t']}}">
                        @php
                        $n = $e["e"];
                        if (gettype($e["e"]) == "array")
                            $n = $e["e"]["data"];
                        @endphp
                        <h5 class="d-flex justify-content-between"><strong>{{$e["n"]}}</strong> <span>{{$n}}</span></h5>
                    </div>
                </div>
                @endforeach
            </div>
            @endisset
        </div>
    </div>
</div>