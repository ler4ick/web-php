function graphics() {
    var dflt;
    var over = "fa-solid fa-hand-point-up";
    var ids = ["Main", "AboutMe", "Study", "Photoalbum", "Contacts", "Task", "History"];
    var classes = [
        "fa-sharp fa-solid fa-house",
        "fa-sharp fa-solid fa-user",
        "fa-sharp fa-solid fa-poo",
        "fa-sharp fa-solid fa-camera-retro",
        "fa-sharp fa-solid fa-phone",
        "fa-sharp fa-solid fa-check",
        "fa-sharp fa-solid fa-file"
    ];

    for (var i = 0; i < classes.length; i++) {
        let obj = document.getElementById(ids[i] + "I");
        obj.className = classes[i];
    }

    for (var i = 0; i < ids.length; i++) {
        var obj = document.getElementById(ids[i]);
        obj.addEventListener("mouseover", (e) => {
            if (e.target.children[0]) {
                dflt = e.target.children[0].className;
                e.target.children[0].className = over;
            }
        });

        obj.addEventListener("mouseout", (e) => {
            if (e.target.children[0]) {
                e.target.children[0].className = dflt;
            }
        });
    }
}