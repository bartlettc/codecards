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
        imgFileName: 'x',
        ajaxErrors: {},
        tweet: '',
        tweetLink: '',
        tweetUserLink: '',
        link: '',
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
            readOnly: true,
        },
        titleError: '',
        descriptionError: '',
        userError: '',
    },

    methods: {

        onEditorFocus(editor) {
        },

        showErrors() {
            this.titleError = this.ajaxErrors['meta_title'];
            this.descriptionError = this.ajaxErrors['meta_description'];
            this.userError = this.ajaxErrors['meta-user'];
        },

        handleResponse(response) {
            this.imgFileName = response;
            this.isActive = true;
            this.link = 'http://codecards.xyz/' + response
            this.tweet = this.title + ' - ' + this.link;
            this.tweetLink = 'https://twitter.com/intent/tweet?text=' + this.tweet;
            this.tweetUserLink = 'https://twitter.com/' + this.user;
        },

        closeModal() {
            this.isActive = false;
        },

        takeSnapshot()  {
            const codeView = document.getElementById('codemirrorCanvas');
            html2canvas([codeView], {
                dpi: 144,
                onrendered: function (canvas) {
                    const imagedata = canvas.toDataURL('image/png');
                    const imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
                    axios({
                        method: 'post',
                        url: 'getimg',
                        data: {
                            imgdata: imgdata,
                            code: this.code,
                            meta: {'title': this.title, 'description': this.description, creator: this.user}
                        },
                    }).then(function (response) {
                        this.handleResponse(response.data);
                    }.bind(this)).catch(function (errors) {
                        const response = errors;
                        Object.keys(response).forEach(function (key) {
                            //TODO: Work out why errors aren't showing anymore!
                            let keyName = key.replace('.', '_');
                            this.ajaxErrors[keyName] = response[key][0];
                            console.log(this.ajaxErrors);
                            this.showErrors();
                        }.bind(this))
                    }.bind(this))
                }.bind(this)
            });
        }
    }
});