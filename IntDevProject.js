function calculate() {
	double totalPrice = 0.0;
	for (int i = 0; i < numChosen; i++) {
	totalPrice = 
 }
}

function totalTax(double price) {
	double tax =  (price * .08);
	return tax;

}

function shippingCost(double price) {
	double shippingCost = 0.03 * price;
	return shippingCost;
}

function totalDue(double price, double tax; double shippingCost) {
	double total = price + tax + shippingCost;
	return total;	
}

