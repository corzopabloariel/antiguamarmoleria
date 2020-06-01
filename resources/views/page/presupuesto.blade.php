<div class="encabezado py-5 border-bottom">
    <div class="container">
        <h2 class="title--important text-uppercase">Pedido de presupuesto</h2>
    </div>
</div>
<div class="presupuesto bg-white py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="contacto--form producto--info">
                    <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                        <input type="hidden" name="elementos[producto]" value="Producto">
                        <input type="hidden" name="elementos[nombre]" value="Nombre y Apellido">
                        <input type="hidden" name="elementos[email]" value="Email">
                        <input type="hidden" name="elementos[telefono]" value="Teléfono">
                        <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="nombre">Nombre y Apellido (*)</label>
                                <input aria-label="Nombre y Apellido" placeholder="Nombre y Apellido (*)" required maxwidth="100" type="text" id="nombre" name="nombre" class="form-control form--input" value="{{ old('nombre') }}">
                                <label for="producto" class="mt-4">Producto específico:</label>
                                <input list="productos" name="producto" id="producto" class="form-control form--input" placeholder="Producto específico">
                                <datalist id="productos">
                                    @foreach($data["productos"] AS $p)
                                        <option value="{{$p}}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="email">Email (*)</label>
                                <input aria-label="Email" placeholder="Email (*)" required maxwidth="150" type="email" id="email" name="email" class="form-control form--input" value="{{ old('nombre') }}">
                                <label class="mt-4" for="telefono">Teléfono</label>
                                <input aria-label="Teléfono" placeholder="Teléfono" type="phone" id="telefono" name="telefono" class="form-control form--input" value="{{ old('telefono') }}">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="mensaje">Mensaje (*)</label>
                                <textarea rows="5" aria-label="Mensaje" placeholder="Mensaje (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                            </div>
                            <div class="col-12 mt-5">
                                <label for="file">Archivo adjunto</label>
                                <label class="image--upload bg-white">
                                    <input type="file" accept="image/*" id="file" name="archivo" onchange="readURL(this)">
                                    <span data-name="No se seleccionó ningún archivo">📂</span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-primary button--form button--form__public px-5 text-uppercase">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push("scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ $data[ 'empresa' ]->captcha[ 'public' ] }}"></script>
<script>
    enviar = t => {
        let invalid = t.querySelectorAll(".form-control:invalid");
        let select = document.querySelectorAll(".selectpicker");
        let radio = document.querySelectorAll("input[type='radio']:checked");
        if (invalid.length > 0) {
            Array.prototype.forEach.call(invalid, i => {
                i.parentElement.classList.add("text-danger")
            });
            Toast.fire({
                icon: 'error',
                title: 'Complete o coloque información válida en el formulario'
            });
            return null;
        }
        Toast.fire({
            icon: 'warning',
            title: 'Espere'
        });
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        if (select.length > 0) {
            Array.prototype.forEach.call(select, s => {
                formData.set(s.name, s.querySelector("option:checked").text);
            });
        }
        if (radio.length > 0) {
            Array.prototype.forEach.call(radio, r => {
                formData.set(r.name, r.dataset.nombre);
            });
        }
        grecaptcha.ready(function() {
            $( ".form-control" ).prop( "readonly" , true );
            grecaptcha.execute("{{ $data[ 'empresa' ]->captcha[ 'public' ] }}", {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    $(t).find(".form-control").prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        setTimeout(() => {
                            location.reload();
                            Toast.fire({
                                icon: 'success',
                                title: res.data.mssg
                            });
                        }, 1000);
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.mssg
                        });
                })
                .catch((err) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
@endpush