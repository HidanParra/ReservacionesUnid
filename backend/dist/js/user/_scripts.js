/****************************************
 *       Basic Table                    *
 ****************************************/
$('#zero_config').DataTable();

/****************************************
 *       Modal Reservation              *
 ****************************************/
$('#reservationModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever'); // Extract info from data-* attributes
    var type = button.data('type');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(recipient)
    //modal.find('.modal-body input').val(recipient)
})

/****************************************
 *       Wizard Form                    *
 ****************************************/
var form = $("#example-form");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password"
        }
    }
});
 form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        alert("Submitted!");
    }
});

//***********************************//
// For select 2
//***********************************//
$(".select2").select2();

/*colorpicker*/
$('.demo').each(function() {
//
// Dear reader, it's actually very easy to initialize MiniColors. For example:
//
//  $(selector).minicolors();
//
// The way I've done it below is just for the demo, so don't get confused
// by it. Also, data- attributes aren't supported at this time...they're
// only used for this demo.
//
$(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        position: $(this).attr('data-position') || 'bottom left',

        change: function(value, opacity) {
            if (!value) return;
            if (opacity) value += ', ' + opacity;
            if (typeof console === 'object') {
                console.log(value);
            }
        },
        theme: 'bootstrap'
    });

});
/*datwpicker*/
jQuery('.mydatepicker').datepicker();
jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
});
var quill = new Quill('#editor', {
    theme: 'snow'
});

/****************************************
 *       Clock Picker                   *
 ****************************************/
$('.clockpicker').clockpicker();