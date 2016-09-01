<!DOCTYPE html>
<html>
<body>

<button onclick="showAlertBox()">Try Alert Box</button>
<button onclick="showConfirmBox()">Try Confirm Box</button>
<button onclick="showPromptBox()">Try Prompt Box</button>
<p id="demo"></p>
<script>
function showAlertBox() {
    alert("I am an alert box!");
}
function showConfirmBox() {
    var x;
    if (confirm("Press a button!") == true) {
        x = "You pressed OK!";
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
function showPromptBox() {
    var person = prompt("Please enter your name", "Harry Potter");
    
    if (person != null) {
        document.getElementById("demo").innerHTML =
        "Hello " + person + "! How are you today?";
    }
}
</script>

</body>
</html>
