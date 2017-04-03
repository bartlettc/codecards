import Vue from 'vue';
import axios from 'axios';
import VueCodeMirror from 'vue-codemirror';
import html2canvas from 'html2canvas';
Vue.use(VueCodeMirror);

const app = new Vue({
    el: '#app',

    data: {
        code: window.Laravel.code,
        css: '.class { display: block }',
        csrfToken: Laravel.csrfToken,
        title: "",
        description: "",
        user: "",
        uuid: "",
        isActive: false,
        ajaxErrors : {},
        editorOptions: {
            tabSize: 4,
            styleActiveLine: true,
            line: true,
            mode: 'application/x-httpd-php',
            lineWrapping: true,
            theme: 'abcdef',
            matchBrackets: true,
        },
        displayEditorOptions: {
            tabSize: 4,
            styleActiveLine: true,
            line: true,
            mode: 'application/x-httpd-php',
            lineWrapping: true,
            theme: 'the-matrix',
            matchBrackets: true,
            readOnly:true,
        },
        titleError: '',
        descriptionError: '',
        userError: '',
    },

    methods: {

        onEditorFocus(editor) {
            console.table(editor);

        },

        showErrors() {
            // console.log( Object.values(this.ajaxErrors) );
            this.titleError = this.ajaxErrors['meta_title'];
            this.descriptionError = this.ajaxErrors['meta_description'];
            this.userError = this.ajaxErrors['meta_user'];
        },

        takeSnapshot()  {
            const codeView = document.getElementById('codemirrorCanvas');
            html2canvas([codeView], {
                onrendered: function (canvas) {
                    const imagedata = canvas.toDataURL('image/png');
                    const imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");

                    axios({
                        method: 'post',
                        url: 'getimg',
                        data: {
                            imgdata: imgdata,
                            code: this.code,
                            meta: { 'title': this.title, 'description': this.description, creator: this.user}
                        },
                    })
                        .then(function (response) {
                            this.uuid = response.data;
                            // console.log(response.data);
                            // this.isActive = true;
                        })
                        .catch(function (errors) {
                            const response = errors.response.data;
                            Object.keys(response).forEach(function(key) {
                                let keyName = key.replace('.','_');
                                this.ajaxErrors[keyName] = response[key][0];
                            }.bind(this))
                            this.showErrors();
                        }.bind(this))
                }.bind(this)
            });

        }
    }

} );

 // const display = new Vue({
 //     el: '#display',
 //
 //     data: {
 //         code: window.Laravel.code,
 //         css: '.class { display: block }',
 //         csrfToken: Laravel.csrfToken,
 //         title: "",
 //         description: "",
 //         user: "",
 //         uuid: "",
 //         isActive: false,
 //         editorOptions: {
 //             tabSize: 4,
 //             styleActiveLine: true,
 //             line: true,
 //             mode: 'application/x-httpd-php',
 //             lineWrapping: true,
 //             theme: 'the-matrix',
 //             matchBrackets: true,
 //             readOnly:true,
 //         }
 //     },
 //
 //
 // });