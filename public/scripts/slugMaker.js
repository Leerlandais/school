const pageName = document.getElementById("pageName");
const slugName = document.getElementById("slugName");
console.log("Slug Maker : Active")

pageName.addEventListener("input", updateSlug);
function updateSlug() {
    let changedName = this;
    let slugBefore = changedName.value;
    let slugArray = [];


    for (let i = 0; i < slugBefore.length; i++) {
        if (/[!@#$%'^"=:<>&,;*()_+]/.test(slugBefore[i])) {
            slugArray.push("_");
        }else {
            slugBefore[i] === " " ? slugArray.push("-") :
                slugBefore[i] === "Ã©" ? slugArray.push("e") :
                    slugBefore[i] === "Ã¨" ? slugArray.push("e") :
                        slugBefore[i] === "Ã " ? slugArray.push("a") :
                            slugBefore[i] === "Ã€" ? slugArray.push("a") :
                                slugBefore[i] === "Ã§" ? slugArray.push("c") :
                                    slugBefore[i] === "Ã‡" ? slugArray.push("c") :
                                        slugBefore[i] === "?" ? slugArray.push("_qm_") :
                                            slugBefore[i] === "/" ? slugArray.push("_slash_") :
                                                slugBefore[i] === "Ã¹" ? slugArray.push("u") :
                                                    slugBefore[i] === "." ? slugArray.push("_fs_") : slugArray.push(slugBefore[i].toLowerCase());
        }
        let slugAfter = slugArray.join("");
        slugName.value = slugAfter;
        slugName.textContent = slugAfter;
    }
}