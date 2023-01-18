/**
 *  Sleek Social Media Icons JS Admin Scripts  
 */

// Add color picker to the background color and color input fields 

(function ($) {

    'use strict';

    // # Document Ready Start

    $(document).ready(function () {
        /**
        * Color Picker 
        */

        jQuery('.sleek-social-icons-widget-color-picker').wpColorPicker({
            change: function (event, ui) {
                var form = $(this).closest('form')
                form.trigger('change')
            }
        });

        //var color_field = $('.sleek-social-icons-widget-color-picker').val;

        // console.log(color_field)

        // var new_color = color_field.val();
        // $the_colorpicker.wpColorpicker('color', new_color);


    });	//# Document Ready End 

})(jQuery);

