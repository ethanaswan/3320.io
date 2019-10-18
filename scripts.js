function calculate_total() {
	var quantity = document.getElementById('quantity').value;
	var price = document.getElementById('unit_price').value;
	document.getElementById("total_price").value = quantity * price;
}

function get_unit_price(){
	var item = docuement.getElementById("item").value;
	if (item == "xbox_1"){
		document.getElementById("unit_price").value = 279;
	}
	else if (item == "xbox_2"){
		document.getElementById("unit_price").value = 500;
	}
	else if (item == "playstation_1"){
		document.getElementById("unit_price").value = 300;
	}
	else if (item == "playstation_2") {
		document.getElementById("unit_price").value = 350;
	}
	else if (item == "pc_kit"){
		document.getElementById("unit_price").value = 400;
	}
	else if (item == "switch"){
		document.getElementById("unit_price").value = 300;
	}
	else if (item == "book"){
		document.getElementById("unit_price").value = 19;
	}
}
function totalTax(var price) {
	var tax =  (price * .08);
	return tax;

}

function shippingCost(var price) {
	var shippingCost = 0.03 * price;
	return shippingCost;

}

function totalDue(var price, var tax, var shippingCost) {
	var total = price + tax + shippingCost;
	return total;

}

function validateCardNum(inputtext) {
/*Visa cards – Begin with a 4 and have 13 or 16 digits.
 Mastercard cards – Begin with a 5 and has 16 digits.
American Express cards – Begin with a 3, followed by a 4 or a 7 has 15 digits.
*/
	if (cardType == VISA) {
	}
	if (cardType = MasterCard) {
	}
	if (cardType = AmericanExpress) {
	}

}

function validateMmYyyy(var expDate) {
	var today = new Date();
	var month = (today.getMonth() + 1);
	var year = today.getFullYear();
	if (expDate[2] != "/")
		return false;
	if (expDate[3]+expDate[4]+expDate[5]+expDate[6] < year)
		return false;
	else if(expDate[3]+expDate[4]+expDate[5]+expDate[6] == year) {
		if (expDate[0] + expDate[1] < month)
			return false;
	}
	else
		return true;

}

function submitOrder() {

}
