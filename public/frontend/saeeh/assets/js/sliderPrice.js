
const slider = document.getElementById("sliderPrice");
const rangeMin = 0;
const rangeMax = 20;
const step = 2;
const filterInputs = document.querySelectorAll("input.filter__input");
noUiSlider.create(slider, {
  start: [rangeMin, rangeMax],
  direction: "rtl",
  connect: true,
  step: step,
  range: {
    min: rangeMin,
    max: rangeMax,
  },

  // make numbers whole
  format: {
    to: (value) => value,
    from: (value) => value,
  },
});

// bind inputs with noUiSlider
slider.noUiSlider.on("update", (values, handle) => {
  filterInputs[handle].value = parseInt(values[handle]);
});

filterInputs.forEach((input, indexInput) => {
  input.addEventListener("change", () => {
    slider.noUiSlider.setHandle(indexInput, parseInt(input.value));
  });
});