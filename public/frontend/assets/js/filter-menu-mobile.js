var filterOpen = true;
$("body").on("click", ".js-toggle-filter", toggleFilter);
function toggleFilter(e) {
  e.preventDefault();
  if (filterOpen) {
    closeFilter();
    return;
  }
  openFilter();
}
function openFilter() {
  filterOpen = true;
  $("body").addClass("openFilter");
}
function closeFilter() {
  filterOpen = false;
  $("body").removeClass("openFilter");
}

let accordion_btns = document.querySelectorAll(".accordion-button");
let accordion_contents = document.querySelectorAll(".accordion-collapse");
accordion_btns.forEach((btn) => {
    btn.addEventListener("click", () => {
        accordion_contents.forEach(acc => {
            if(acc.classList.contains('show')) {
             
                acc.classList.remove('show');
                
            }
        })
    });
});