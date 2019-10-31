var shopping_cart = {
	unit_price : 0,
	quantity : 0,
	current_price : 0,
	total_shipping : 0,
	final_price : 0,
	
	get unitPrice(){
		return this.unit_price;
	}
	get quantity(){
		return this.quantity;
	}
	get currentPrice(){
		return this.current_price;
	}
	get totalShipping(){
		return this.total_shipping;
	}
	get finalPrice(){
		return this.final_price;
	}


	set unitPrice(up){
		this.unit_price = up;
	}
	set quantity(q){
		this.quantity = q;
	}
	set currentPrice(cp){
		this.current_price = cp;
	}
	set totalShipping(ts){
		this.total_shipping = ts;
	}
	set finalPrice(fp){
		this.final_price = fp;
	}
}


function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
