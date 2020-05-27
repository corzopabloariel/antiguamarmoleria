/**
 * @date 12.2019
 * @last_change 17.12.2019
 * @version 0.3.2.0
 **/

const colorPick = "4f9232,808080,111111,191919,fbfb34,a6a6a6,343a40,86008f";
const max_size_file = 2;
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
changeColor = (t, type) => {
    const target = t.closest(".pyrus--color");
    const value = t.value;
    target.querySelector(`[type="${type}"]`).value = value;

    let rgb = hexToRgb($(t).val());
    let color = new Color(rgb[0], rgb[1], rgb[2]);
    let solver = new Solver(color);
    let result = solver.solve();
    target.nextElementSibling.value = result.filter;
};
hexToRgb = ( hex ) => {
    const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, (m, r, g, b) => {
        return r + r + g + g + b + b;
    });

    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result
        ? [
        parseInt(result[1], 16),
        parseInt(result[2], 16),
        parseInt(result[3], 16),
        ]
        : null;
}
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
    const entidad = Array.isArray(window.pyrus) ? window.pyrus[0].entidad : window.pyrus;
    entidad.delete( t , { title : "ATENCIÓN" , body : "¿Eliminar registro?" } , `${url_simple}/adm/${entidad.name}/delete` , id );
};
/** -------------------------------------
 *      LIMPIAR FORMULARIO
 ** ------------------------------------- */
remove = t => {
    const entidad = Array.isArray(window.pyrus) ? window.pyrus[0].entidad : window.pyrus;
    $('[data-toggle="tooltip"]').tooltip('hide');
    if($( "#formModal .no--send" ).length) {
        entidad.clean();
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
                entidad.clean();
                if( $( "#formModal" ).length )
                    $( "#formModal" ).modal( "hide" );
                add( $( "#btnADD" ) );
            }
        })
    }
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
    }).then(result => {
        if (result.value) {
            if (window.formAction === "UPDATE") {
                if (!window.imgDelete)
                    window.imgDelete = [];
                if (target.find( ".imgURL" ).val() != "")
                    window.imgDelete.push( target.find( ".imgURL" ).val() );
                target.remove();
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe guardar el contenido para ver los cambios'
                })
            }
        }
    });
};
/** -------------------------------------
 *      EDITAR REGISTRO
 ** ------------------------------------- */
edit = (t, id, disabled = 0) => {
    const entidad = Array.isArray(window.pyrus) ? window.pyrus[0].entidad : window.pyrus;
    t.disabled = true
    entidad.one(`${url_simple}/adm/${entidad.name}/${id}/edit`, res => {
        $('[data-toggle="tooltip"]').tooltip('hide');
        t.disabled = false;
        add($("#btnADD"), parseInt(id), res.data, disabled);
    });
};
clone = (t, id, disabled = 0) => {
    const entidad = Array.isArray(window.pyrus) ? window.pyrus[0].entidad : window.pyrus;
    t.disabled = true
    entidad.one(`${url_simple}/adm/${entidad.name}/${id}/edit`, res => {
        $('[data-toggle="tooltip"]').tooltip('hide');
        t.disabled = false;
        add($("#btnADD"), parseInt(id), res.data, disabled, true);
    });
};
see = (t, id) => {
    edit(t, id, 1);
};
/** -------------------------------------
 *      PREVIEW DE IMAGEN
 ** ------------------------------------- */
function readURL(t, id) {
    const img = document.querySelector(`#${id}`);
    if (t.files && t.files[0]) {
        let reader = new FileReader();
        reader.onload = ( e ) => {
            const size = Math.round(t.files[0].size / 1024 /1024);
            if (max_size_file < size) {
                img.src = "";
                img.classList.remove("image--upload__validate");
                t.parentElement.classList.remove("image--upload__not-empty");
                t.parentElement.classList.add("image--upload__no-validate");
                t.nextSibling.dataset.name = `El archivo supera el máximo permitido ${max_size_file}MB`;
                return null;
            }
            img.src = e.target.result;
            img.classList.add("image--upload__validate");
            t.parentElement.classList.add("image--upload__not-empty");
            t.nextSibling.dataset.name = `${t.files[0].name} ~ ${size}MB`;
        };
        reader.readAsDataURL(t.files[0]);
    } else {
        img.src = "";
        img.classList.remove("image--upload__validate");
        t.parentElement.classList.remove("image--upload__not-empty");
        t.nextSibling.dataset.name = "No se selccionó ningún archivo";
    }
    t.parentElement.classList.remove("image--upload__no-validate");
}
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
formSave = (t, formData, message = { wait : "Espere. Guardando contenido" , err: "Ocurrió un error en el guardado. Reintente" , catch: "Ocurrió un error en el guardado." , success : "Contenido guardado" }, callback = null ) => {
    let url = t.action;
    let method = t.method;
    if (!verificarForm())
        return null;
    //method = (method == "GET" || method == "get") ? "post" : method;
    if (window.formAction === "UPDATE")
        method = "POST";
    $( "body > .wrapper" ).addClass( "isDisabled" );
    window.Arr_aux = [];
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
    formSave(t, formData);
}

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
add = (t, id = 0, data = null, disabled = 0, clone = false) => {
    const entidad = Array.isArray(window.pyrus) ? window.pyrus[0].entidad : window.pyrus;
    let label = document.querySelector("#formModalLabel");
    let form = document.querySelector("#form");
    let action = `${url_simple}/adm/${entidad.name}`;
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
        let method = "POST";
        form.classList.remove("no--send");
        if ($("#form .select__2").length)
            $("#form .select__2").selectpicker('refresh');
        window.formAction = "CREATE";
        window.elementData = data;
        if (label)
            label.textContent = "Nuevo elemento";
        if(id != 0) {
            if (!clone) {
                if (label)
                    label.textContent = "Editar elemento";
                action += `/update/${id}`;
                method = "PUT";
                form.dataset.id = id;
                window.formAction = "UPDATE";
            } else
                window.formAction = "CLONE";
        }
        form.action = action;
        form.method = method;
    }
    if (Array.isArray(window.pyrus))
        window.pyrus.forEach(e => e.entidad.show(url_simple, data));
    else
        entidad.show(url_simple, data);
    $( "#formModal" ).modal( "show" );
    addfinish( data );
};
addfinish = ( data = null ) => {};
/** -------------------------------------
 *      ELIMINAR ARCHIVO
 ** ------------------------------------- */
removeFile = (t) => {
    const attr = {
        file: t.dataset.url,
        entidad: t.dataset.entidad,
        attr: t.dataset.attr,
        column: t.dataset.column ? t.dataset.column : null,
        id: t.dataset.id ? t.dataset.id : null,
        tabla: t.dataset.table,
        idPadre: window.data.elementos.id
    };
    deleteFile(t, `${url_simple}/adm/file`, "¿Eliminar archivo de imagen?", attr, data => {
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
    }, err => {
        console.error(err)
    });
};
deleteFile = (t, url, txt, data, callbackOK = null, callbackFail = null) => {
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
            .catch(err => {
                if (callbackFail) {
                    callbackFail.call(this, res);
                    return null;
                }
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
        formSubmit(form)
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
function getPosition(el) {
    var xPos = 0;
    var yPos = 0;
    while (el) {
        if (el.tagName == "BODY") {
            var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
            var yScroll = el.scrollTop || document.documentElement.scrollTop;
            xPos += (el.offsetLeft - xScroll + el.clientLeft);
            yPos += (el.offsetTop - yScroll + el.clientTop);
        } else {
            xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
            yPos += (el.offsetTop - el.scrollTop + el.clientTop);
        }
        el = el.offsetParent;
    }
    return {
        x: xPos,
        y: yPos
    };
}


function elementFocus(evt) {
    this.previousElementSibling.classList.add("form--label__active");
}
function elementBlur(evt) {
    this.previousElementSibling.classList.remove("form--label__active");
}
function saveEdit(t) {
    t.disabled = true;
    let formData = new FormData(t.parentElement.previousElementSibling);
    formData.append("table", t.dataset.table);
    formData.append("key", t.dataset.key);
    formData.append("id", t.dataset.id);
    formData.append("ATRIBUTOS",JSON.stringify([{ DATA: window.entidad_eventual.objetoSimple , TIPO: "U" }]));
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
            });
            columna = window.entidad_eventual.columnas().find(c => {
                if(c.COLUMN == t.dataset.key)
                    return c;
            });
            let td = document.createElement("td");
            td.style.maxWidth = "500px";
            window.td_eventual.innerHTML = window.entidad_eventual.convert(res.data.obj[t.dataset.key], td, url_simple, window.entidad_eventual.especificacion[t.dataset.key].TIPO, window.entidad_eventual.especificacion[t.dataset.key], null, columna).innerHTML;
            const edit__check = window.td_eventual.querySelectorAll(".edit--check");
            if (edit__check.length > 0) {
                Array.prototype.forEach.call(edit__check, e => {
                    e.addEventListener("click", editCheck);
                })
            }
            removeEdit(t);
            //location.reload();
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
function removeEdit(t) {
    let e = t.closest(".pyrus--edit__check");
    e.remove();
    delete window.entidad_eventual;
    delete window.td_eventual;
}
function editCheck(evt) {
    let e = document.querySelector(".pyrus--edit__check");
    if (e)
        e.remove();
    const td = this.closest("td");
    const pos = getPosition(td);
    const w = td.cellIndex === 0 ? (td.offsetWidth * -1) : 250;
    let name = this.dataset.name;
    let column = this.dataset.column;
    let value = this.dataset.value;
    let div = document.createElement("div");
    let entidad = null;
    if (Array.isArray(window.pyrus))
        entidad = window.pyrus.find(e => {
            if(e.entidad.name == name)
                return e;
        }).entidad;
    else
        entidad = window.pyrus;
    window.entidad_eventual = entidad;
    window.td_eventual = this.closest("td");
    div.classList.add("p-2", "pyrus--edit__check", "shadow")
    div.setAttribute("style", `left: calc(${pos.x}px - ${w}px); top: ${pos.y}px`);
    div.innerHTML = '<h3 class="pyrus--edit__title">Edición del campo<button type="button" class="close" onclick="removeEdit(this);"><span aria-hidden="true">&times;</span></button></h3>';
    div.innerHTML += `<form onsubmit="event.preventDefault();">${entidad.elementForm(column, value)}</form>`;
    div.innerHTML += `<div class="d-flex justify-content-end border-top mt-2 pt-2"><button onclick="saveEdit(this);" data-table="${this.dataset.name}" data-key="${this.dataset.column}" data-id="${this.dataset.id}" class="btn btn-sm button--form btn-primary" type="button"><i class="fas fa-save"></i></button></div>`;
    document.querySelector("body").appendChild(div);
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

init = (callbackOK, normal = true, widthElements = true, type = "table", withAction = true, btn = ["e" , "d"]) => {
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
        if (normal) {
            if (withAction)
                targetElements.innerHTML = window.pyrus[0].entidad.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] );
            else {
                btn = [];
                targetElements.innerHTML = window.pyrus[0].entidad.table();
            }
            window.pyrus[0].entidad.editor();
            if (widthElements) {
                if (type == "table")
                    window.pyrus[0].entidad.elements("#tabla" , url_simple, window.data.elementos, btn);
                else
                    targetElements.innerHTML = window.pyrus[0].entidad.card(url_simple, window.data.elementos, btn);
            }
        }
    } else {
        targetForm.innerHTML = window.pyrus.formulario();
        const ck = document.querySelector(".ckeditor");
        if (ck)
            window.pyrus.editor();
        if (normal) {
            if (withAction)
                targetElements.innerHTML = window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] );
            else {
                btn = [];
                targetElements.innerHTML = window.pyrus.table();
            }
            window.pyrus.editor();
            if (widthElements) {
                if (type == "table")
                    window.pyrus.elements("#tabla" , url_simple, window.data.elementos, btn);
                else
                    targetElements.innerHTML = window.pyrus.card(url_simple, window.data.elementos, btn);
            }
        }
    }
    //---------------------
    const edit__text = document.querySelectorAll(".edit");
    const edit__check = document.querySelectorAll(".edit--check");
    if (edit__text.length > 0) {
        Array.prototype.forEach.call(edit__text, e => {
            e.addEventListener("dblclick", editable);
            e.addEventListener("blur", editableSave);
        })
    }
    if (edit__check.length > 0) {
        Array.prototype.forEach.call(edit__check, e => {
            e.addEventListener("click", editCheck);
        })
    }
    callbackOK.call(this, [targetForm, targetElements]);
};