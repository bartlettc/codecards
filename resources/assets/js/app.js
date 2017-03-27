import Vue from 'vue'

import VueCodeMirror from 'vue-codemirror';

Vue.use(VueCodeMirror);


const app = new Vue({
    el: '#app',

    data:   {
                code: '',
                css: '.class { display: block }',
                editorOptions: {
                    tabSize: 4,
                    styleActiveLine: true,
                    line: true,
                    mode: 'application/x-httpd-php',
                    lineWrapping: true,
                    theme: 'abcdef',
                    matchBrackets: true,
                }
            }



});

import html2canvas from 'html2canvas';
var codeView = document.getElementById('codemirrorCanvas');

function takeSnapshot() {
    html2canvas([codeView], {
        onrendered: function (canvas) {
            var imagedata = canvas.toDataURL('image/png');
            var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
            //ajax call to save image inside folder
            $.ajax({
                url: 'getimg',
                data: {
                    imgdata: imgdata
                },
                type: 'post',
                success: function (response) {
                    console.log(response);
                    $('#image_id img').attr('src', response);
                }
            });
        }
    });
}

$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
});

var mainBtn = document.getElementById('create');

mainBtn.addEventListener('click', takeSnapshot);
