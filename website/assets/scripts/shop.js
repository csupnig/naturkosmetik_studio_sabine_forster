
$(document).ready(function () {
	/*=================================== Shop-specific Snippets ===================================*/

  $('form.shopForm .amount-minus').click(function(e) {
    var buyButton = $(this).parents('form.shopForm').find('.snipcart-add-item');
    var amountDisplay = $(this).parents('form.shopForm').find('.amount-number span');
    var amount = +buyButton.attr('data-item-quantity');
    if (amount > 1) {
      amount -= 1;
    }
    amountDisplay.text(amount);
    buyButton.attr('data-item-quantity', amount);

    e.preventDefault();
    return false;
  });
  $('form.shopForm .amount-plus').click(function(e) {
    var buyButton = $(this).parents('form.shopForm').find('.snipcart-add-item');
    var amountDisplay = $(this).parents('form.shopForm').find('.amount-number span');
    var amount = +buyButton.attr('data-item-quantity');

      amount += 1;

    amountDisplay.text(amount);
    buyButton.attr('data-item-quantity', amount);

    e.preventDefault();
    return false;
  });
});
