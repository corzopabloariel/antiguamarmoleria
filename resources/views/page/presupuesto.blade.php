<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">@if(auth()->guard('clientAuth')->check()) Cotización @else Pedido de presupuesto @endif</h2>
    </div>
</div>
<div class="presupuesto py-5">
    <div class="container">
        <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
            <div class="py-5">
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="text-center text-uppercase">Seleccione tipo de usuario</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 d-flex justify-content-center flex-wrap">
                        @if(auth()->guard('clientAuth')->check())
                        @php
                        $cliente = auth()->guard('clientAuth')->user();
                        @endphp
                        <input type="hidden" name="elementos[cliente]" value="CLIENTE">
                        <input type="hidden" name="cliente" value="{{$cliente->nombre}} (#{{$cliente->cliente}})">
                        @endif
                        <input type="hidden" name="elementos[tipo]" value="TIPO">
                        <label class="presupuesto--list" data-href="#list-empresa">
                            <input type="radio" class="prespuesto--input" name="tipo" data-nombre="Empresa" value="0" onchange="values(this, 'tipo');">
                            <div class="presupuesto--element">
                                <svg class="presupuesto--svg presupuesto--svg__empresa"><use xlink:href="{{ asset('/images/constant.svg')}}#user-professional"></use></svg>
                            </div>
                            <h3 class="presupuesto--title">Empresa</h3>
                        </label>
                        <label class="presupuesto--list" data-href="#list-particular">
                            <input type="radio" class="prespuesto--input" name="tipo" data-nombre="Particular" value="1" onchange="values(this, 'tipo');">
                            <div class="presupuesto--element">
                                <svg class="presupuesto--svg presupuesto--svg__particular"><use xlink:href="{{ asset('/images/constant.svg')}}#user-final"></use></svg>
                            </div>
                            <h3 class="presupuesto--title">Particular</h3>
                        </label>
                    </div>
                    <div class="col-12 col-md-10 col-lg-9 mt-4">
                        <div class="row justify-content-center" id="add"></div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-9 mt-4 d-none justify-content-end" id="container--buttom">
                        <button class="btn btn-lg btn-primary btn--element px-5 rounded-pill">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@push("scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ $data[ 'empresa' ]->captcha[ 'public' ] }}"></script>
<script>
    function marca(evt) {
        let id = this.value;
        let select_version = document.querySelector(`#version_id`);
        select_version.innerHTML = "";
        select_version.disabled = false;
        let select_modelo = document.querySelector(`#modelo_id`);
        select_modelo.innerHTML = "";
        select_modelo.disabled = false;
        let select = document.querySelector(`#anio_id`);
        select.innerHTML = "";
        select.disabled = false;
        axios.get(`${url_base}/marca/${id}`, {
            responseType: 'json'
        })
        .then(res => {
            res.data.forEach(o => {
                let opt = document.createElement("option");
                opt.text = o.anio;
                select.appendChild(opt);
            })
            $(`#anio_id`).selectpicker("refresh");
        })
        .catch(err => {})
        .then(() => {});
    }
    function anio(evt) {
        let marca_id = document.querySelector(`#marca_id`).value;
        let anio = this.value;
        let select_version = document.querySelector(`#version_id`);
        select_version.innerHTML = "";
        select_version.disabled = false;
        let select = document.querySelector(`#modelo_id`);
        select.innerHTML = "";
        select.disabled = false;
        axios.get(`${url_base}/marca/${marca_id}/anio/${anio}`, {
            responseType: 'json'
        })
        .then(res => {
            res.data.forEach(o => {
                let opt = document.createElement("option");
                opt.text = o.name;
                opt.value = o.id;
                select.appendChild(opt);
            })
            $(`#modelo_id`).selectpicker("refresh");
        })
        .catch(err => {})
        .then(() => {});
    }
    function modelo(evt) {
        let marca_id = document.querySelector(`#marca_id`).value;
        let anio = document.querySelector(`#anio_id`).value;
        let id = this.value;
        let select = document.querySelector(`#version_id`);
        select.innerHTML = "";
        select.disabled = false;
        axios.get(`${url_base}/marca/${marca_id}/anio/${anio}/modelo/${id}`, {
            responseType: 'json'
        })
        .then(res => {
            res.data.forEach(o => {
                let opt = document.createElement("option");
                opt.text = o.version;
                select.appendChild(opt);
            })
            $(`#version_id`).selectpicker("refresh");
        })
        .catch(err => {})
        .then(() => {});
    }
    function version(evt) {}
    function provincia(evt) {
        let id = this.value;
        let select = document.querySelector(`#localidad_id`);
        select.innerHTML = "";
        select.disabled = true;
        $(`#localidad_id`).selectpicker( "refresh" );
        axios.get(`{{ url('/provincia/${id}/localidades') }}`, {
            responseType: 'json'
        })
        .then(function(res) {
            for(let x in res.data) {
                let opt = document.createElement("option");
                opt.value = x;
                opt.text = res.data[x];
                select.appendChild(opt);
            }
            select.disabled = false;
            $(`#localidad_id`).selectpicker( "refresh" );
        })
        .catch(function(err) {})
        .then(function() {});
    }

    function inputFile(t) {
        if (t.files && t.files[0]) {
            let reader = new FileReader();
            reader.onload = ( e ) => {
                t.parentElement.classList.add("image--upload__not-empty")
                t.nextSibling.dataset.name = t.files[0].name;
            };
            reader.readAsDataURL(t.files[0]);
        } else {
            t.parentElement.classList.remove("image--upload__not-empty")
            t.nextSibling.dataset.name = "No se selccionó ningún archivo";
        }
    }

    values = (t, tipo) => {
        let target = null;
        let url = `${window.url_base}/values`;
        let method = "post";
        let formData = new FormData();
        formData.append("tipo", tipo);
        formData.append("value", t.value);
        formData.append("usuario", document.querySelector("input[name='tipo']:checked").value);
        axios({
            method: method,
            url: url,
            data: formData,
            responseType: 'json',
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then((res) => {
            switch (res.data.next) {
                case "cobertura":
                    document.querySelector("#container--buttom").classList.remove(["d-flex"]);
                    document.querySelector("#container--buttom").classList.add(["d-none"]);
                    target = document.querySelector("#add");
                    if (res.data.clean) {
                        target.innerHTML = ""
                        target.classList.add("mt-n4");
                    }
                    res.data.element.forEach(cobertura => {
                        let html = "";
                        let contenedor = document.createElement("div");
                        let img = `<img src="${window.url_base}/${cobertura.image.i}" class="prespuesto--riesgo__icon" />`;
                        contenedor.classList.add("col-12", "col-md-6", "mt-4");
                        html += `<label class="card presupuesto--riesgo"><input type="radio" class="prespuesto--input" data-nombre="${cobertura.name}" value="${cobertura.id}" name="cobertura" onchange="values(this, 'cobertura');" /><div class="card-body d-flex align-items-center justify-content-between">${cobertura.name}${img}</div></label>`;
                        html += `<input type="hidden" name="elementos[cobertura]" value="COBERTURA">`;
                        contenedor.innerHTML = html;
                        target.appendChild(contenedor);
                    });
                    target.innerHTML += '<div class="col-12"><div class="row" id="add2"></div></div>';
                break;
                case "fin":
                    document.querySelector("#container--buttom").classList.add(["d-flex"]);
                    document.querySelector("#container--buttom").classList.remove(["d-none"]);
                    target = document.querySelector("#add2");
                    if (res.data.clean) {
                        target.innerHTML = "";
                    }
                    let elementsForm = {};
                    let elementsFunction = {};
                    for(let e in res.data.form) {
                        const data = res.data.form[e];
                        let element = document.createElement(data.element);
                        let label = data.title.toUpperCase();
                        let help = data.help ? `<small class="text-muted">${data.help}</small>` : "";
                        let input = `<input type="hidden" name="elementos[${data.name}]" value="${label}">`;
                        element.classList.add(...data.class.split(" "));
                        if (data.function)
                            elementsFunction[data.name] = {f: data.function, l: data.listener};
                        if (data.disabled)
                            element.disabled = true;
                        if (data.required) {
                            element.required = true;
                            label += " *";
                        }
                        element.name = data.name;
                        element.id = `${data.name}_id`;
                        switch (data.element) {
                            case "select":
                                element.title = data.title;
                                element.setAttribute("data-live-search", true);
                                element.setAttribute("data-width", "100%");
                                element.setAttribute("data-container", "body");
                                if (data.value) {
                                    data.value.forEach(x => {
                                        let opt = document.createElement("option");
                                        opt.value = x.id;
                                        opt.text = x.name;
                                        element.appendChild(opt);
                                    });
                                }
                                break;
                            case "input":
                                element.type = data.type;
                                element.placeholder = data.title;
                                element.setAttribute("aria-label", data.title);
                                if (data.data) {
                                    for(let d in data.data)
                                        element.setAttribute(d, data.data[d]);
                                }
                                if (data.pattern) {
                                    element.pattern = data.pattern;
                                    if (data.validity) {
                                        element.setAttribute("oninvalid", `this.setCustomValidity('${data.validity}')`);
                                        element.setAttribute("oninput", `this.setCustomValidity('')`);
                                    }
                                }
                                if (data.min)
                                    element.min = data.min;
                                if (data.max)
                                    element.max = data.max;
                                if (data.type == "file") {
                                    input = "";
                                    element.setAttribute("accept", "image/jpeg,application/pdf");
                                    element.setAttribute("onchange", "inputFile(this);");
                                    let labelAux = document.createElement("label");
                                    let span = document.createElement("span");
                                    span.setAttribute("data-name", "No se selccionó ningún archivo");
                                    labelAux.classList.add("image--upload");
                                    labelAux.appendChild(element);
                                    labelAux.appendChild(span);
                                    element = labelAux;
                                }
                                break;
                            case "textarea":
                                element.placeholder = data.title;
                                element.setAttribute("aria-label", data.title);
                        }
                        elementsForm[e] = `<label>${label}</label>` + (typeof element == "string" ? element : element.outerHTML) + help + input;
                    }
                    let flag_selecpicker = false;
                    let flag_inputmask = false;

                    res.data.html.forEach(row => {
                        for(let html in row) {
                            let aux = html;
                            row[html].forEach(e => {
                                if (aux.indexOf(`/${e}/`) > 0) {
                                    if (elementsForm[e].indexOf("selectpicker") > 0)
                                        flag_selecpicker = true;
                                    aux = aux.replace(`/${e}/`, elementsForm[e]);
                                }
                            });
                            target.innerHTML += aux;
                            for (let e in elementsFunction) {
                                let obj = document.querySelector(`#${e}_id`);
                                if (obj)
                                    obj.addEventListener(elementsFunction[e].l, eval(elementsFunction[e].f));
                            }
                        }
                    });
                    if (flag_selecpicker)
                        $(`.selectpicker`).selectpicker("refresh");
                    if (flag_inputmask)
                        $('.inputmask').inputmask();
            }
        })
        .catch((err) => {
            console.error(err)
            Toast.fire({
                icon: 'error',
                title: 'Error'
            });
        })
        .then(() => {});
    };
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