/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

//In resources/js/bootstrap.js
// window.$ = require('jquery');

// $(document).ready(function(){
//     // Check or Uncheck All checkboxes
//     $("#checkall").change(function(){
//                 console.log('labas as krabas');
//
//         var checked = $(this).is(':checked');
//         if(checked){
//                     console.log('labas as krabas');
//
//             $(".checkbox").each(function(){
//                 $(this).prop("checked",true);
//             });
//         }else{
//                     console.log('labas as jautis');
//
//             $(".checkbox").each(function(){
//                 $(this).prop("checked",false);
//             });
//         }
//     });
//
//     // Changing state of CheckAll checkbox
//     $(".checkbox").click(function(){
//
//         if($(".checkbox").length == $(".checkbox:checked").length) {
//             $("#checkall").prop("checked", true);
//         } else {
//             $("#checkall").prop("checked", false);
//         }
//
//     });
// });

// $("#selectAll").click(function(){
//     $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
//
// });

//
$(document).ready(function(){
    $('#select_all').on('click',function(){
        console.log('labas as kiaune');
        if($(this).prop('checked')){
            $('.checkbox').each(function(){
                console.log('ei');

                $(this).prop('checked',true);//.checked = true;
            });
        }else{
            $('.checkbox').each(function(){
                console.log('miau');
                $(this).prop('checked',false);//.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            console.log('labas as krabas');

            $('#select_all').prop('checked',true);
        }else{
            console.log('labas tikrai jautis');
            $('#select_all').prop('checked',false);

        }
    });
});

// filter persons in table
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
