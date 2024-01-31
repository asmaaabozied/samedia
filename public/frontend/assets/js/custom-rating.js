$(".my-rating").starRating({
    starSize: 25,
    rtl: true,
    type: "int",
    strokeColor: "#CACACA",
    useGradient: false,
    hoverColor: "#FF8600",
    activeColor: "#FF8600",
    emptyColor: "#CACACA",
    useFullStars: true,
    ratedColors: ["#FF8600", "#FF8600", "#FF8600", "#FF8600", "#FF8600"],
    callback: function (currentRating, $el) {
      // make a server call here
    },
    onHover: function (currentIndex, currentRating, $el) {
      $(".live-rating").text(currentIndex);
    },
    onLeave: function (currentIndex, currentRating, $el) {
      $(".live-rating").text(currentRating);
    },
  });


  $(document).ready(function () {
    $("#datepicker2").datepicker(
      {
        format: 'dd-mm-yyyy',
        startDate: '+1d'
    }
    );
  });
  $(document).ready(function () {
    $("#datepicker3").datepicker(
      {
        format: 'dd-mm-yyyy',
        startDate: '+1d'
    }
    );
  });

  $(function() {
    $('#timepicker').timepicker();
  });
  $(function() {
    $('#timepicker1').timepicker();
  });
  // <!--notifications -->
  $(".notification").click(function () {
    $(".box-notifications").toggle();
  });
  $(".close-btn-notify").click(function () {
    $(".box-notifications").hide();
  });
  //close notification box
//   window.addEventListener('mouseup',function(event){
//     var closeBox = document.getElementById('box-notifications');
//     if(!(event.target.closest("#closeBox"))){
//       closeBox.style.display = 'none';
//     }
// });  

  $('body').on('hidden.bs.modal', '.modal-video', function () {
    $('video').trigger('pause');
    });
    