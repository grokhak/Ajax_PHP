$(function() {
	var parameter = ""; // 送信するデータ

	$('input[type="submit"]').click(function() { // 送信するタイミングでデータを取得
		parameter = $('input[name="str"]').val();
	});

	$('#post').submit(function() {
		var form = $(this);

		$.ajax({
			url: form.attr('action'), // 送信先URL
			type: form.attr('method'), // メソッド
			data: {
				'str': parameter // 送信するパラメータ
			},
			timeout: 10000, // タイムアウト

			success: function() { // 成功
				alert("送信しました。");
				$('#container').prepend('<p>'+parameter+'</p>');
			},

			error: function() { // 失敗
				alert("送信に失敗しました。");
			}
		});

		return false; // ページ遷移を防ぐ
	});
});