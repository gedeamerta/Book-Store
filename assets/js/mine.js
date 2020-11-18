$(document)
    .on('click','.read-more',function() { 
        $(this).removeClass('read-more').addClass('show-less').html('Show Less').prev('.description').removeClass('substr'); 
    })

    .on('click','.show-less',function() { 
        $(this).removeClass('show-less').addClass('read-more').html('Read More').prev('.description').addClass('substr'); 
    })
;