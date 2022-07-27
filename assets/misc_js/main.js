// $(function() {
//     $('.btn-link[aria-expanded="true"]').closest('.accordion-item').addClass('active');
//   $('.collapse').on('show.bs.collapse', function () {
// 	  $(this).closest('.accordion-item').addClass('active');
// 	});
//
//   $('.collapse').on('hidden.bs.collapse', function () {
// 	  $(this).closest('.accordion-item').removeClass('active');
// 	});
// });

function SubTotal(){
	const array_total = new Array();
	for (let i = 0; i < document.getElementsByClassName("subtotal").length; i++){
		array_total.push(document.getElementsByClassName("subtotal")[i].innerText * 1);
	}
	document.getElementById('subtotal_final').innerHTML = "NRs. " + array_total.reduce((partialSum, a) => partialSum + a, 0);
	document.getElementById('total').innerHTML = document.getElementById('subtotal_final').innerHTML;
}
//
// function DecreaseNumber(i) {
// 	let qty = document.getElementById(`qty-val${i}`).innerText * 1 - 1;
// 	document.getElementById(`qty-val${i}`).innerText = qty;
// }
// function IncreaseNumber(i) {
// 	let qty = document.getElementById(`qty-val${i}`).innerText * 1 + 1;
// 	document.getElementById(`qty-val${i}`).innerText = qty;
// }
//
// function Total(i , j){
// 	let qty = document.getElementById(`qty-val${i}`).innerText * 1;
// 	document.getElementById(`qty-val${i}`).innerText = qty * j;
// }