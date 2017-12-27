var newsId = 0;
var newsTitleElement = null;
var newsTextElement = null;

$('.news-edit').on('click', function(event) {
	event.preventDefault();

	newsTitleElement = event.target.parentNode.parentNode.children[2];
	newsTextElement = event.target.parentNode.parentNode.children[3];
	var newsTitle = newsTitleElement.textContent;
	var newsText = newsTextElement.textContent;
	newsId = event.target.parentNode.parentNode.dataset['newsid'];
	$('#news-title').val(newsTitle);
	$('#news-text').val(newsText);

	$('#edit-modal').modal();
});

$('#modal-save').on('click', function() {
	$.ajax({
		method: 'POST',
		url: '/newsedit/',
		data: {newstitle: $('#news-title').val(), newstext: $('#news-text').val(), newsId: newsId}
	})
	.done(function () {
		$(newsTitleElement).text($('#news-title').val());
		$(newsTextElement).text($('#news-text').val());
	});
	$('#edit-modal').modal('hide');

});