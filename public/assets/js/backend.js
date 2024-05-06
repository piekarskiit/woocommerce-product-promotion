document.addEventListener("DOMContentLoaded", function() {
  const togglePromotionDate = () => {
    const checkbox = document.getElementById("_promote_product_checkbox_date");
    const hiddenField = document.getElementById("promote_product_checkbox_date_fields");
    toggleVisibility(checkbox, hiddenField);
    checkbox.addEventListener("change", () => toggleVisibility(checkbox, hiddenField));
  };
  const togglePromotion = () => {
    const checkbox = document.getElementById("_promote_product_activate");
    const hiddenField = document.getElementById("promote_product_fields");
    toggleVisibility(checkbox, hiddenField);
    checkbox.addEventListener("change", () => toggleVisibility(checkbox, hiddenField));
  };
  setTimeout(() => togglePromotion(), 500);
  setTimeout(() => togglePromotionDate(), 700);
});
const toggleVisibility = (checkbox, hiddenElement) => {
  if (checkbox.checked) {
    hiddenElement.style.display = "block";
  } else {
    hiddenElement.style.display = "none";
  }
};
