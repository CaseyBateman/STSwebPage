(function($) {

	var tabs =  $(".tabs li a");

	tabs.click(function() {
		var $el = $(this),
            content = this.hash.replace('/',''),
            showRef = $el.attr('data-ref');
        tabs.removeClass("active");
		$(this).addClass("active");
        $("#content").find('section').hide();
        $("#content").find('#'+showRef).show();
        $(content).fadeIn(200);
        
        
	});

})(jQuery);

        //console.dir($("#content").find('#'+showRef).show());