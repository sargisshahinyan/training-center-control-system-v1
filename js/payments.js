(function($) {
	const
		$payments = $("#payments"),
		$paymentDate = $("#payment-date");
	
	$("article").click(function(event) {
		const $element = $(event.target);
		
		switch(true) {
			case $element.hasClass('delete-payment'):
				deletePayment.bind(event.target)();
				break;
			case $element.hasClass('add-payment'):
				addPayment.bind(event.target)();
				break;
		}
	});
	
	function deletePayment() {
		let $element = $(this);
		
		if(!confirm("Հեռացնե՞լ գրառումը։")) {
			return;
		}
		
		let id;
		
		try {
			id = $element.closest("form").attr('action').match(/\d+/)[0];
		} catch (e) {
			return;
		}
		
		$.ajax({
			url: "/payments/delete/" + id
		}).then(() => {
			$element.closest("form").remove();
		});
	}
	
	function addPayment() {
		let id;
		
		try {
			id = location.pathname.split('/').filter((v, i, a) => v && (i === a.length - 1 || i === a.length - 2)).pop();
		} catch (e) {
			return;
		}
		
		let data = {
			studentId: id,
			paymentDate: $paymentDate.val()
		};
		
		if($.checkData(data)) {
			$.ajax({
				url: "/payments/add/",
				method: "POST",
				data: data,
				dataType: "json"
			}).then(function (payment) {
				$paymentDate.val("");
				
				$payments.find('form').last().after(`
					<form class="row form-group payment-days" method="post" action="/payments/edit/${payment.id}">
						<input type="hidden" name="payed" value="1">
						<div class="col-md-offset-1 col-md-2 list-item-title">${payment.paymentDate}</div>
						<div class="col-md-2">
							<input type="date" name="payedDate" placeholder="Վճարման օր" class="form-control" required>
						</div>
						<div class="col-md-2">
							<input type="text" name="comment" placeholder="Մեկնաբանություն" class="form-control">
						</div>
						<div class="col-md-2">
							<input type="number" name="cash" placeholder="Գումար" class="form-control" required>
						</div>
						<div class="col-md-1">
							<button type="submit" class="btn btn-success">Վճարել</button>
						</div>
						<div class="col-md-1">
							<button type="button" class="btn btn-danger delete-payment">X</button>
						</div>
					</form>
				`);
			});
		} else {
			alert("Input all data");
		}
	}
})(jQuery);
