<section class="my-3">
    <div class="container-fluid">
        <form action="" method="post">
            @csrf
            <button type="button" onclick="addRoutes(this)" class="btn btn-primary btn-lg px-4 text-uppercase">AGREGAR</button>
            <div class="row mt-3">
                <div class="col-12 mb-n3" id="card--routes">
                    @if (!empty($data["elementos"]))
                    @for($i = 0; $i < count($data["elementos"]); $i++)
                        @php
                        $elementos = $data["elementos"];
                        @endphp
                        <div class="card mb-3 border-0">
                            <div class="card-body card--route">
                                <div class="row">
                                    <div class="col-12 col-md">
                                        <label>LINK</label>
                                        <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z0-9_/)')" oninput="setCustomValidity('')" pattern="[a-z0-9._/%+-]+" required @isset($elementos[$i]['LINK']) value="{{ $elementos[$i]['LINK'] }}" @endisset type="text" name="LINK[{{$i}}]" class="form-control form-control-sm">
                                        <small class="form-text text-muted">URL visible</small>
                                    </div>
                                    <div class="col-12 col-md">
                                        <label>NAME</label>
                                        <input required @isset($elementos[$i]['NAME']) value="{{ $elementos[$i]['NAME'] }}" @endisset type="text" name="NAME[{{$i}}]" class="form-control form-control-sm">
                                        <small class="form-text text-muted">Nombre visible en el menu</small>
                                    </div>
                                    <div class="col-12 col-md">
                                        <label>SHOW</label>
                                        <select name="SHOW[{{$i}}]" class="form-control form-control-sm">
                                            <option @if(!$elementos[$i]['SHOW']) selected @endif value="0">Hidden</option>
                                            <option @if($elementos[$i]['SHOW']) selected @endif value="1">Visible</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md function">
                                        <label>FUNCTION</label>
                                        <input readonly oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z_)')" oninput="setCustomValidity('')" pattern="[a-z_]+" required @isset($elementos[$i]['FUNCTION']) value="{{ $elementos[$i]['FUNCTION'] }}" @endisset type="text" name="FUNCTION[{{$i}}]" class="form-control form-control-sm">
                                        <small class="form-text text-muted">Función en el controlador</small>
                                        <label><span class="mr-2">Activar campo</span><input onchange="activeInput(this);" type="checkbox" name="" id=""></label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2 request">
                                    <div class="col-12 mb-1">
                                        <label class="mb-1">REQUEST<button type="button" onclick="addRequest(this);" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i></button></label>
                                        <small class="mb-3 form-text text-muted">Palabras claves para activar el link</small>
                                    </div>
                                    @for($j = 0; $j < count($elementos[$i]['REQUEST']); $j++)
                                    <div class="col-12 col-md d-flex option">
                                        <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z- _ / *)')" oninput="setCustomValidity('')" pattern="[a-z-_/*]+" required value="{{ $elementos[$i]['REQUEST'][$j] }}" type="text" name="REQUEST[{{$i}}][]" class="form-control form-control-sm">
                                        <button type="button" onclick="removeRequest(this);" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endfor
                    @endif
                </div>
            </div>
            <button class="btn btn-success btn-lg px-4 mt-5 text-uppercase">RUTAS</button>
        </form>
    </div>
</div>
@push("scripts")
<script>
    addRoutes = t => {
        let html = "";
        let div = document.createElement("div");
        let indice = document.querySelectorAll(".card--route").length;
        div.classList.add("card", "mb-3", "border-0");
        html += `<div class="card-body card--route">`;
            html += `<div class="row">`;
                html += `<div class="col-12 col-md">`;
                    html += `<label>LINK</label>`;
                    html += `<input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z0-9_/)')" oninput="setCustomValidity('')" pattern="[a-z0-9._/%+-]+" required type="text" name="LINK[${indice}]" class="form-control form-control-sm">`;
                    html += `<small class="form-text text-muted">URL visible</small>`;
                html += `</div>`;
                html += `<div class="col-12 col-md">`;
                    html += `<label>NAME</label>`;
                    html += `<input required type="text" name="NAME[${indice}]" class="form-control form-control-sm">`;
                    html += `<small class="form-text text-muted">Nombre visible en el menu</small>`;
                html += `</div>`;
                html += `<div class="col-12 col-md">`;
                    html += `<label>SHOW</label>`;
                        html += `<select name="SHOW[${indice}]" class="form-control form-control-sm">`;
                            html += `<option value="0">Hidden</option>`;
                            html += `<option value="1">Visible</option>`;
                        html += `</select>`;
                    html += `</div>`;
                    html += `<div class="col-12 col-md function">`;
                        html += `<label>FUNCTION</label>`;
                        html += `<input readonly oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z_)')" oninput="setCustomValidity('')" pattern="[a-z_]+" required type="text" name="FUNCTION[${indice}]" class="form-control form-control-sm">`;
                        html += `<small class="form-text text-muted">Función en el controlador</small>`;
                        html += `<label><span class="mr-2">Activar campo</span><input onchange="activeInput(this);" type="checkbox" name="" id=""></label>`;
                    html += `</div>`;
                html += `</div>`;
                html += `<hr>`;
                html += `<div class="row mt-2 request">`;
                    html += `<div class="col-12 mb-1">`;
                        html += `<label class="mb-1">REQUEST<button type="button" onclick="addRequest(this);" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i></button></label>`;
                        html += `<small class="mb-3 form-text text-muted">Palabras claves para activar el link</small>`;
                    html += `</div>`;
                    html += `<div class="col-12 col-md d-flex option">`;
                        html += `<input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z- _ / *)')" oninput="setCustomValidity('')" pattern="[a-z-_/*]+" required type="text" name="REQUEST[${indice}][]" class="form-control form-control-sm">`;
                        html += `<button type="button" onclick="removeRequest(this);" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>`;
                    html += `</div>`;
                html += `</div>`;
            html += `</div>`;
        html += `</div>`;
        div.innerHTML = html;
        document.querySelector("#card--routes").insertAdjacentHTML('beforeend', div.outerHTML);
    };
    activeInput = t => {
        let input = t.closest(".function").querySelector("input[type='text']");
        if (t.checked)
            input.removeAttribute("readonly");
        else
            input.setAttribute("readonly", true);
    };
    removeRequest = t => {
        const target = t.closest(".request");
        const elements = target.querySelectorAll(".option");
        const element = t.closest(".option");
        if (elements.length === 1) {
            Toast.fire({
                icon: 'error',
                title: 'No se puede eliminar'
            });
            return null;
        }
        element.remove();
    };
    addRequest = t => {
        const target = t.closest(".request");
        const elements = target.querySelectorAll(".option");
        let element = elements[0].cloneNode(true);
        element.querySelector("input").value = "";
        target.appendChild(element);
    };
</script>
@endpush