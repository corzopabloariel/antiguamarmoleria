/**
 * ----------------------------------------
 *              CONSIDERACIONES
 * ---------------------------------------- */
/**
 * Las entidades nombradas a continuación tienen referencia con una tabla de la BASE DE DATOS.
 * Respetar el nombre de las columnas
 *
 * @version 2
 */
const ENTIDADES = {
    slider: {
        //TABLE: "sliders",
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING",RULE: "nullable|max:3",LABEL:1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",WIDTH:"70px",NOMBRE:"orden", HELP: "Orden alfanumérico. Máximo 3 caracteres."},
            image: {TIPO:"TP_IMAGE", EXT: 'jpeg, png, jpg, gif', SIZE: '2MB',RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"sliders",SIMPLE:1,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"1400px", HEIGHTop:"650px", HELP: "Respete las medidas detalladas o idénticas para que el slider no se vea afectado"},
            section: {TIPO:"TP_STRING",RULE: "required|max:20",VISIBILIDAD:"TP_INVISIBLE",NOMBRE:"sección", NECESARIO: 1},
            text: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto", LABEL: 1}
        },
        FORM: [
            {
                '/section/<div class="col-md-6">/order/</div>':['section','order'],
            },
            {
                '<div class="col-12">/image/</div>': ['image']
            },
            {
                '<div class="col-12">/text/</div>': ['text']
            }
        ],
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                colorButton_colors : colorPick,
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About'
            }
        },
    },
    cliente: {
        TABLE: "clientes",
        ATRIBUTOS: {
            provincia_id: {TIPO:"TP_ENUM",VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"selectpicker",ENUMOP:"provincias",NOMBRE:"Provincia",COMUN:1},
            localidad_id: {TIPO:"TP_ENUM",VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"selectpicker",ENUMOP:"localidades",NOMBRE:"Localidad",COMUN:1,DISABLED:1},
            cuit: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0 text-right",NOMBRE:"c.u.i.t.",LABEL:1},
            nrodni: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0 text-right",NOMBRE:"nro. doc.",LABEL:1},
            cliente: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0 text-right",NOMBRE:"cliente",LABEL:1},
            nombre: {TIPO:"TP_STRING",MAXLENGTH:120,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            direccion: {TIPO:"TP_STRING",MAXLENGTH:200,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"dirección",LABEL:1},
            telefono1: {TIPO:"TP_STRING",MAXLENGTH:200,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"teléfono #1",LABEL:1},
            telefono2: {TIPO:"TP_STRING",MAXLENGTH:200,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"teléfono #2",LABEL:1},
            telefono3: {TIPO:"TP_STRING",MAXLENGTH:200,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"teléfono #3",LABEL:1},
            email: {TIPO:"TP_EMAIL",MAXLENGTH:200,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"email #1",LABEL:1},
            email2: {TIPO:"TP_EMAIL",MAXLENGTH:200,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"email #2",LABEL:1},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-5">/provincia_id/</div><div class="col-12 col-md-6 col-lg-5">/localidad_id/</div>':['provincia_id','localidad_id']
            },
            {
                '<div class="col-12">/direccion/</div>':['direccion']
            },
            {
                '<div class="col-12">/nombre/</div>':['nombre']
            },
            {
                '<div class="col-12 col-md-4">/cliente/</div><div class="col-12 col-md-4">/cuit/</div><div class="col-12 col-md-4">/nrodni/</div>':['cliente','cuit','nrodni'],
            },
            {
                '<div class="col-12 col-md">/email/</div><div class="col-12 col-md">/email2/</div>':['email','email2'],
            },
            {
                '<div class="col-12 col-md-6 col-lg-4">/telefono1/</div><div class="col-12 col-md-6 col-lg-4">/telefono2/</div><div class="col-12 col-md-6 col-lg-4">/telefono3/</div>':['telefono1','telefono2','telefono3'],
            }
        ],
        FUNCIONES: {
            provincia_id: { onchange: "localidades( this );" }
        }
    },
    marca: {
        TABLE: "marcas",
        ATRIBUTOS: {
            name: {TIPO:"TP_STRING",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"marca"},
            image: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Imagen - 60x60",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"60px",WIDTHTABLE:"120px", SIMPLE: 1},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-5">/name/</div>':['name']
            },
            {
                '<div class="col-12 col-md-6">/image/</div>':['image']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    modelo: {
        TABLE: "modelos",
        ATRIBUTOS: {
            name: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"Modelo"},
            marca_id: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_INVISIBLE",NOMBRE:"Marca",COMUN:1},
        },
        FORM: [
            {
                '/marca_id/<div class="col-12 col-md-6 col-lg-5">/name/</div>':['marca_id','name']
            },
        ],
    },
    automovil: {
        TABLE: "automoviles",
        ATRIBUTOS: {
            marca_id: {TIPO:"TP_ENUM",RELACION:"marcas",RELACIONNAME:"name",VISIBILIDAD:"TP_VISIBLE",ENUMOP:"marcas",NOMBRE:"Marca",COMUN:1},
            modelo_id: {TIPO:"TP_ENUM",RELACION:"modelos", DISABLED: 1, CLASS:"selectpicker",RELACIONNAME:"name",VISIBILIDAD:"TP_VISIBLE",ENUMOP:"modelos",NOMBRE:"Modelo",COMUN:1, NOT_TRIGGER: 1},
            version: {TIPO:"TP_STRING",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"alimentación",LABEL:1},
            combustible: {TIPO:"TP_STRING",MAXLENGTH:5,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            motor: {TIPO:"TP_FLOAT",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"Versión",LABEL:1},
            puertas: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            anio: {TIPO:"TP_LIST",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"Año",LABEL:1 },
            //"0km": {TIPO:"TP_ENUM",ENUM:{false:"No", true:"Si"},VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"0 KM",CLASS:"border-left-0 border-top-0 border-right-0"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-5">/marca_id/</div><div class="col-12 col-md-6 col-lg-5">/modelo_id/</div>':['marca_id','modelo_id']
            },
            {
                '<div class="col-12 col-md-6">/combustible/</div><div class="col-12 col-md-6">/version/</div>':['combustible','version']
            },
            {
                '<div class="col-12 col-md-6">/motor/</div><div class="col-12 col-md-6">/puertas/</div>':['motor','puertas']
            },
            {
                '<div class="col-12 col-md-6">/anio/</div>':['anio'],
            },
        ],
        FUNCIONES: {
            marca_id: { onchange: "marcamodelos( this );" }
        }
    },

    poliza_file: {
        ATRIBUTOS: {
            file: {TIPO:"TP_FILE",FOLDER:"poliza",NECESARIO:1,VALID:"Ficha seleccionada",INVALID:"Seleccione archivo",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/jpeg,application/pdf",NOMBRE:"Archivo",WIDTH:"190px",SIMPLE:1},
            enviar: {TIPO:"TP_CHECK",CHECK:"Enviar / Archivo enviado",VISIBILIDAD:"TP_VISIBLE_TABLE",COMUN:1,DEFAULT:1},
        },
        FORM: [
            {
                '<div class="col-12">/file/</div>':['file']
            },
        ]
    },
    poliza: {
        TABLE: "polizas",
        ATRIBUTOS: {
            compania: {TIPO:"TP_STRING",MAXLENGTH:200,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"compañia",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            poliza: {TIPO:"TP_STRING",MAXLENGTH:30,LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            seccion: {TIPO:"TP_STRING",MAXLENGTH:80,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"sección",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            cliente: {TIPO:"TP_ENTERO",VISIBILIDAD:"TP_INVISIBLE",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            cliente_id: {TIPO:"TP_ENUM",LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"selectpicker",NOMBRE:"Cliente"},
            desde: {TIPO:"TP_DATE",LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0", NOMBRE:"VIGENCIA DESDE",FORMAT:[ "dd" , "/" , "mm" , "/" , "aaaa" ]},
            hasta: {TIPO:"TP_DATE",LABEL:1,VISIBILIDAD:"TP_VISIBLE_FORM",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0", NOMBRE:"VIGENCIA HASTA",FORMAT:[ "dd" , "/" , "mm" , "/" , "aaaa" ]},
            file: {TIPO:"TP_ARRAY",COLUMN:"file",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Archivos",CLASS:"text-center"}
        },
        FORM: [
            {
                '<div class="col-12">/compania/</div>':['compania']
            },
            {
                '<div class="col-12 col-md-6">/poliza/</div><div class="col-12 col-md-6">/seccion/</div>':['poliza','seccion']
            },
            {
                '<div class="col-12">/cliente_id/</div>':['cliente_id']
            },
            {
                '<div class="col-12 col-md-6">/desde/</div><div class="col-12 col-md-6">/hasta/</div>':['desde','hasta']
            }
        ]
    },
    contenido_home: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"título",LABEL:1},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
            fondo: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048", FOLDER: "contenido",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Fondo - 574x174",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"574px", SIMPLE: 1},
            email: {TIPO:"TP_EMAIL",MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1},
            icon: {TIPO:"TP_STRING",MAXLENGTH:30,CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",VISIBILIDAD:"TP_VISIBLE",LABEL:1,NOMBRE:"ícono"},
            telefono: {TIPO:"TP_PHONE",MAXLENGTH:40,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",LABEL:1,NOMBRE:"teléfono"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-5">/fondo/</div><div class="col-12 col-md-7"><div class="row"><div class="col-12">/titulo/</div><div class="col-12 mt-3">/texto/</div></div></div>' : ['texto','fondo','titulo']
            },
            {

                '<div class="col-12 col-md-4">/email/</div><div class="col-12 col-md-4">/icon/</div><div class="col-12 col-md-4">/telefono/</div>': ['email','icon','telefono']
            }
        ],
        FUNCIONES: {
            fondo: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '120px'
            }
        }
    },
    contenido_home_icono_txt: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 bg-transparent border-right-0 border-top-0 rounded-0",NOMBRE:"título",LABEL:1},
        },
        FORM: [
            {
                '<div class="col-12">/titulo/</div>' : ['titulo']
            }
        ]
    },
    contenido_home_icono: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",LABEL: 1,CLASS:"border-left-0 rounded-0 bg-transparent border-right-0 border-top-0",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",SIMPLE:1},
            titulo: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",CLASS:"rounded-0 bg-transparent border-top-0 border-left-0 border-right-0",NOMBRE:"título"},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Seleccione archivo - 58x58",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"58px"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto",HEIGHT:"250px",CLASS:"d-none"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>': ['order']
            },
            {
                '<div class="col-12">/titulo/</div>' : ['titulo']
            },
            {
                '<div class="col-12">/image/</div>': ['image']
            },
            {
                '<div class="col-12">/texto/</div>': ['texto']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About,BulletedList,Indent,Outdent,JustifyBlock,JustifyRight,JustifyCenter,JustifyLeft',
                colorButton_colors : colorPick,
                height: '100px'
            }
        }
    },

    contenido_empresa: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",MAXLENGTH:70,LABEL:1,CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/titulo/</div>' : ['titulo']
            },
            {
                '<div class="col-12">/texto/</div>' : ['texto']
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About',
                colorButton_colors : colorPick,
                height: '400px'
            }
        }
    },
    contenido_empresa_mision: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",LABEL:1,CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "contenido",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Ícono - 54x54",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"54px", SIMPLE: 1},
        },
        FORM: [
            {
                '<div class="col-12">/image/</div><div class="col-12 mt-3">/titulo/</div>' : ['image','titulo']
            },
            {
                '<div class="col-12">/texto/</div>' : ['texto']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About,BulletedList,Indent,Outdent,JustifyBlock,JustifyRight,JustifyCenter,JustifyLeft',
                colorButton_colors : colorPick,
                height: '120px'
            }
        }
    },
    contenido_empresa_vision: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",MAXLENGTH:70,LABEL:1,CLASS:"border-left-0 border-right-0 rounded-0 border-top-0",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"contenido",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Ícono - 54x54",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"54px", SIMPLE: 1},
        },
        FORM: [
            {
                '<div class="col-12">/image/</div><div class="col-12 mt-3">/titulo/</div>' : ['image','titulo']
            },
            {
                '<div class="col-12">/texto/</div>' : ['texto']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About,BulletedList,Indent,Outdent,JustifyBlock,JustifyRight,JustifyCenter,JustifyLeft',
                colorButton_colors : colorPick,
                height: '120px'
            }
        }
    },
    contenido_empresa_anio: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",LABEL: 1,CLASS:"border-left-0 rounded-0 bg-transparent border-right-0 border-top-0",VISIBILIDAD:"TP_VISIBLE",NOMBRE:"año",SIMPLE:1},
            image: {TIPO:"TP_IMAGE",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048", FOLDER: "contenido",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Logotipo - 234x54",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"230px",SIMPLE: 1},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>' : ['order']
            },
            {
                '<div class="col-12">/texto/</div>' : ['texto']
            },
            {
                '<div class="col-12">/image/</div>': ['image']
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About,BulletedList,Indent,Outdent,JustifyBlock,Italic,Unlink,Link',
                colorButton_colors : colorPick,
                height: '120px'
            }
        }
    },

    contenido_video: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"bg-transparent border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            titulo: {TIPO:"TP_STRING", LABEL:1,MAXLENGTH:100,VISIBILIDAD:"TP_VISIBLE",CLASS:"bg-transparent border-left-0 border-right-0 border-top-0 rounded-0"},
            video: {TIPO:"TP_YOUTUBE",LABEL:1 ,MAXLENGTH:30,VISIBILIDAD:"TP_VISIBLE",WIDTH:"150px",CLASS:"bg-transparent border-left-0 rounded-0 border-right-0 border-top-0",HELP:"Copie el código del video de YouTuve (https://www.youtube.com/watch?v=<strong>XXXXXX</strong>) e inserte en el cuadro de texto"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/order/</div><div class="col-12 mt-3">/video/</div>' : ["order", "video"]
            },
            {
                '<div class="col-12"><div class="row">/titulo/</div></div>' : [ 'titulo' ],
            }
        ],
    },
    contenido_servicio: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            image: {TIPO:"TP_IMAGE",FOLDER: "servicio",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"600x400",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"600px", SIMPLE: 1},
            titulo: {TIPO:"TP_STRING",RULE: "max:150",NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",LABEL:1, CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 bg-transparent"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-5"><div class="row justify-content-center"><div class="col-12 col-md-4 mb-3">/order/</div><div class="col-12">/image/</div></div></div><div class="col-12 col-md-7"><div class="row"><div class="col-12 mb-3">/titulo/</div><div class="col-12">/texto/</div></div></div>' : [ "order", "image", "titulo", "texto" ]
            }
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '250px'
            }
        }
    },
    contenido_post: {
        ATRIBUTOS: {
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12"><div class="row">/texto/</div></div>' : [ "texto" ]
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '250px'
            }
        }
    },
    contenido_post_form: {
        ATRIBUTOS: {
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"}
        },
        FORM: [
            {
                '<div class="col-12"><div class="row">/texto/</div></div>' : [ "texto" ]
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '250px'
            }
        }
    },
    localidad: {
        TABLE: "localidades",
        ATRIBUTOS: {
            provincia_id: {TIPO:"TP_ENUM",LABEL:1,CLASS:"selectpicker",VISIBILIDAD:"TP_VISIBLE",ENUMOP:"provincias",NOMBRE:"Provincia",COMUN:1},
            nombre: {TIPO:"TP_STRING",MAXLENGTH:120,LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0",NOMBRE:"localidad"},
            codigopostal: {TIPO:"TP_STRING",MAXLENGTH:15,LABEL:1,VISIBILIDAD:"TP_VISIBLE",CLASS:"border-left-0 border-right-0 border-top-0 rounded-0 text-right",NOMBRE: "Código postal"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-10">/provincia_id/</div>':['provincia_id'],
                '<div class="col-12 col-md-10">/nombre/</div>':['nombre'],
                '<div class="col-12 col-md-10">/codigopostal/</div>':['codigopostal'],
            },
        ]
    },

    /**********************************
            BLOG
     ********************************** */
    novedad: {
        TABLE: "novedades",
        ATRIBUTOS: {
            orden: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-center border-top-0 border-left-0 border-right-0 rounded-0",WIDTH:"150px"},
            image: {TIPO:"TP_IMAGE",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Imagen - 750x650",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"350px", SIMPLE: 1},
            titulo: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            data: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"texto"},
            resume: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"resumen"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-5 col-lg-3">/orden/</div>':['orden']
            },
            {
                '<div class="col-12 col-md-5">/image/</div>':['image']
            },
            {
                '<div class="col-12">/titulo/</div>':['titulo']
            },
            {
                '<div class="col-12">/resume/</div>':['resume'],
            },
            {
                '<div class="col-12">/data/</div>':['data'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            resume: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'NewPage,Save,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About,Subscript,Superscript,BulletedList,NumberedList,Outdent,Indent,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Image,Link,Format,Table',
                colorButton_colors : colorPick,
                height: '150px'
            },
            data: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About',
                colorButton_colors : colorPick,
                height: '450px'
            }
        }
    },
    /**********************************
            PRODUCTOS
     ********************************** */
    marcas: {
        TABLE: "marcas",
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING", LABEL: 1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE_FORM", NOMBRE: "orden"},
            logo: {TIPO:"TP_IMAGE", SIZE: "2MB", EXT: "jpeg, png, jpg, gif", RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "marcas",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"190px", HEIGHT: "48px"},
            color: {TIPO:"TP_COLOR",VISIBILIDAD:"TP_VISIBLE", HELP: "Color de fondo predominante", LABEL: 1, NECESARIO: 1},
            color_text: {TIPO:"TP_COLOR",VISIBILIDAD:"TP_VISIBLE_FORM", HELP: "Color del texto predominante", LABEL: 1, NECESARIO: 1, NOMBRE: "Color del texto"},
            title: {TIPO:"TP_STRING",RULE: "required|max:100",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre"},
            title_slug: {TIPO:"TP_SLUG",VISIBILIDAD:"TP_INVISIBLE", COLUMN: "title"},
            sliders: {TIPO:"TP_ARRAY",COLUMN:"sliders",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Sliders"},
            advantage: {TIPO:"TP_ARRAY",COLUMN:"advantage",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Ventajas"},
            is_destacado: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Destacado?", HELP: "Marca a mostrar en la página principal y header", NOMBRE: "Destacado", OPTION: {true: "Si", false: "No"}}
        },
        FORM: [
            {
                '<div class="col-12">/title/</div>': ['title']
            },
            {
                '<div class="col-12 col-md-6">/logo/</div><div class="col-12 col-md-6"><div class="row"><div class="col-12 col-md-6">/order/</div><div class="col-12 mt-3">/is_destacado/</div></div></div>' : ["logo", "is_destacado", "order"]
            },
            {
                '<div class="col-12 col-md-6">/color/</div><div class="col-12 col-md-6">/color_text/</div>' : ["color", "color_text"]
            },
        ]
    },
    marcas_txt: {
        ONE: 1,
        NOMBRE: "Textos",
        ATRIBUTOS: {
            resume: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"resumen", HELP: "Principales características o resumen de la marca"},
            description: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"detalle"},
            features: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"características"}
        },
        FORM: [
            {
                '<div class="col-12">/resume/</div>':['resume'],
            },
            {
                '<div class="col-12">/description/</div>':['description'],
            },
            {
                '<div class="col-12">/features/</div>':['features'],
            }
        ],

        EDITOR: {
            resume : {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,Preview,NewPage,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Find,Undo,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Language,BidiRtl,BidiLtr,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '80px'
            },
            description: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Cut,Templates,Copy,Paste,PasteText,PasteFromWord,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About,Replace',
                colorButton_colors : colorPick,
                height: '250px'
            },
            features: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Paste,Copy,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Link,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '150px'
            }
        }
    },
    marca_advantage: {
        ONE: 1,
        MULTIPLE: "ventaja",
        NOMBRE: "Ventajas",
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",NECESARIO:1, LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",SIMPLE:1, SORTEABLE: 1, MAX: 3, MIN: 1, STEP: 1},
            title: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE", NECESARIO: 1,NOMBRE: "Título"},
            image: {TIPO:"TP_IMAGE", SIZE: "2MB", EXT: "jpeg, png, jpg, gif", RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "marcas",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"60px", HEIGHT: "60px"},
            details: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1, CLASS: "ckeditor",VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"detalles"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-5"><div class="row"><div class="col-12 col-md-6">/order/</div><div class="col-12 mt-3">/image/</div></div></div><div class="col-12 col-md-7"><div class="row"><div class="col-12 mb-3">/title/</div><div class="col-12">/details/</div></div></div>': ['details','image', 'title', 'order']
            }
        ],
        EDITOR: {
            details : {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,Preview,NewPage,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Find,Undo,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Language,BidiRtl,BidiLtr,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '140px'
            }
        }
    },

    producto: {
        TABLE: "coberturas",
        ATRIBUTOS: {
            orden: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:4,VISIBILIDAD:"TP_VISIBLE",CLASS:"text-center border-top-0 border-left-0 border-right-0 rounded-0",WIDTH:"150px"},
            name: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            url: {TIPO:"TP_STRING",MAXLENGTH:150,VISIBILIDAD:"TP_INVISIBLE"},
            image: {TIPO:"TP_IMAGE",FOLDER: "coberturas/icono",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Ícono - 60x60",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"60px", HEIGHT: "60px", SIMPLE: 1,WIDTHTABLE: "170px"},
            images: {TIPO:"TP_ARRAY",COLUMN:"images",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Imágenes",CLASS:"text-center"},
            color: {TIPO:"TP_COLOR",VISIBILIDAD:"TP_VISIBLE",CLASS:"border-top-0 border-left-0 border-right-0 rounded-0"},
            hsl: {TIPO:"TP_STRING",VISIBILIDAD:"TP_INVISIBLE"},
            resumen: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"resumen"},
            detalle: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"detalle"},
            caracteristicas: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"características"},
            formulario: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"formulario"},
            destacado: {TIPO:"TP_ENUM",ENUM:{1:"Mostrar en HOME",0:"Producto normal"},VISIBILIDAD:"TP_VISIBLE_FORM",COMUN:1},
        },
        FORM: [
            {
                '/hsl/<div class="col-12 col-md-4">/image/</div><div class="col-12 col-md-8"><div class="row"><div class="col-12 col-md-5 mb-3">/orden/</div><div class="col-12 mb-3">/color/</div><div class="col-12">/name/</div></div></div>':['image','name','color','hsl', 'orden']
            },
            {
                '<div class="col-12">/resumen/</div>':['resumen'],
            },
            {
                '<div class="col-12">/detalle/</div>':['detalle'],
            },
            {
                '<div class="col-12">/caracteristicas/</div>':['caracteristicas'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        },
        EDITOR: {
            resumen : {
                toolbarGroups: [
                    { name: "basicstyles",groups: ["basicstyles"] },
                    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                    { name: 'colors', groups: [ 'TextColor', 'BGColor' ] },
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Language,CreateDiv',
            },
            detalle: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Cut,Templates,Copy,Paste,PasteText,PasteFromWord,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Maximize,ShowBlocks,About,Replace',
                colorButton_colors : colorPick,
                height: '250px'
            },
            caracteristicas: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Paste,Copy,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Link,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height: '150px'
            }
        }
    },
    producto_images: {
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",CLASS:"border-left-0 border-right-0 bg-transparent border-top-0 rounded-0",SIMPLE:1},
            image: {TIPO:"TP_IMAGE",FOLDER: "coberturas",NECESARIO:1,VALID:"Archivo seleccionado",INVALID:"Ícono - 600x400",BROWSER:"Buscar",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"600px",SIMPLE: 1,WIDTHTABLE: "170px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md">/order/</div>':['order']
            },
            {
                '<div class="col-12">/image/</div>':['image'],
            },
        ],
        FUNCIONES: {
            image: {onchange:{F:"readURL(this,'/id/')",C:"id"}}
        }
    },
    /**********************************
            DATOS DE LA EMPRESA
     ********************************** */
    usuarios: {
        TABLE: "users",
        ATRIBUTOS: {
            username: {TIPO:"TP_STRING",RULE: "required|max:30",MAXLENGTH:30,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"usuario"},
            name: {TIPO:"TP_STRING",RULE: "required|max:100",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre"},
            email: {TIPO:"TP_EMAIL",RULE: "required|email|max:150",MAXLENGTH:150,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"email"},
            password: {TIPO:"TP_PASSWORD",VISIBILIDAD:"TP_VISIBLE_FORM",LABEL:1,NOMBRE:"contraseña",HELP:"SOLO PARA EDICIÓN - para no cambiar la contraseña, deje el campo vacío"},
            type: {TIPO:"TP_ENUM",VISIBILIDAD:"TP_VISIBLE",ENUM:[{id: 0, text: "Usuario"}, {id: 1, text: "Administrador"}, {id: 2, text: "Asistente"}],NOMBRE:"Tipo",CLASS:"form--input", NECESARIO: 1},
            image: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif",FOLDER:"usuarios",RULE: "nullable|mimes:jpeg,png,jpg,gif|max:2048",VISIBILIDAD:"TP_VISIBLE_FORM",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"300px",HEIGHT:"300px",SIMPLE: 1},
            login: {TIPO:"TP_FECHA",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"último ingreso",FORMAT:[ "dd" , "/" , "mm" , "/" , "aaaa" , " " , "h" , ":" , "m" , ":" , "s" ]},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/login//image/</div><div class="col-12 col-md-6"><div class="row"><div class="col-12 mb-3">/type/</div><div class="col-12 mb-3">/name/</div><div class="col-12 mb-3">/email/</div><div class="col-12 mb-3">/username/</div><div class="col-12">/password/</div></div></div>' : ['login', 'image', 'type', 'name', 'email', 'username','password']
            }
        ]
    },
    imagen: {
        TABLE: "imagenes",
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE",FOLDER:"miscellaneous", EXT: "jpeg, png, jpg, gif",RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/image/</div>' : ['image']
            }
        ]
    },
    terminos: {
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",LABEL:1,NOMBRE:"texto",HELP:'Términos y condiciones de ejemplo sacado de <a href="https://terminosycondicionesdeusoejemplo.com/" target="_blank" rel="noopener noreferrer" class="text-primary">https://terminosycondicionesdeusoejemplo.com/ <i class="fas fa-external-link-alt ml-1"></i></a>'}
        },
        FORM: [
            {
                '<div class="col-12">/titulo/</div>': ['titulo']
            },
            {
                '<div class="col-12">/texto/</div>' : ['texto']
            }
        ],
        EDITOR: {
            texto: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Print,Preview,Templates,Cut,Copy,PasteText,Paste,PasteFromWord,Redo,Undo,Replace,SelectAll,Find,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,ShowBlocks,Maximize,About,Superscript,Subscript,Strike',
                colorButton_colors : colorPick,
                height : '350px'
            },
        },
    },
    metadatos: {
        ATRIBUTOS: {
            section: {TIPO:"TP_STRING",VISIBILIDAD:"TP_VISIBLE_TABLE",CLASS:"",NOMBRE:"sección"},
            keywords: {TIPO:"TP_TEXT", NORMAL: 1,VISIBILIDAD:"TP_VISIBLE",LABEL:1,NOMBRE:"Palabras claves",HELP:"Separa elementos con coma (,)", WIDTH: "150px;"},
            description: {TIPO:"TP_TEXT", NORMAL: 1,VISIBILIDAD:"TP_VISIBLE",LABEL:1,NOMBRE:"descripción de la sección", WIDTH: "250px;"}
        },
        FORM: [
            {
                '/section/<div class="col-12">/description/</div><div class="col-12 mt-2">/keywords/</div>' : ['description', 'keywords', 'section']
            }
        ],
    },
    newsletter: {
        ATRIBUTOS: {
            idioma: {TIPO:"TP_STRING",MAXLENGTH:3,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"idioma",CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 rounded-0"},
            mail: {TIPO:"TP_STRING",MAXLENGTH:150,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"email",CLASS:"border-left-0 rounded-0 border-right-0 border-top-0 rounded-0"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/idioma/</div><div class="col-12 col-md-8">/mail/</div>' : ['idioma','mail']
            }
        ]
    },
    redes: {
        ATRIBUTOS: {
            redes: {TIPO:"TP_ENUM",LABEL:1,ENUM:[{id: "facebook", text: "Facebook"},{id: "instagram", text: "Instagram"},{id: "youtube", text: "Youtube"},{id: "linkedin", text: "LinkedIn"},{id: "pinteres", text: "Pinteres"}],NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"red social"},
            titulo: {TIPO:"TP_STRING",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            url: {TIPO:"TP_LINK",LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"link del sitio", NECESARIO: 1, HELP: "Incluir http:// o https://."},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6 col-lg-6">/redes/</div>' : ['redes']
            },
            {
                '<div class="col-12 col-md-10 col-lg-9">/titulo/</div>' : ['titulo']
            },
            {
                '<div class="col-12 col-md-10 col-lg-9">/url/</div>': ['url']
            }
        ]
    },
    empresa: {
        ONE: 1,
        NOMBRE: "General",
        ATRIBUTOS: {
            attention_schedule: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE: "Horario de atención"}
        },
        FORM: [
            {
                '<div class="col-12 col-md">/attention_schedule/</div>' : ['attention_schedule']
            }
        ]
    },
    empresa_email: {
        ONE: 1,
        MULTIPLE: "email",
        NOMBRE: "Emails",
        ATRIBUTOS: {
            email: {TIPO:"TP_EMAIL", RULE: "required",LABEL:1, NECESARIO: 1,MAXLENGTH:150,VISIBILIDAD:"TP_VISIBLE"},
            in_header: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Esta en la cabecera?", HELP: "Muestra el elemento en la cabecera, en el lugar indicado en diseño"}
        },
        FORM: [
            {
                '<div class="col-12">/email/</div>' : ['email']
            },
            {
                '<div class="col-12">/in_header/</div>' : ['in_header']
            }
        ]
    },
    empresa_captcha: {
        ONE: 1,
        NOMBRE: "Google",
        ATRIBUTOS: {
            public: {TIPO:"TP_STRING", RULE: "required", NECESARIO: 1,LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"clave pública"},
            private: {TIPO:"TP_STRING", RULE: "required", NECESARIO: 1,LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"clave secreta"},
        },
        FORM: [
            {
                '<div class="col-12 col-md">/public/</div><div class="col-12 col-md">/private/</div>' : ['public','private']
            }
        ]
    },
    empresa_telefono: {
        ONE: 1,
        MULTIPLE: "telefono",
        NOMBRE: "Teléfonos",
        ATRIBUTOS: {
            telefono: {TIPO:"TP_PHONE", RULE: "required", NECESARIO: 1,LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"número",HELP:"Contenido oculto en el HREF. Solo números"},
            tipo: {TIPO:"TP_ENUM",ENUM:[{id: "tel", text: "Teléfono/Celular"}, {id: "wha", text: "Whatsapp"}],NECESARIO:1,VISIBILIDAD:"TP_VISIBLE_FORM", CLASS: "form-control form--input",NOMBRE:"Tipo",NORMAL: 1, LABEL: 1},
            visible: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:50,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"elemento visible",HELP:"Contenido visible. En caso de permanecer vacío, se utilizará el primer campo"},
            is_link: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Es clickeable?", HELP: "Convierte al elemento en link tipo telefónico"},
            in_header: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Esta en la cabecera?", HELP: "Muestra el elemento en la cabecera, en el lugar indicado en diseño"}
        },
        FORM: [
            {
                '<div class="col-12">/tipo/</div>' : ['tipo']
            },
            {
                '<div class="col-12">/telefono/</div>' : ['telefono']
            },
            {
                '<div class="col-12">/visible/</div>':['visible']
            },
            {
                '<div class="col-12">/is_link/</div>':['is_link']
            },
            {
                '<div class="col-12">/in_header/</div>':['in_header']
            }
        ]
    },
    empresa_domicilio: {
        ONE: 1,
        NOMBRE: "Domicilio completo",
        ATRIBUTOS: {
            calle: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE"},
            altura: {TIPO:"TP_ENTERO",LABEL:1,VISIBILIDAD:"TP_VISIBLE"},
            localidad: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"localidad"},
            provincia: {TIPO:"TP_LIST",LABEL:1,VISIBILIDAD:"TP_VISIBLE",DATA: ["Ciudad Autónoma de Buenos Aires (CABA)", "Buenos Aires", "Catamarca", "Córdoba", "Corrientes", "Entre Ríos", "Jujuy", "Mendoza", "La Rioja", "Salta", "San Juan", "San Luis", "Santa Fe", "Santiago del Estero", "Tucumán", "Chaco", "Chubut", "Formosa", "Misiones", "Neuquén", "La Pampa", "Río Negro", "Santa Cruz", "Tierra del Fuego"]},
            pais: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",DEFAULT:"Argentina",NOMBRE:"país"},
            cp: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"código postal"},
            detalle: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"detalles"},
            mapa: {TIPO:"TP_TEXT",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"ubicación de Google Maps", NORMAL: 1},
            link: {TIPO:"TP_TEXT",LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"enlace de Google Maps", NORMAL: 1}
        },
        FORM: [
            {
                '<div class="col-12 col-md-8">/calle/</div><div class="col-12 col-md-4">/altura/</div>' : ['calle','altura'],
            },
            {
                '<div class="col-12 col-md-6">/cp/</div><div class="col-12 col-md-6">/pais/</div>' : ['cp','pais']
            },
            {
                '<div class="col-12 col-md-6">/provincia/</div><div class="col-12 col-md-6">/localidad/</div>' : ['provincia','localidad']
            },
            {
                '<div class="col-12 col-md">/detalle/</div>' : ['detalle']
            },
            {
                '<div class="col-12"><div class="alert alert-primary" role="alert">Copie de <a class="text-dark" href="https://www.google.com/maps" target="blank"><strong>Google Maps</strong> <i class="fas fa-external-link-alt"></i></a> la ubicación de la Empresa <i class="fas fa-share-alt"></i> / Insertar mapa / iFrame</div>/mapa/</div>' : ['mapa']
            },
            {
                '<div class="col-12"><div class="alert alert-warning" role="alert">Copie de <a class="text-dark" href="https://www.google.com/maps" target="blank"><strong>Google Maps</strong> <i class="fas fa-external-link-alt"></i></a> la ubicación de la Empresa <i class="fas fa-share-alt"></i> / Enlace para compartir</div>/link/</div>' : ['link']
            }
        ]
    },
    empresa_images: {
        TABLE: "empresa",
        COLUMN: "images",
        ONE: 1,
        NOMBRE: "Imágenes",
        ATRIBUTOS: {
            logo: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif", FOLDER: "empresa/logos",RULE: "nullable|mimes:jpeg,png,jpg,gif|max:2048", VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"Logotipo",WIDTH:"235px", HEIGHT:"109px"},
            logoFooter: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif", FOLDER: "empresa/logos",RULE: "nullable|mimes:jpeg,png,jpg,gif|max:2048", VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"logotipo footer",WIDTH:"86px", HEIGHT:"77px"},
            favicon: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif, ico", FOLDER: "empresa/logos",RULE: "nullable|mimes:jpeg,png,jpg,gif,ico|max:2048", VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/x-icon,image/png",NOMBRE:"favicon",WIDTH:"50px",HEIGHT:"50px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/logo/</div><div class="col-12 col-md-4">/logoFooter/</div><div class="col-12 col-md-4">/favicon/</div>' : ['logo','logoFooter','favicon']
            }
        ]
    },
    empresa_mensaje: {
        ONE: 1,
        NOMBRE: "Mensajes",
        ATRIBUTOS: {
            end: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"Poliza por vencer"},
            add: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"Poliza activa"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/add/</div><div class="col-12 col-md-6">/end/</div>' : ['add', 'end']
            }
        ],
        EDITOR: {
            end: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,CreateDiv,Language,BidiRtl,BidiLtr,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick
            },
            add: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,CopyFormatting,CreateDiv,Language,BidiRtl,BidiLtr,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick
            }
        }
    },
    empresa_footer: {
        ONE: 1,
        MULTIPLE: "pie",
        NOMBRE: "Pie de página",
        ATRIBUTOS: {
            text: {TIPO:"TP_TEXT",FIELDSET:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"Texto"}
        },
        FORM: [
            {
                '<div class="col-12">/text/</div>': ['text']
            }
        ],
        EDITOR: {
            text: {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Save,NewPage,Preview,Print,PasteFromWord,PasteText,Paste,Copy,Cut,Templates,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Italic,Strike,Subscript,RemoveFormat,Superscript,CopyFormatting,NumberedList,BulletedList,Indent,Outdent,Blockquote,CreateDiv,JustifyBlock,Language,BidiRtl,BidiLtr,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,Format,ShowBlocks,Maximize,About',
                colorButton_colors : colorPick,
                height : '140px'
            }
        }
    },
    empresa_header: {
        ONE: 1,
        MULTIPLE: "header",
        NOMBRE: "Información en cabecera",
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",NECESARIO:1, LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",SIMPLE:1, SORTEABLE: 1, MAX: 3, MIN: 1, STEP: 1},
            title: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE", NECESARIO: 1,NOMBRE: "Título"},
            type: {TIPO:"TP_ENUM",ENUM:[{id: "emails", text: "Email"}, {id: "phones", text: "Teléfono"}, {id: "attention_schedule", text: "Horario"}],NECESARIO:1,VISIBILIDAD:"TP_VISIBLE_FORM", CLASS: "form-control form--input",NOMBRE:"Tipo",NORMAL: 1, LABEL: 1},
            element: {TIPO:"TP_ENUM", RULE: "required|max:50", MAXLENGTH: 50,DISABLED: 1,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE_FORM", CLASS: "form-control form--element__data",NOMBRE:"Elemento", LABEL: 1},
            icon: {TIPO:"TP_STRING", RULE: "required|max:35", MAXLENGTH: 35,LABEL:1,VISIBILIDAD:"TP_VISIBLE", NECESARIO: 1,NOMBRE: "Ícono", HELP: "Íconos sacados de <a href='https://fontawesome.com/icons?d=gallery&m=free' target='blank'>https://fontawesome.com/icons?d=gallery&m=free</a>"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>': ['order']
            },
            {
                '<div class="col-12">/type/</div>': ['type']
            },
            {
                '<div class="col-12">/element/</div>': ['element']
            },
            {
                '<div class="col-12">/title/</div>': ['title']
            },
            {
                '<div class="col-12">/icon/</div>': ['icon']
            }
        ],
        FUNCIONES: {
            type: { onchange: "searchTypeElements( this );" }
        }
    },
};