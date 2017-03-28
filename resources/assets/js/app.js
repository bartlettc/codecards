import Vue from 'vue';
import axios from 'axios';
import VueCodeMirror from 'vue-codemirror';
import html2canvas from 'html2canvas';
Vue.use(VueCodeMirror);

const app = new Vue({
    el: '#app',

    data: {
        code: '',
        css: '.class { display: block }',
        csrfToken: Laravel.csrfToken,
        title: "",
        description: "",
        user: "",
        uuid: "",
        editorOptions: {
            tabSize: 4,
            styleActiveLine: true,
            line: true,
            mode: 'application/x-httpd-php',
            lineWrapping: true,
            theme: 'abcdef',
            matchBrackets: true,
        }
    },

    methods: {

        onEditorFocus(editor) {
            console.table(editor);
        },

        takeSnapshot2()  {
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
                            title: this.title,
                            description: this.description,
                            user: this.user,
                        },
                    }).then(function (response) {
                        this.uuid = response.data;
                    });
                }.bind(this)
            })
        }
    }

});