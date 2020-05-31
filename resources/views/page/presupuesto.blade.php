<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Pedido de presupuesto</h2>
    </div>
</div>
<div class="presupuesto py-5">
    <div class="container">
        <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
            <div class="py-5">

            </div>
        </form>
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