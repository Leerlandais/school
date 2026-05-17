if(document.getElementById("delButton") != null) {
    const delButton = document.getElementById("delButton")
    delButton.addEventListener("click", () => {
        const confirmation = confirm("Are you sure you want to delete this?")
        if (confirmation) {
            document.getElementById("deleteForm").submit()
        }
    });
}