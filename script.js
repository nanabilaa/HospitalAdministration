document.querySelector("form").addEventListener("submit", function(event) {
    var firstName = document.getElementById("first_name").value;
    var lastName = document.getElementById("last_name").value;

    if (firstName === "" || lastName === "") {
        alert("Nama depan dan nama belakang harus diisi!");
        event.preventDefault();
    }
});
