$(document).ready(function () {
	var html_content = ''
	$('#add-more').click(function () {
		var listCount = $("input[name='question[]']").length
		html_content = '<div class="col-9 more-faq-'+listCount+'"><hr></div><div class="col-3 align-self-center text-right more-faq-'+listCount+'"><button class="btn btn-danger btn-rounded waves-effect waves-button waves-light delete-faq" data-class="more-faq-'+listCount+'"><i class="ti-trash"></i></button> </div> <div class="col-md-10 mb-3 more-faq-'+listCount+'"><label for="question">Question*</label> <input class="form-control" id="question'+listCount+'" name="question[]" placeholder="Enter question title" required></div><div class="col-md-2 mb-3 more-faq-'+listCount+'"> <label for="order'+listCount+'">Order No.*</label> <input class="form-control" type="number" min="0" name="order_no[]" id="order" placeholder="Enter Order No." required></div><div class="col-md-12 mb-3 more-faq-'+listCount+'"> <label for="faqanswer'+listCount+'">Answers*</label><textarea class="form-control" name="answer[]" id="faqanswer'+listCount+'" placeholder="Enter answer" required></textarea></div>';
		if($('.more-faq-'+listCount).length){
			var morefaqlist = $('.more-faq-'+listCount).last()
			$(html_content).insertAfter(morefaqlist)
		}else {
			$(html_content).insertAfter($('#first-parent'))
		}
		if ($('#faqanswer'+listCount).length) {
			ClassicEditor.create(document.querySelector('#faqanswer'+listCount))
		}
		$('.delete-faq').click(function () {
			var thisClass = $(this).data('class');
			$('.'+thisClass).remove()
		})
	})
	if ($('#faqanswer').length) {
		ClassicEditor.create(document.querySelector('#faqanswer'))
	}
})
