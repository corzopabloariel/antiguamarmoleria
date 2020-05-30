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
    portada: {
        TABLE: "sliders",
        ATRIBUTOS: {
            image: {TIPO:"TP_IMAGE", EXT: 'jpeg, png, jpg, gif', SIZE: '3MB',RULE: "required|image|mimes:jpeg,png,jpg,gif|max:3072",FOLDER:"portadas",NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"1400px", HEIGHTop:"250px"},
            section: {TIPO:"TP_STRING",RULE: "required|max:20",VISIBILIDAD:"TP_INVISIBLE",NOMBRE:"sección", NECESARIO: 1},
        },
        FORM: [
            {
                '/section/<div class="col-12">/image/</div>': ['image', 'section']
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
            titulo: {TIPO:"TP_STRING",MAXLENGTH:70,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
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
        ONE: 1,
        NOMBRE: "Misión",
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:70,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
            image: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif", SIZE: "2MB", RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "contenido",NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"77px", HEIGHT: "92px"},
        },
        FORM: [
            {
                '<div class="col-12">/image/</div><div class="col-12 mt-3">/titulo/</div>' : ['image','titulo']
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
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About,BulletedList,Indent,Outdent,JustifyBlock,JustifyRight,JustifyCenter,JustifyLeft',
                colorButton_colors : colorPick,
                height: '120px'
            }
        }
    },
    contenido_empresa_vision: {
        ONE: 1,
        NOMBRE: "Visión",
        ATRIBUTOS: {
            titulo: {TIPO:"TP_STRING",MAXLENGTH:70,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"título"},
            texto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"texto"},
            image: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif", SIZE: "2MB", RULE: "required|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER:"contenido",NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"77px", HEIGHT: "92px"},
        },
        FORM: [
            {
                '<div class="col-12">/image/</div><div class="col-12 mt-3">/titulo/</div>' : ['image','titulo']
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
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Underline,RemoveFormat,CopyFormatting,NumberedList,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Image,Styles,Format,Font,ShowBlocks,Maximize,About,BulletedList,Indent,Outdent,JustifyBlock,JustifyRight,JustifyCenter,JustifyLeft',
                colorButton_colors : colorPick,
                height: '120px'
            }
        }
    },

    faqs: {
        TABLE: "faqs",
        ATRIBUTOS: {
            order: {TIPO:"TP_STRING", LABEL: 1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE", NOMBRE: "orden"},
            title: {TIPO:"TP_STRING",RULE: "required|max:100",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"pregunta"},
            title_slug: {TIPO:"TP_SLUG",VISIBILIDAD:"TP_INVISIBLE", COLUMN: "title"},
            resume: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"respuesta"},
            answer: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"detalles"},
            sliders: {TIPO:"TP_ARRAY",COLUMN:"sliders",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Sliders"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-4">/order/</div>': ['order']
            },
            {
                '<div class="col-12">/title/</div>': ['title']
            },
            {
                '<div class="col-12">/resume/</div>' : ["resume"]
            },
            {
                '<div class="col-12">/answer/</div>' : ["answer"]
            },
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
            answer: {
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
        }
    },
    faqs_images: {
        ONE: 1,
        MULTIPLE: "imagen",
        NOMBRE: "Imagénes",
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",NECESARIO:1, LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",SIMPLE:1, SORTEABLE: 1, MAX: 3, MIN: 1, STEP: 1},
            image: {TIPO:"TP_IMAGE", SIZE: "2MB", EXT: "jpeg, png, jpg, gif", RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "faqs",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"600px", HEIGHT: "400px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-5">/order/</div>': ['order']
            },
            {
                '<div class="col-12">/image/</div>': ['image']
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
            title: {TIPO:"TP_STRING",RULE: "required|max:100",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre"},
            title_slug: {TIPO:"TP_SLUG",VISIBILIDAD:"TP_INVISIBLE", COLUMN: "title"},
            content: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:20,VISIBILIDAD:"TP_VISIBLE_FORM", NOMBRE: "Contenedor", DEFAULT: "colores"},
            content_slug: {TIPO:"TP_SLUG",VISIBILIDAD:"TP_INVISIBLE", COLUMN: "content"},
            logo: {TIPO:"TP_IMAGE", SIZE: "2MB", EXT: "jpeg, png, jpg, gif", RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "marcas",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"190px", HEIGHT: "48px"},
            logo2: {TIPO:"TP_IMAGE", SIZE: "2MB", EXT: "jpeg, png, jpg, gif", RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "marcas",VISIBILIDAD:"TP_VISIBLE_FORM",ACCEPT:"image/*",NOMBRE:"imagen 2",WIDTH:"190px", HEIGHT: "48px", HELP: "Logo en negro sin fondo"},
            color: {TIPO:"TP_COLOR",VISIBILIDAD:"TP_VISIBLE_FORM", HELP: "Color de fondo predominante", LABEL: 1, NECESARIO: 1},
            color_text: {TIPO:"TP_COLOR",VISIBILIDAD:"TP_VISIBLE_FORM", HELP: "Color del texto predominante", LABEL: 1, NECESARIO: 1, NOMBRE: "Color del texto"},
            sliders: {TIPO:"TP_ARRAY",COLUMN:"sliders",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Sliders"},
            advantage: {TIPO:"TP_ARRAY",COLUMN:"advantage",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Ventajas"},
            is_destacado: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Destacado?", HELP: "Marca a mostrar en la página principal y header", NOMBRE: "Destacado", OPTION: {true: "Si", "1": "Si", false: "No", "0": "No"}},
            //in_background: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE_FORM",CHECK:"¿1era imagen normal?", HELP: "Si no esta marcado, deja la imagen en Background", NOMBRE: "Background", OPTION: {true: "Si", "1": "Si", false: "No", "0": "No"}},
            only_colors: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿Solo mostrar los elementos?", HELP: "Si el campo esta activo, muestra los elementos hijos directamente en la sección", NOMBRE: "Mostrar elementos", OPTION: {true: "Si", "1": "Si", false: "No", "0": "No"}}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6"><div class="row"><div class="col-12 mb-3">/order/</div><div class="col-12">/content/</div></div></div><div class="col-12 col-md-6">/is_destacado//only_colors/</div>': ["is_destacado", "only_colors", "order", "content"]
            },
            {
                '<div class="col-12">/title/</div>' : ["title"]
            },
            {
                '<div class="col-12 col-md-6">/logo/</div><div class="col-12 col-md-6">/logo2/</div>' : ["logo", "logo2"]
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
            characteristics: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"características"},
            description: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"detalle (C/ color principal de fondo)"},
            features: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"otras características"}
        },
        FORM: [
            {
                '<div class="col-12">/resume/</div>':['resume'],
            },
            {
                '<div class="col-12">/description/</div>':['description'],
            },
            {
                '<div class="col-12">/characteristics/</div>':['characteristics'],
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
            characteristics: {
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
            image: {TIPO:"TP_IMAGE", SIZE: "2MB", EXT: "jpeg, png, jpg, gif", RULE: "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "marcas",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"74px", HEIGHT: "100px"},
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
    marca_images: {
        ONE: 1,
        MULTIPLE: "slider",
        NOMBRE: "Sliders",
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden", SORTEABLE: 1, MIN: 1, STEP: 1},
            image: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif",RULE: "nullable|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "marcas/sliders", SIZE: "2MB",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"1400px", HEIGHTop:"300px", HELP: "Respete las medidas detalladas o idénticas para que el slider no se vea afectado"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>':['order']
            },
            {
                '<div class="col-12">/image/</div>':['image'],
            },
        ]
    },

    productos: {
        TABLE: "productos",
        ATRIBUTOS: {
            producto_id: {TIPO:"TP_RELATIONSHIP",VISIBILIDAD:"TP_VISIBLE_INVISIBLE"},
            show: {TIPO:"TP_ENUM", LABEL: 1,VISIBILIDAD:"TP_VISIBLE_FORM",ENUM:[{id: 1, text: "Todo"}, {id: 2, text: "Título"}, {id: 3, text: "Imagen"}],NOMBRE:"Mostrar",CLASS:"form--input", NECESARIO: 1, DEFAULT: 1},
            order: {TIPO:"TP_STRING",LABEL:1,MAXLENGTH:3,VISIBILIDAD:"TP_VISIBLE", NOMBRE: "orden"},
            description: {TIPO:"TP_TEXT", LABEL: 1,EDITOR:1,VISIBILIDAD:"TP_VISIBLE_FORM",FIELDSET:1,NOMBRE:"Descripción", HELP: "Si llena este campo, la ficha va a tener un estilo particular"},
            marca_id: {TIPO:"TP_RELATIONSHIP", ENUM: null,LABEL: 1,RULE: "required", NECESARIO: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"marca", ENTIDAD: "Marca",LABEL:1, ATTR: ["id", "title AS text"], ORDER: "order", NORMAL: 1},
            title: {TIPO:"TP_STRING",RULE: "required|max:100",MAXLENGTH:100,NECESARIO:1,LABEL:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"nombre"},
            title_slug: {TIPO:"TP_SLUG",VISIBILIDAD:"TP_INVISIBLE", COLUMN: "title"},
            images: {TIPO:"TP_ARRAY",COLUMN:"images",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Imágenes",CLASS:"text-center"},
            in_background: {TIPO:"TP_CHECK",VISIBILIDAD:"TP_VISIBLE",CHECK:"¿1era imagen normal?", HELP: "Si esta marcado, pone la imagen en Background", NOMBRE: "Background", OPTION: {true: "No", "1": "No", false: "Si", "0": "Si"}},
            characteristics: {TIPO:"TP_ARRAY",COLUMN:"characteristics",VISIBILIDAD:"TP_VISIBLE_TABLE",NOMBRE:"Características",CLASS:"text-center"},
            elementos: {TIPO:"TP_INT",VISIBILIDAD:"TP_VISIBLE_TABLE", ENTIDAD: "Producto", ATTR: "producto_id"},
        },
        FORM: [
            {
                '/producto_id/<div class="col-12 col-md-4">/order/</div><div class="col-12 col-md-4">/marca_id/</div><div class="col-12 col-md-4">/show/</div>':['order', 'show', 'marca_id', 'producto_id'],
            },
            {
                '<div class="col-12 col-md-9">/title/</div><div class="col-12 col-md">/in_background/</div>':['title', 'in_background'],
            },
            {
                '<div class="col-12">/description/</div>': ['description']
            }
        ],

        EDITOR: {
            description : {
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
                height: '150px'
            },
        }
    },
    producto_images: {
        ONE: 1,
        MULTIPLE: "imagen",
        NOMBRE: "Imágenes",
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",MAXLENGTH:2,NECESARIO:1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden", SORTEABLE: 1, MIN: 1, STEP: 1},
            image: {TIPO:"TP_IMAGE", EXT: "jpeg, png, jpg, gif",RULE: "nullable|mimes:jpeg,png,jpg,gif|max:2048",FOLDER: "productos", SIZE: "2MB",VISIBILIDAD:"TP_VISIBLE",ACCEPT:"image/*",NOMBRE:"imagen",WIDTH:"600px", HEIGHT:"400px"},
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>':['order']
            },
            {
                '<div class="col-12">/image/</div>':['image'],
            },
        ]
    },
    producto_caracteristicas: {
        ONE: 1,
        MULTIPLE: "caracteristica",
        NOMBRE: "Características",
        ATRIBUTOS: {
            order: {TIPO:"TP_ENTERO",NECESARIO:1, LABEL: 1,VISIBILIDAD:"TP_VISIBLE",NOMBRE:"orden",SIMPLE:1, SORTEABLE: 1, MIN: 1, STEP: 1},
            title: {TIPO:"TP_STRING",LABEL:1,VISIBILIDAD:"TP_VISIBLE", NECESARIO: 1,NOMBRE: "Título"},
            data: {TIPO:"TP_TEXT",VISIBILIDAD:"TP_VISIBLE_FORM", NOMBRE:"Elementos", LABEL: 1, NORMAL:1, HELP: "Separe los elementos con <strong>/</strong>, el sistema lo reconocerá y separará la información en la vista"},
            icon: {TIPO:"TP_STRING", RULE: "required|max:40", MAXLENGTH: 40,LABEL:1,VISIBILIDAD:"TP_VISIBLE", NECESARIO: 1,NOMBRE: "Ícono", HELP: "Íconos sacados de <a href='https://fontawesome.com/icons?d=gallery&m=free' target='blank'>https://fontawesome.com/icons?d=gallery&m=free</a>"}
        },
        FORM: [
            {
                '<div class="col-12 col-md-6">/order/</div>': ['order']
            },
            {
                '<div class="col-12">/title/</div>': ['title']
            },
            {
                '<div class="col-12">/icon/</div>': ['icon']
            },
            {
                '<div class="col-12">/data/</div>': ['data']
            }
        ]
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
        NOMBRE: "Textos",
        ATRIBUTOS: {
            contacto: {TIPO:"TP_TEXT",EDITOR:1,VISIBILIDAD:"TP_VISIBLE",FIELDSET:1,NOMBRE:"Texto en contacto", LABEL: "1"}
        },
        FORM: [
            {
                '<div class="col-12 col-md">/contacto/</div>' : ['contacto']
            }
        ],
        EDITOR: {
            contacto: {
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
                removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,JustifyBlock,Language,BidiRtl,BidiLtr,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,ShowBlocks,Maximize,About',
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