$(function () {
  $(`.openBtn`).click(function () {
    $(this).toggleClass(`active`);
    if ($(this).hasClass('active')) {
    $('.pulldown-wrapper').addClass('active');
} else {
    $('.pulldown-wrapper').removeClass('active');
}
  });
    $('.pulldown-wrapper ul li a').click(function () {
    $('.openBtn').removeClass('active');
    $('.pulldown-wrapper').removeClass('active');
  });
});


  $(function () {
  $('.modalOpen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
  });

  $(function () {
  $('.editOpen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
