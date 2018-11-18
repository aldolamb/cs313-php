function clickHandler() {
	window.alert("Clicked!");
};

function setRandomColor() {
	let color = $("#colorInput").val();
	/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(color) ? 
  $("#second").css("background-color", color) :
	window.alert("Invalid Hex Code");
};

function setVisibility() {
  $("#first").css("opacity", $("#first").css("opacity") == 0 ? 1 : 0);
};