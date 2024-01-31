// side menu close start
$(".side-menu-close").on("click", function () {
  if (!$(".side-menu-close").hasClass("closed")) {
    $(".side-menu-close").addClass("closed");
  } else {
    $(".side-menu-close").removeClass("closed");
  }
});
// side menu close end
const $menu = $(".side-menu-wrap");
$(document).mouseup((e) => {
  if (
    !$menu.is(e.target) && // if the target of the click isn't the container...
    $menu.has(e.target).length === 0
  ) {
    $menu.removeClass("opened");
    $(".side-menu-close").removeClass("closed");
  }
});

// open side menu when clicked on menu button start
$(".side-menu-close").on("click", function () {
  if (!$(".side-menu-wrap").hasClass("opened")) {
    $(".side-menu-wrap").addClass("opened");
  } else {
    $(".side-menu-wrap").removeClass("opened");
  }
});

// close side menu when swiped start
var isDragging = false,
  initialOffset = 0,
  finalOffset = 0;
$(".side-menu-wrap")
  .mousedown(function (e) {
    isDragging = false;
    initialOffset = e.offsetX;
  })
  .mousemove(function () {
    isDragging = true;
  })
  .mouseup(function (e) {
    var wasDragging = isDragging;
    isDragging = false;
    finalOffset = e.offsetX;
    if (wasDragging) {
      if (initialOffset > finalOffset) {
        sideMenuCloseAction();
      }
    }
  });
// close side menu when swiped end

function sideMenuCloseAction() {
  $(".side-menu-wrap").addClass("open");
  $(".side-menu-wrap").removeClass("opened");
  $(".side-menu-close").removeClass("closed");
}
// close side menu when clicked on overlay end

// close side menu over 992px start
$(window).on("resize", function () {
  if ($(window).width() >= 992) {
    sideMenuCloseAction();
  }
});
// close side menu over 992px end

$(document).ready(function () {
  $(".hotel-owl").owlCarousel({
    loop: true,
    rtl: true,
    autoplay: true,
    lazyLoad: true,
    autoplayTimeout: 4000,
    nav: true,
    navText: [
      '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
      '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
    ],
    margin: 20,

    responsive: {
      0: {
        items: 1,
      },
      767: {
        items: 2,
      },
      992: {
        items: 4,
      },
    },
  });
  $(".restaurant-owl").owlCarousel({
    loop: true,
    rtl: true,
    autoplay: true,
    lazyLoad: true,
    autoplayTimeout: 4500,
    nav: true,
    navText: [
      '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
      '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
    ],
    margin: 20,

    responsive: {
      0: {
        items: 1,
      },
      767: {
        items: 2,
      },
      992: {
        items: 4,
      },
    },
  });
  //reviews-owl
  $(".reviews-owl").owlCarousel({
    loop: true,
    rtl: true,
    autoplay: true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: [
      '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
      '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
    ],
    items: 1,
    margin: 20,
  });
});
$(".review-owl").owlCarousel({
  loop: true,
  rtl: true,
  startPosition: 1,
  center: true,
  autoplayHoverPause: true,
  autoplay: true,
  lazyLoad: true,
  autoplayTimeout: 5000,
  nav: true,
  navText: [
    '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
    '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
  ],
  responsive:{
    0:{
        items:1
    },
    600:{
        items:2
    },
    1000:{
        items:3
    }
},
  margin: 20,
});
$(".city-owl").owlCarousel({
  loop: true,
  rtl: true,
  autoplay: true,
  lazyLoad: true,
  autoplayTimeout: 4000,
  nav: true,
  navText: [
    '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
    '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
  ],
  margin: 20,

  responsive: {
    0: {
      items: 1,
    },
    767: {
      items: 2,
    },
    992: {
      items: 4,
    },
  },
});

// Show the first tab by default
$(".tabs-stage li").hide();
$(".tabs-stage li:first").show();
$(".tabs-nav li:first").addClass("tab-active");

// Change tab class and display content
$(".tabs-nav a").on("click", function (event) {
  event.preventDefault();
  $(".tabs-nav li").removeClass("tab-active");
  $(this).parent().addClass("tab-active");
  $(".tabs-stage li").hide();
  $($(this).attr("href")).show();
});

// Show the first tab by default details page
$(".tabs-content li").hide();
$(".tabs-content li:first").show();
$(".tabs-nav-details li:first").addClass("tab-active");

// Change tab class and display content
$(".tabs-nav-details a").on("click", function (event) {
  event.preventDefault();
  $(".tabs-nav-details li").removeClass("tab-active");
  $(this).parent().addClass("tab-active");
  $(".tabs-content li").hide();
  $($(this).attr("href")).show();
});

// Show the first tab by default all booking page
$(".tabs-content li").hide();
$(".tabs-content li:first").show();
$(".tabs-nav-all-booking li:first").addClass("tab-active");

// Change tab class and display content
$(".tabs-nav-all-booking a").on("click", function (event) {
  event.preventDefault();
  $(".tabs-nav-all-booking li").removeClass("tab-active");
  $(this).parent().addClass("tab-active");
  $(".tabs-content li").hide();
  $($(this).attr("href")).show();
});


// Show the first tab by default cities page
$(".tabs-content-city li").hide();
$(".tabs-content-city li:first").show();
$(".tabs-nav-cities li:first").addClass("tab-active");

// Change tab class and display content
$(".tabs-nav-cities a").on("click", function (event) {

  event.preventDefault();
  $(".tabs-nav-cities li").removeClass("tab-active");
  $(this).parent().addClass("tab-active");
  $(".tabs-content-city li").hide();
  $($(this).attr("href")).show();
});

$(function () {
  $(".ddl-select").each(function () {
    $(this).hide();
    var $select = $(this);
    var _id = $(this).attr("id");
    var wrapper = document.createElement("div");
    wrapper.setAttribute("class", "ddl ddl_" + _id);

    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "ddl-input");
    input.setAttribute("id", "ddl_" + _id);
    input.setAttribute("readonly", "readonly");
    input.setAttribute(
      "placeholder",
      $(this)[0].options[$(this)[0].selectedIndex].innerText
    );

    $(this).before(wrapper);
    var $ddl = $(".ddl_" + _id);
    $ddl.append(input);
    $ddl.append("<div class='ddl-options ddl-options-" + _id + "'></div>");
    var $ddl_input = $("#ddl_" + _id);
    var $ops_list = $(".ddl-options-" + _id);
    var $ops = $(this)[0].options;
    for (var i = 0; i < $ops.length; i++) {
      $ops_list.append(
        "<div data-value='" +
          $ops[i].value +
          "'>" +
          $ops[i].innerText +
          "</div>"
      );
    }

    $ddl_input.click(function () {
      $ddl.toggleClass("active");
    });
    $ddl_input.blur(function () {
      $ddl.removeClass("active");
    });
    $ops_list.find("div").click(function () {
      $select.val($(this).data("value")).trigger("change");
      $ddl_input.val($(this).text());
      $ddl.removeClass("active");
    });
  });
});
/* intlTelInput */
const allTelInputs = document.querySelectorAll("[type='tel']");
allTelInputs.forEach((input) => {
  intlTelInput(input, {
    initialCountry: "sa",
    preferredCountries: ["sa"],
    separateDialCode: true,
  });
});

$(".toggle-password").click(function () {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
}); 
$(document).ready(function() {
  var owl = $('.department-img-carousel');
  owl.owlCarousel({
    items: 1,
    loop: true,
    dots: true,
    slideSpeed: 400,
    animateIn: 'fadeIn', // add this
    animateOut: 'fadeOut', // and this
    lazyLoad: true,
    autoplay: true,
    navText: [
      '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
      '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
    ],
    responsive: {
      0: {
        nav: false,
      },
      768: {
        nav: true,
      },
    },
  });
// Show the first tab by default detaills page
$(".tabs-contentt li").hide();
$(".tabs-contentt li:first").show();
$(".tabs-nav-detaills li:first").addClass("tab-active");

// Change tab class and display content
$(".tabs-nav-detaills a").on("click", function (event) {
  event.preventDefault();
  owl.init();
  $(".tabs-nav-detaills li").removeClass("tab-active");
  $(this).parent().addClass("tab-active");
  $(".tabs-contentt li").hide();
  $($(this).attr("href")).show();
});

});


$(document).ready(function() {
  let slides = document.querySelectorAll('.slide');
  let thumbnails = document.querySelectorAll('.thumbnail');
  let currentSlide = document.querySelector('.slide.show');
  let slideCount = slides.length;
  let currentSlideId = currentSlide.dataset.slide;
  let nextSlideBtn = document.querySelector('.slide-btn.next-slide');
  let prevSlideBtn = document.querySelector('.slide-btn.prev-slide');
  let nextSlideTimer = 100000;
  
  thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener('click', showSlide);
  });
  
  nextSlideBtn.addEventListener('click', nextSlide);
  prevSlideBtn.addEventListener('click', prevSlide);
  
  let slideshow = setInterval(nextSlide, nextSlideTimer);
  
  function showSlide(e) {
      let slideId = e.currentTarget.dataset.slide;
  
      currentSlide.classList.remove('show');
  
      currentSlide = document.querySelector(`.slide[data-slide="${slideId}"`);
  
      currentSlide.classList.add('show');
  
      resetSlideShow();
  }
  
  function nextSlide() {
      let nextSlideId = currentSlideId >= slideCount ? 1 : parseInt(currentSlideId) + 1;
  
      currentSlide.classList.remove('show');
  
      currentSlide = document.querySelector(`.slide[data-slide="${nextSlideId}"`);
      currentSlideId = currentSlide.dataset.slide;
  
      currentSlide.classList.add('show');
  
      resetSlideShow();
  }
  
  function prevSlide() {
      let prevSlideId = currentSlideId <= 1 ? slideCount : parseInt(currentSlideId) - 1;
  
      currentSlide.classList.remove('show');
  
      currentSlide = document.querySelector(`.slide[data-slide="${prevSlideId}"`);
      currentSlideId = currentSlide.dataset.slide;
  
      currentSlide.classList.add('show');
  
      resetSlideShow();
  }
  
  function resetSlideShow() {
      clearInterval(slideshow);
      slideshow = setInterval(nextSlide, nextSlideTimer);
  }
      
    });

    let wizardBar = document.querySelector('[data-wizard-bar]')
    let btnPrevious = document.querySelector('[data-btn-previous]')
    let btnNext = document.querySelector('[data-btn-next]')
    let btnSubmit = document.querySelector('[data-btn-submit]')
    let currentTab = 0;
    showTab(currentTab);
    
    function showTab(n) {
      let formTabs = document.querySelectorAll('[data-form-tab]');
      let wizardItem = document.querySelectorAll('[data-wizard-item]')
      formTabs[n].classList.add('active')
      wizardItem[n].classList.add('active')
      if (n == 0) {
        btnPrevious.style.display = "none";
      } else {
        btnPrevious.style.display = "block";
      }
      if (n == 1) {
        btnNext.style.display = "none";
        btnSubmit.style.display = "block";
      } else {
        btnNext.style.display = "block";
        btnSubmit.style.display = "none";
      }
      if (n == 2) {
        btnNext.style.display = "none";
        btnSubmit.style.display = "none";
        btnPrevious.style.display = "none";
      }
    
    }
    
    function nextPrev(n) {
      let formTabs = document.querySelectorAll('[data-form-tab]');
    
      formTabs[currentTab].classList.remove('active')
      currentTab = currentTab + n;
      showTab(currentTab);
    }
    
    function updateWizardBarWidth() {
      const activeWizards = document.querySelectorAll(".wizard-item.active");
      let wizardItem = document.querySelectorAll('[data-wizard-item]')
      const currentWidth = ((activeWizards.length - 1) / (wizardItem.length - 1)) * 100;
    
      wizardBar.style.width = currentWidth + "%";
    }
    
    document.querySelector('*').addEventListener('click', function (event) {
      if (event.target.dataset.btnPrevious) {
        let wizardItem = document.querySelectorAll('[data-wizard-item]')
        wizardItem[currentTab].classList.remove('active')
        nextPrev(-1)
        updateWizardBarWidth()
      }
      if (event.target.dataset.btnNext) {
        nextPrev(1)
        updateWizardBarWidth()
      }
      if (event.target.dataset.btnSubmit) {
        nextPrev(1)
        updateWizardBarWidth()
      }
    })

    jQuery(document).ready(function () {
      jQuery('#datepicker').datepicker({
          format: 'dd-mm-yyyy',
          startDate: '+1d'
      });
  });

  jQuery(document).ready(function () {
    jQuery('#datepicker1').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '+1d'
    });
});
    

$(function() {
  $('#timepicker').timepicker();
});
$(function() {
  $('#timepicker1').timepicker();
});

