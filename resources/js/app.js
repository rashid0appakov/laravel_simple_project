require('./bootstrap');
require('air-datepicker')
require('air-datepicker/dist/css/datepicker.css')
import Multiselect from 'vue-multiselect'
window.Vue = require('vue').default;

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('multiselect', Multiselect)
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
    $('.dropdown').on('shown.bs.dropdown', function(e){
        $(this).find('input').focus()
    })
    $('form.confirmed').submit(function(e){
        if(!confirm('Подтвердите действие')){
            e.preventDefault()
            return false;
        }
    })
    $('[data-toggle="tooltip"]').tooltip();
    $('.copy-fields a').click(function(e){
        e.preventDefault()
        const text = $(this).data('text')
        const $temp = $("<input>");
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();
    })
})