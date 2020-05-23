/**
 * @date 12.2019
 * @last_change 17.12.2019
 * @version 0.3.2.0
 **/

const colorPick = "4f9232,808080,111111,191919,fbfb34,a6a6a6,343a40,86008f";
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};
const dates = {
    string: ( d = new Date() , formato = [ "dd" , "/" , "mm" , "/" , "aaaa" ] ) => {
        if (!d || d === "" || d === "-")
            return "-";
        //regexData = /([0-9]{4})-([0-9]{2})-([0-9]{2})/;
        //match = regexData.exec('2020-04-06');
        window[ "dd" ] = d.getDate() < 10 ? `0${d.getDate()}` : d.getDate();
        window[ "mm" ] = d.getMonth() + 1;//los meses [0 - 11]
        window.mm = window.mm < 10 ? `0${window.mm}` : window.mm;
        window[ "aaaa" ] = d.getFullYear();
        window[ "h" ] = d.getHours() < 10 ? `0${d.getHours()}` : d.getHours();
        window[ "m" ] = d.getMinutes() < 10 ? `0${d.getMinutes()}` : d.getMinutes();
        window[ "s" ] = d.getSeconds() < 10 ? `0${d.getSeconds()}` : d.getSeconds();

        let day = "";
        formato.forEach( ( x ) => {
            if( [ "dd" , "mm" , "aaaa" , "h" , "m" , "s" ].includes( x ) )
                day += window[ x ];
            else
                day += x;
        } );
        return day;
    },
    convert: d => {
        if(d)
            return (
                d.constructor === Date ? d :
                d.constructor === Array ? new Date( d[ 0 ] , d [ 1 ] , d[ 2 ] ) :
                d.constructor === Number ? new Date( d ) :
                d.constructor === String ? new Date( d ) :
                d.constructor === "object" ? new Date( d.year , d.month , d.date ) :
                NaN
            );
        else
            return "-";
    },
    /**
     * @return -1 if a < b
     * @return 0 if a = b
     * @return 1 if a > b
     */
    compare: ( a , b ) => {
        return ( ( a.getTime() === b.getTime() ) ? 0 : ( ( a.getTime() > b.getTime() ) ? 1 : - 1 ) );
    }
};

/** ------------------------------------------------
 ** -------------- FUNCIONES BÁSICAS <--------------
 ** ------------------------------------------------
 ** ------------------------------------------------ */
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
/** -------------------------------------
 *      FORMATO MONEDA
 ** ------------------------------------- */
formatter = new Intl.NumberFormat('es-AR', {
    style: 'currency',
    currency: 'ARS',
});
Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
menu = ( t ) => {
    if( $( "#sidebar.compact" ).length ) {
        localStorage.removeItem( "sidebar" );
        $( "#sidebar.compact" ).removeClass( "compact" );
        $( t ).find( "i" ).addClass( "fa-bars" ).removeClass( "fa-times" );
    } else {
        localStorage.setItem( "sidebar" , "1" );
        $( "#sidebar" ).addClass( "compact" );
        $( t ).find( "i" ).addClass( "fa-times" ).removeClass( "fa-bars" );
    }
};
changeCkeditor = ( x , evt ) => {
    const target = document.querySelector(`#${evt.editor.name}`);
    target.value = CKEDITOR.instances[evt.editor.name].getData();
};
menuBody = ( t ) => {
    if( window.typeMENU === undefined ) {
        window.typeMENU = 1;
        document.querySelector("section").classList.add( "isDisabled" );
        document.querySelector("header").classList.add( "isDisabled" );
        document.querySelector("footer").classList.add( "isDisabled" );
        document.getElementById("hamburger-").classList.remove( "d-none" );
        document.getElementById("hamburger").classList.add( "open" );
        document.getElementById("wrapper-menu").animate([
            { transform: 'translateX(0px)' },
            { transform: 'translateX(-300px)' }
        ], {
            fill: "forwards",
            duration: 600,
        });
    } else {
        delete window.typeMENU;
        document.querySelector("section").classList.remove( "isDisabled" );
        document.querySelector("header").classList.remove( "isDisabled" );
        document.querySelector("footer").classList.remove( "isDisabled" );
        document.getElementById("hamburger-").classList.add( "d-none" );
        document.getElementById("hamburger").classList.remove( "open" );
        document.getElementById("wrapper-menu").animate([
            { transform: 'translateX(-300px)' },
            { transform: 'translateX(0px)' }
        ], {
            fill: "forwards",
            duration: 600,
        });
    }
};
navMenu = ( t ) => {
    if( $( ".app-body.isDisabled").length )
        $( ".app-body.isDisabled").removeClass( "isDisabled" );
    else
        $( ".app-body").addClass( "isDisabled" );
};

/** -------------------------------------
 *      CAMBIAR COLORES
 ** ------------------------------------- */
changeColor = (t, target) => {
    let element = document.querySelector(`#${target}`);
    element.value = t.value;
};
/** -------------------------------------
 *      MOSTRAR TÉRMINOS
 ** ------------------------------------- */
terminosShow = ( t , btn ) => {
    if( $( t ).is( ":checked" ) ) {
        $( "#terminosModal" ).modal( "show" );
        $( `#${btn}` ).prop( "disabled" , false );
    } else
        $( `#${btn}` ).prop( "disabled" , true );
};
/** -------------------------------------
 *      MOSTRAR COMBINACIONES DE TECLAS
 ** ------------------------------------- */
showCombinacion = ( t ) => {
    $( "#modalCombinacion" ).modal( "show" );
};

/** -------------------------------------

 *      COPIAR IMAGEN

 ** ------------------------------------- */

copy = ( t , url ) => {
    $temp = $( `<input>` );
    $( `body` ).append( $temp );
    $temp.val( url ).select();
    document.execCommand( "copy" );
    $temp.remove();
    Toast.fire({
        icon: 'success',
        title: 'URL de imagen copiada'
    });
};

/** -------------------------------------

 *      ELIMINAR REGISTRO

 ** ------------------------------------- */
erase = ( t , id ) => {
    window.pyrus.delete( t , { title : "ATENCIÓN" , body : "¿Eliminar registro?" } , `${url_simple}/adm/${window.pyrus.name}/delete` , id );
};
/** -------------------------------------
 *      LIMPIAR FORMULARIO
 ** ------------------------------------- */
remove = t => {
    $('[data-toggle="tooltip"]').tooltip('hide');
    if($( "#formModal .no--send" ).length) {
        window.pyrus.clean( CKEDITOR );
        $( "#formModal" ).modal( "hide" );
    } else {
        Swal.fire({
            title: '¿Cerrar sin guardar registro?',
            text: "Perderá la información añadida",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then( ( result ) => {
            if ( result.value ) {
                window.pyrus.clean( CKEDITOR );
                if( $( "#formModal" ).length )
                    $( "#formModal" ).modal( "hide" );
                add( $( "#btnADD" ) );
            }
        })
    }
};
removeImage = ( t ) => {
    let button = $( t );
    let id = button.prop( "id" );
    id = id.replace( "_button" , "" );
    $( `#${id}` ).val( "" );
    id = `src-${id}`;
    $( `#${id}` ).prop( `src` , $( `#${id}` ).data( "src" ) );
    $( `#${id}-2` ).prop( `src` , $( `#${id}-2` ).data( "src" ) );
    button.prop( `disabled` , true );
};
removeFile = ( t ) => {
    let button = $( t );
    let content = button.closest( ".input-group" );

    content.find( "input" ).val( "" );
};
/** -------------------------------------
 *      MODO TEST: QUITAR ELEMENTO
 ** ------------------------------------- */
remove_ = ( t , class_ ) => {
    let target =  $( t ).closest( `.${class_}` );
    Swal.fire({
        title: "Atención!",
        text: "¿Eliminar elemento?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: '<i class="fas fa-check"></i> Confirmar',
        confirmButtonAriaLabel: 'Confirmar',
        cancelButtonText: '<i class="fas fa-times"></i> Cancelar',
        cancelButtonAriaLabel: 'Cancelar'
    }).then( ( result ) => {
        if ( result.value ) {
            if( window.imgDelete === undefined )
                window.imgDelete = [];
            if( target.find( ".imgURL" ).val() != "" )
                window.imgDelete.push( target.find( ".imgURL" ).val() );
            target.remove();
            Toast.fire({
                icon: 'warning',
                title: 'Debe guardar el contenido para ver los cambios'
            })
        }
    });
};
/** -------------------------------------
 *      EDITAR REGISTRO
 ** ------------------------------------- */
edit = (t, id, disabled = 0) => {
    $(t).prop("disabled", true);
    window.pyrus.one( `${url_simple}/adm/${window.pyrus.name}/${id}/edit`, function( res ) {
        $('[data-toggle="tooltip"]').tooltip('hide');
        $(t).prop("disabled", false);
        add($("#btnADD"), parseInt(id), res.data, disabled);
    });
};
see = (t, id) => {
    edit(t, id, 1);
};
/** -------------------------------------
 *      PREVIEW DE IMAGEN
 ** ------------------------------------- */
readURL = (t, id) => {
    const img = document.querySelector(`#${id}`);
    if (t.files && t.files[0]) {
        let reader = new FileReader();
        reader.onload = ( e ) => {
            img.src = e.target.result;
            img.classList.add("image--upload__validate");
            t.parentElement.classList.add("image--upload__not-empty")
            t.nextSibling.dataset.name = t.files[0].name;
        };
        reader.readAsDataURL(t.files[0]);
    } else {
        img.src = "";
        img.classList.remove("image--upload__validate");
        t.parentElement.classList.remove("image--upload__not-empty")
        t.nextSibling.dataset.name = "No se selccionó ningún archivo";
    }
};
/** -------------------------------------
 *      CHECKBOX
 ** ------------------------------------- */
check = input => {
    if (input.checked)
        input.nextSibling.value = 1;
    else
        input.nextSibling.value = 0;
};
/** -------------------------------------
 *      GUARDAR ELEMENTO
 ** ------------------------------------- */
formSave = ( t , formData , message = { wait : "Espere. Guardando contenido" , err: "Ocurrió un error en el guardado. Reintente" , catch: "Ocurrió un error en el guardado." , success : "Contenido guardado" } , callback = null ) => {
    let url = t.action;
    let method = t.method;
    if (!verificarForm())
        return null;
    //method = (method == "GET" || method == "get") ? "post" : method;
    if (window.formAction === "UPDATE")
        method = "POST";
    $( "body > .wrapper" ).addClass( "isDisabled" );
    window.Arr_aux = [];
    /*if (CKEDITOR) {
        for(let x in CKEDITOR.instances) {
            let aux = x.split("_");
            let last = aux.pop();
            if(isNaN(last))
                formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
            else {
                if(window.Arr_aux.indexOf(aux.join("_")) < 0) {
                    window.Arr_aux.push(aux.join("_"));
                    formData.set(`${aux.join("_")}[]`, CKEDITOR.instances[`${x}`].getData());
                } else
                    formData.append(`${aux.join("_")}[]`, CKEDITOR.instances[`${x}`].getData());
            }
        }
    }*/
    Toast.fire({
        icon: 'warning',
        title: message.wait
    })
    if( window.imgDelete !== undefined )
        formData.append( "REMOVE" , JSON.stringify( window.imgDelete ) );
    axios({
        method: method,
        url: url,
        data: formData,
        responseType: 'json',
        config: { headers: {'Content-Type': 'multipart/form-data' }}
    })
    .then((res) => {
        if( callback === null ) {
            if(res.data.error === 0) {
                Toast.fire({
                    icon: 'success',
                    title: message.success
                })
                location.reload();
            } else if (res.data.msg) {
                $( "body > .wrapper" ).removeClass( "isDisabled" );
                Toast.fire({
                    icon: 'error',
                    title: res.data.msg
                })
            } else  {
                $( "body > .wrapper" ).removeClass( "isDisabled" );
                Toast.fire({
                    icon: 'error',
                    title: message.err
                })
            }
        } else {
            callback.call( this , res.data );
        }
    })
    .catch((err) => {
        $( "body > .wrapper" ).removeClass( "isDisabled" );
        console.error( `ERROR en ${url}` );
        alertify.error( message.catch );
    })
    .then(() => {});
};

verificarForm = () => {
    if (!Array.isArray(window.pyrus)) {
        if( window.pyrus.objeto.NECESARIO !== undefined ) {
            flag = 0;
            alert = "";
            for( let x in window.pyrus.objeto.NECESARIO ) {
                if( window.pyrus.objeto.NECESARIO[ x ][ window.formAction ] !== undefined ) {
                    if( $(`#${window.pyrus.name}_${x}`).length) {
                        if( $(`#${window.pyrus.name}_${x}`).is( ":invalid" ) || $(`#${window.pyrus.name}_${x}`).val() == "" ) {
                            if( alert != "" )
                                alert += ", ";
                            alert += window.pyrus.especificacion[ x ].NOMBRE;
                            flag = 1;
                        }
                    }
                }
            }
            if( flag ) {
                Swal.fire(
                    'Atención',
                    `Complete los siguientes campos: ${alert}`,
                    'error'
                )
                return false;
            }
            return true;
        }
    } else {
        flag = 0;
        let alert = "";
        window.pyrus.forEach(p => {
            if( p.entidad.objeto.NECESARIO !== undefined ) {
                for( let x in p.entidad.objeto.NECESARIO ) {
                    if( p.entidad.objeto.NECESARIO[ x ][ window.formAction ] !== undefined ) {
                        if( $(`#${p.entidad.name}_${x}`).is( ":invalid" ) || $(`#${p.entidad.name}_${x}`).val() == "" ) {
                            if( alert != "" )
                                alert += ", ";
                            alert += p.entidad.especificacion[ x ].NOMBRE;
                            flag = 1;
                        }
                    }
                }
                if( flag )
                    Swal.fire(
                        'Atención',
                        `Complete los siguientes campos: ${alert}`,
                        'error'
                    )
            }
        });
        if( flag )
            return false;
    }
    return true
};
/** -------------------------------------
 *      OBJETO A GUARDAR
 ** ------------------------------------- */
formSubmit = t => {
    let idForm = t.id;
    let formElement = document.getElementById( idForm );
    let formData = new FormData( formElement );
    let Arr = [];
    if (Array.isArray(window.pyrus)) {
        window.pyrus.forEach(p => {
            let target = document.querySelector(`.form_${p.entidad.entidad}`);
            if (target) {
                let aux = {};
                aux["DATA"] = p.entidad.objetoSimple;
                aux["TIPO"] = p.tipo;
                if (p.column)
                    aux["COLUMN"] = p.column;
                if (p.tag)
                    aux["TAG"] = p.tag;
                if (p.key)
                    aux["KEY"] = p.key;
                Arr.push(aux);
            }
        });
    } else
        Arr.push({ DATA: window.pyrus.objetoSimple , TIPO: "U" });
    formData.append("ATRIBUTOS",JSON.stringify(Arr));

    formSave( t , formData );
};

searchTable = ( t ) => {
    let idForm = t.id;
    let formElement = document.getElementById( idForm );
    let formData = new FormData( formElement );
    let url = t.action;
    let method = t.method;

    axios({
        method: method,
        url: url,
        data: formData,
        responseType: 'json',
        config: { headers: {'Content-Type': 'multipart/form-data' }}
    })
    .then((res) => {
        if( callback === null ) {
            if(parseInt(res.data) == 1) {
                alertify.success( message.success );
            } else  {
                $( "body > .wrapper" ).removeClass( "isDisabled" );
                alertify.error( message.err );
            }
        } else {
            callback.call( this , res.data );
        }
    })
    .catch((err) => {
    })
    .then(() => {});
};
/** -------------------------------------
 *      ABRIR FORMULARIO
 ** ------------------------------------- */
add = (t, id = 0, data = null, disabled = 0) => {
    let label = document.querySelector("#formModalLabel");
    let form = document.querySelector("#form");
    if (disabled) {
        let form_control = form.querySelectorAll(".form-control");
        Array.prototype.forEach.call(form_control, f => {
            f.disabled = true;
        });
        label.textContent = "Ver elemento";
        if ($("#form .select__2").length)
            $("#form .select__2").selectpicker('destroy');
        form.classList.add("no--send");
    } else {
        let form_control = form.querySelectorAll(".form-control");
        Array.prototype.forEach.call(form_control, f => {
            f.disabled = false;
        });
        let action = `${url_simple}/adm/${window.pyrus.name}`;
        let method = "POST";
        form.classList.remove("no--send");
        if ($("#form .select__2").length)
            $("#form .select__2").selectpicker('refresh');
        window.formAction = "CREATE";
        window.elementData = data;
        if (label)
            label.textContent = "Nuevo elemento";
        if(id != 0) {
            if (label)
                label.textContent = "Editar elemento";
            action = `${url_simple}/adm/${window.pyrus.name}/update/${id}`
            method = "PUT";
            form.dataset.id = id;
            window.formAction = "UPDATE";
        }
        form.action = action;
        form.method = method;
    }
    window.pyrus.show(url_simple, data);
    $( "#formModal" ).modal( "show" );
    addfinish( data );
};
addfinish = ( data = null ) => {};
/** -------------------------------------
 *      ELIMINAR ARCHIVO
 ** ------------------------------------- */
removeFile = (t) => {
    deleteFile(t, `${url_simple}/adm/file`, "¿Eliminar archivo de imagen?", {file: t.dataset.url, entidad: t.dataset.entidad, attr: t.dataset.attr, id: t.dataset.id}, data => {
        if (data.error === 0) {
            t.parentElement.previousElementSibling.src = "";
            let details = t.parentElement.previousElementSibling.previousElementSibling.querySelectorAll(".image--wh__details");
            Array.prototype.forEach.call(details, d => d.remove());
            Toast.fire({
                icon: 'success',
                title: data.msg
            })
        } else {
            Toast.fire({
                icon: 'error',
                title: data.msg
            })
        }
    });
};
deleteFile = (t, url, txt, data, callbackOK = null) => {
    t.disabled = true;
    Swal.fire({
        title: "Atención!",
        text: txt,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: '<i class="fas fa-check"></i> Confirmar',
        confirmButtonAriaLabel: 'Confirmar',
        cancelButtonText: '<i class="fas fa-times"></i> Cancelar',
        cancelButtonAriaLabel: 'Cancelar'
    }).then( ( result ) => {
        if ( result.value ) {
            axios.delete( url, {
                data: data
            })
            .then(res => {
                if (callbackOK)
                    callbackOK.call(this, res.data);
                else {
                    t.disabled = false;
                    if(res.data.error === 0) {
                        Toast.fire({
                            icon: 'success',
                            title: res.data.msg
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: res.data.msg
                        })
                    }
                }
            })
            .catch(( err ) => {
                alertify.error( "Ocurrió un error" );
                t.disabled = false;
                console.error(err);
                console.error( `ERROR en ${url}` );
            })
            .then(() => {});
        } else
            t.disabled = false;
    });
};
/** -------------------------------------
 *      COMBINACIÓN DE TECLAS
 ** ------------------------------------- */
shortcut.add( "Alt+Ctrl+S" , function () {
    const form = document.querySelector("#form");
    if (form)
        form.requestSubmit();
}, {
    type: "keydown",
    propagate: true,
    target: document
});
shortcut.add( "Alt+Ctrl+N" , function () {
    if( $( "#btnADD" ).length ) {
        if( !$( "#form" ).is( ":visible" ) )
            $( "#btnADD" ).click();
        else
            remove( null );
    }
}, {
    type: "keydown",
    propagate: true,
    target: document
});
shortcut.add( "Alt+Ctrl+Q" , function () {
    window.location = `${url_simple}/adm/url`;
}, {
    type: "keydown",
    propagate: true,
    target: document
});
/** -------------------------------------
 *      INICIO
 ** ------------------------------------- */

function elementFocus(evt) {
    this.previousElementSibling.classList.add("form--label__active");
}
function elementBlur(evt) {
    this.previousElementSibling.classList.remove("form--label__active");
}
function editable(evt) {
    this.contentEditable = true;
}
function editableSave(evt) {
    this.contentEditable = false;
    let formData = new FormData();
    formData.set("table", this.dataset.name);
    formData.set("key", this.dataset.column);
    formData.set("value", this.textContent);
    formData.set("id", this.dataset.id);
    axios({
        method: "post",
        url: `${url_simple}/adm/edit`,
        data: formData,
        responseType: 'json',
        config: { headers: {'Content-Type': 'multipart/form-data' }}
    })
    .then((res) => {
        if(res.data.error === 0) {
            Toast.fire({
                icon: 'success',
                title: 'Guardado'
            })
        } else  {
            Toast.fire({
                icon: 'error',
                title: 'Error'
            })
        }
    })
    .catch((err) => {
        console.error( `ERROR en ${url}` );
        alertify.error( "Error" );
    })
    .then(() => {});
}

init = (callbackOK, normal = true, widthElements = true, type = "table", withAction = true) => {
    let targetForm = document.querySelector(".pyrus--form");
    let targetElements = document.querySelector("#wrapper-tabla");
    if (Array.isArray(window.pyrus)) {
        window.pyrus.forEach(p => {
            targetForm.innerHTML += p.entidad.formulario();
            const target = document.querySelector(`.form_${p.entidad.entidad}`);
            if (target) {
                const ck = target.querySelector(".ckeditor");
                if (ck) {
                    setTimeout(() => {
                        p.entidad.editor();
                    }, 500);
                }
            }
        });
    } else {
        let btn = [];
        targetForm.innerHTML = window.pyrus.formulario();
        const ck = document.querySelector(".ckeditor");
        if (ck)
            window.pyrus.editor();
        if (normal) {
            if (withAction) {
                targetElements.innerHTML = window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] );
                btn = ["e" , "d"];
            } else
                targetElements.innerHTML = window.pyrus.table();
            window.pyrus.editor( CKEDITOR );
            if (widthElements) {
                if (type == "table") {
                    window.pyrus.elements("#tabla" , url_simple, window.data.elementos, btn);
                    //---------------------
                    const spans = document.querySelectorAll(".edit");
                    if (spans.length > 0) {
                        Array.prototype.forEach.call(spans, span => {
                            span.addEventListener("dblclick", editable);
                            span.addEventListener("blur", editableSave);
                        })
                    }
                } else
                    targetElements.innerHTML = window.pyrus.card(url_simple, window.data.elementos, ["e", "d"]);
            }
        }
    }
    callbackOK.call(this, [targetForm, targetElements]);
};