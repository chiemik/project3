function validation() {
    var myMenue = document.forms["recipeForm"]["menue"].value;
    var myRecipe = document.forms["recipeForm"]["recipe"].value;
    
    if (myMenue == null || myMenue == "" || myRecipe == null || myRecipe == "") {
        document.querySelector(".notify").textContent = "You must fill out all required fields.";
        return false;
    }
}