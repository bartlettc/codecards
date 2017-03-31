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
        }
    },

    methods: {

        onEditorFocus(editor) {
            console.table(editor);
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
                            console.log(response.data);
                            // this.isActive = true;
                        })
                        .catch(function (data) {

                                var errors = data.responseJSON;
                                console.log(errors);
                        }.bind(this))
                }.bind(this)
            });
            console.log(this.uuid);
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