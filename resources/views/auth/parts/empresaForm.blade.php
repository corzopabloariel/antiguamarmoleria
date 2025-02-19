<section class="my-3">
    <div class="container-fluid">
        <div style="display: block;" id="wrapper-form" class="">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Ingrese a qué mail desea redirigir los formularios que contiene el sitio.
                    </div>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" class="pt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="btn btn-lg px-5 mx-auto mb-2 btn-success text-uppercase text-center">cambios<i class="far fa-save ml-2"></i></button>
                        <div class="container-form py-3 mt-3">
                            <div class="row">
                                <div class="col-12 col-md-5 d-flex align-items-center">
                                    <label for="" class="m-0">
                                        Contacto
                                    </label>
                                </div>
                                <div class="col-12 col-md-7">
                                    <input type="email" required name="contacto" placeholder="Ingrese mail" @if(isset($data['elementos']['forms']['contacto'])) value="{{ $data['elementos']['forms']['contacto'] }}" @endif class="form-control border-top-0 border-left-0 border-right-0 rounded-0">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-5 d-flex align-items-center">
                                    <label for="" class="m-0">
                                        Presupuesto
                                    </label>
                                </div>
                                <div class="col-12 col-md-7">
                                    <input type="email" required name="presupuesto" placeholder="Ingrese mail" @if(isset($data['elementos']['forms']['presupuesto'])) value="{{ $data['elementos']['forms']['presupuesto'] }}" @endif class="form-control border-top-0 border-left-0 border-right-0 rounded-0">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    formSubmit = function(t) {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        formSave( t , formData );
    };
    /** */
    init(data => {}, false, false, null, false, null, null, true);
</script>
@endpush