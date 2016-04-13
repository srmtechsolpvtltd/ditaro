$(document).ready(function() {
    $('#property-table').DataTable({
    	"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 7,8,9,10,11 ] }
       ]
    }); 

    $('.confirm').on('click', function () {
        return confirm('Are you sure you want to delete?');
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });

    $('.panel-body').on('change', '.ajax', function() {
    	$.ajax({
	        cache: false, 
	        type: 'get',
	        url: '/enrollment-change',
	        data: { name: $(this).val(), id: $(this).attr('residentid') },
	        success: function(data) 
	        {
	            console.log(data);
	        }
	    });
    }); 
 
    $('.panel-body').on('blur', '.date', function(event) {

    	$.ajax({
	        cache: false,
	        type: 'get',
	        url: '/work-dates',
	        data: { date: $(this).val(), id: $(this).attr('propertyid'), name: $(this).attr('name') },
	        success: function(data) 
	        {
	            console.log(data);
	        }
	    });
    });

    $('.panel-body').on('blur', '.charge-amount', function(event) {

    	$.ajax({
	        cache: false,
	        type: 'get',
	        url: '/charge-amount',
	        data: { cost: $(this).val(), id: $(this).attr('residentid') },
	        success: function(data) 
	        {
	            console.log(data);
	        }
	    });
    });

    $('.panel-body').on('change', '.charge', function(event) {

    	$.ajax({
	        cache: false,
	        type: 'get',
	        url: '/charge-added',
	        data: { name: $(this).val(), id: $(this).attr('residentid') },
	        success: function(data) 
	        {
	            console.log(data);
	        }
	    });
    });  

    $("button[data-toggle=modal]").click(function() {
    	var data = $(this).attr('id');
    	$.ajax({
	        cache: false,
	        type: 'get',
	        url: '/notes',
	        data: 'id='+data,
	        success: function(data) 
	        {
	            $('#myModal').show();
	            $('.modal-body').show().html(data);
	        }
	    });
    });
});