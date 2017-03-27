import Vue from 'vue'
import VueCodeMirror from 'vue-codemirror';

Vue.use(VueCodeMirror);


const app = new Vue({
    el: '#app',

    data:   {
                code: `
<?php
class newclass {
    
    public function hello($world) 
    {
        echo "Hello ".$world;
    } 

}
?>
`,
                css: '.class { display: block }',
                editorOptions: {
                    tabSize: 4,
                    styleActiveLine: true,
                    line: true,
                    mode: 'application/x-httpd-php',
                    lineWrapping: true,
                    theme: 'seti',
                    matchBrackets: true,
                }
            }



});