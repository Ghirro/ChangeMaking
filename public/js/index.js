'use strict';

/* globals $ */
function success(data) {
  for (var i=0;i<data.length;i++) {
    var listItem = '<li>' + data[i].amount + ' x ' + data[i].coinName + '</li>';
    $('#result-modal #result-list ul').append(listItem);
  }
  $('.modal-body img').hide();
  $('.modal-body #result-list').show();
}

function failure() {
  $('.modal-body #result-list').append('<p class="error">An error occured. Likely your input was invalid, please check and try again</p>');
  $('.modal-body img').hide();
  $('.modal-body #result-list').show();
}

$(function () {

  // Setup view for Javascript
  $('#result-area').hide();
  $('#result-modal #result-list').hide();
  $('#input-area').attr('class', 'col-xs-12 col-sm-6 col-sm-offset-3');

  // Handle the AJAX Send
  $('#input-area').on('submit', 'form', function (event) {
    event.preventDefault();
    $('.modal-body img').show();
    $('.modal-body #result-list').hide();
    $('.modal-body #result-list p').remove();
    $('.modal-body #result-list li').remove();

    $('#result-modal').modal('show');
    $.ajax({
      url: 'index.php?action=calculate',
      type: 'POST',
      data: {
        amount: $('#amount').val(),
        ajax: true
      },
      dataType: 'json'
    })
    .done(success)
    .fail(failure);
  });
});
