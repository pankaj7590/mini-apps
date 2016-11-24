(function($) {
    $.fn.toggleGridViewColumns 	= function(options) {
		var opts = $.extend( {}, $.fn.toggleGridViewColumns.defaults, options );
        return this.each(function() {
			var gridView = this;
			if(opts.excludeActionColumn){
				var columns = $(gridView).find('table tr:first th:not(.action-column)');
			}else{
				var columns = $(gridView).find('table tr:first th');
			}
			console.log($(gridView).closest('.column-toggle-container').find('.has-column-toggle'));
			var colList = '';
			$.each(columns, function(colK, colV){
				if($.inArray($(colV).text(), opts.excludeColumns) == -1){
					$(colV).attr('data-column',$(colV).text());
					var activeClass = '';
					if($.inArray($(colV).text(), opts.activeColumns) != -1){
						activeClass = 'active';
					}
					colList += '<li class="'+activeClass+'"><a class="toggle-column" data-column-target="'+$(colV).text()+'">'+$(colV).text()+'</a></li>';
				}
			});
			
			$(gridView).closest('.column-toggle-container').find('.has-column-toggle:first').append(
				'<ul class="column-toggle-btn pull-right">'+
					'<li class="columns-dropdown">'+
						'<a href="#" class="columns-dropdown-toggle" data-toggle="dropdown">'+
							'<i class="icon-three-bars"></i>'+
							'<span class="visible-xs-inline-block position-right">Columns</span>'+
						'</a>'+
						'<ul class="columns-dropdown-menu columns-dropdown-content">'+colList+'</ul>'+
					'</li>'+
				'</ul>');
				
			$(gridView).closest('.column-toggle-container').find('.has-column-toggle').find('a[data-column-target]').off('click').on('click', function(){
				var target = $(this).attr('data-column-target');
				var isActive = $(this).closest('li').hasClass('active');
				console.log($('th[data-column="'+target+'"]').index());
				var targetIndex = $(gridView).find('table tr th[data-column="'+target+'"]').index();
				if(isActive){
					$(this).closest('li').removeClass('active');
					$(gridView).find('table tbody tr td:nth-child('+(targetIndex+1)+')').hide();
					$(gridView).find('table thead tr td:nth-child('+(targetIndex+1)+')').hide();
					$(gridView).find('table thead tr th[data-column="'+target+'"]').hide();
				}else{
					if($(this).parents('.columns-dropdown-content').find('li[class=active]').length >= opts.maxColumnsVisible){
						return false;
					}
					$(this).closest('li').addClass('active');
					$(gridView).find('table tbody tr td:nth-child('+(targetIndex+1)+')').show();
					$(gridView).find('table thead tr td:nth-child('+(targetIndex+1)+')').show();
					$(gridView).find('table thead tr th[data-column="'+target+'"]').show();
				}
			});
		});
    };
	
	$.fn.toggleGridViewColumns.defaults = {
		excludeColumns: [],
		excludeActionColumn: true,
		activeColumns: [],
		maxColumnsVisible: 5,
	};
}(jQuery));