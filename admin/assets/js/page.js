var functions = {
	remove_story: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'cauchuyen_id='+ id;

				$.ajax({
					type: "POST",
					url: "xoacauchuyen.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_tintuc: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'tintuc_id='+ id;

				$.ajax({
					type: "POST",
					url: "xoatintuc.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_danhmuc: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'danhmuc_id='+ id;

				$.ajax({
					type: "POST",
					url: "xoadanhmuc.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	}
} 
