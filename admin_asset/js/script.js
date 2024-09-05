
// Flash message js

function notify(quote, type) {
    var notifyElement = $("<div />").addClass(type).html(quote);
    $(".notify").prepend(notifyElement);
    setTimeout(
      function (ele) {
        ele.remove();
      },
      3000,
      notifyElement
    );
  }