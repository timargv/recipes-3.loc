
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
////////////////////////////////////////////////
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/////////////////////////////////////
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//////////////////////////////////
// const app = new Vue({
//     el: '#app'
// });


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$('textarea.addComment').keyup(function(){
    $(this).height(10);
    $(this).height(this.scrollHeight);
});


$(document).ready(function(){
    $(document).on('click', '.add', function() {
        var n = $("#list #list_field").length;
        var count = n + 1;

        $("#list_field").clone().addClass('item-3' +count).appendTo("#list")
                        .find('#amount, #amount_id, #ingredient, #measure')
                        .attr('name', 'amount['+count+']')
                        .attr('value', '')
                        .attr('name', 'ingredient_id['+count+']')
                        .attr('name', 'measure_id['+count+']')
                        .find('option').removeAttr('selected')
                        .eq(index).attr('selected', 'selected');
    });
});
